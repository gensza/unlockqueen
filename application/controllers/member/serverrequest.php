<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include APPPATH . 'third_party/DhruFusion.php';
class serverrequest extends FSD_Controller 
{
	var $before_filter = array('name' => 'member_authorization', 'except' => array());
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->model('serverservice_model');
		$this->load->model('serverbox_model');
		$this->load->model('serverorder_model');
		$this->load->model('credit_model');
		$this->load->model('apimanager_model');
	}
	
	########### IMEI Order Request Form display #######################################
	
	public function index()
	{
		$data = array();
		$id = $this->session->userdata('MemberID');
		$data['Title'] = "Server Request";
		$data['credit'] = $this->credit_model->get_credit($id);
		$data['serverorders'] = $this->serverbox_model->service_with_boxes();
		$data['template'] = "member/serverservice/request";
		$this->load->view('mastertemplate', $data);
	}
		
	
	###### Place IMER Request Order and deduct charges ################################
	
	public function insert()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ServerServiceID' , 'Service' ,'required');
		$this->form_validation->set_rules('Email' , 'Email' ,'valid_email');
		$this->form_validation->set_rules('Note' , 'Note' ,'max_length[255]');
		$this->form_validation->set_rules('RequiredFields' , 'RequiredFields' ,'');
		if($this->form_validation->run() === FALSE)	
		{
			$this->index();	
		}
		else 
		{
			$data = $this->input->post(NULL, TRUE);
			$service_id = $data['ServerServiceID'];
			$member_id = $this->session->userdata('MemberID');
			$credit = $this->credit_model->get_credit($member_id);
			$pricing = $this->serverservice_model->get_where(['id' => $service_id] );
			if( is_array($pricing) && count($pricing) > 0 )
			{
				$price = floatval($pricing[0]['Price']);
				$quantity = $pricing[0]['Quantity'];
				if($price > $credit )
				{
					$this->session->set_flashdata('fail', $this->lang->line('error_not_enough_credit'));
					redirect("member/serverrequest/");
				}
				
				#### Place Order			
				$insert = array();
				$insert['MemberID'] = $member_id;
				$insert['ServerServiceID'] = $service_id;
				$insert['Quantity'] = $quantity;
				$insert['RequiredFields'] = json_encode($data['RequiredFields']);
				$insert['Email'] = $data['Email'];
				$insert['Notes'] = $data['Notes'];
				$insert['Status'] = 'Pending';
				$insert['UpdatedDateTime'] = date("Y-m-d H:i:s");
				$insert['CreatedDateTime'] = date("Y-m-d H:i:s");
				$insert_id = $this->serverorder_model->insert($insert);
				
				#####Deduct Credits from available credits
				$credit_data = array(
					'MemberID' => $member_id,
					'TransactionCode' => SERVER_CODE_REQUEST,
					'TransactionID' => $insert_id,
					'Description' => "Server request",
					'Amount' => -1 * abs($price),
					'CreatedDateTime' => date("Y-m-d H:i:s")
				);
				$this->credit_model->insert($credit_data);						
				$this->session->set_flashdata('success', $this->lang->line('error_record_addes_successfully'));
				redirect("member/serverrequest/");
			}
			$this->session->set_flashdata('fail', 'Service not available.');
			redirect("member/serverrequest/");
		}
	}

	################# Ajax form request fields shown according to database criteria ####
	
	public function formfields()
	{
		if($this->input->is_ajax_request() === TRUE && $this->input->post('service_id') !== FALSE)
		{
			$id = $this->input->post('service_id');	
			$service = $this->serverservice_model->get_where(array('ID' => $id));
			if( !empty($service) )
			{
				$data = $service[0];
				$data['services'] = [];
				$api_id = $data['ApiID'];
				$tool_id = $data['ToolID'];
				$apis = $this->apimanager_model->get_where(['ID' => $api_id]);
				if( !empty($apis) )
				{
					$api = $apis[0];
					$api = new DhruFusion($api['Host'], $api['Username'], $api['ApiKey']);
					$api->debug = FALSE; // Debug on
					$request = $api->action('serverservicetypelist');
					if( !isset($request['ERROR']) )
					{
						$services = $request['SUCCESS'][0]['LIST'];
						foreach ($services as $v) 
						{
							if( $v['tool_id'] == $tool_id)
							{
								$data['services'][] = $v;
							}
						}
					}
				}
			}
			$this->load->view("member/serverservice/loadrequiredfield", $data);
		}
	}
}