<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends FSD_Controller 
{
	var $before_filter = array('name' => 'member_authorization', 'except' => array());
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
		$this->load->model('imeiorder_model');
		$this->load->model('method_model');
		$this->load->model('fileorder_model');
		$this->load->model('serverorder_model');
		$this->load->model('fileservices_model');
		$this->load->model('credit_model');
		$this->load->model('payment_model');
	}
	
	public function index()
	{
		$data = array();
		$id = $this->session->userdata('MemberID');
		$percentage = $this->imeiorder_model->get_percentage($id);
		$pendingpercent = $this->imeiorder_model->get_pendingPercentage($id);
		$rejectpercent = $this->imeiorder_model->get_rejectPercentage($id);
		$approvedpercent = $this->imeiorder_model->get_approavedPercentage($id);
		$data['totalPercentage'] = count($percentage);
		$data['totalPercentage'] = $data['totalPercentage'] > 0 ? $data['totalPercentage'] : 1;
		$data['pendingPercentage'] = ( (count($pendingpercent) * 100 ) / $data['totalPercentage'] );
		$data['rejectPercentage'] = ( (count($rejectpercent) * 100 ) / $data['totalPercentage'] );
		$data['appraovedPercentage'] = ( (count($approvedpercent) * 100 ) / $data['totalPercentage'] );		
		$data['Title'] = "Dashboard";
		$data['template'] = "member/dashboard";
		$data['credit'] = $this->credit_model->get_credit($id);
		$this->load->view('mastertemplate', $data);
	}
	
	public function listener()
	{
		$id = $this->session->userdata('MemberID');
		echo $this->imeiorder_model->get_imei_data($id);
	}
	
	public function fileorder()
	{
		$id = $this->session->userdata('MemberID');
		echo $this->fileorder_model->get_file_data($id);
	}
	
	public function serverorder()
	{
		$id = $this->session->userdata('MemberID');
		echo $this->serverorder_model->get_server_data($id);
	}

	public function credit()
	{
		$id = $this->session->userdata('MemberID');
		echo $this->credit_model->get_credit_data($id);
	}


	public function addfund()
	{
		$data = array();
		$id = $this->session->userdata('MemberID');
		$data['Title'] = "Dashboard";
		$data['template'] = "member/addcredit";
		$data['credit'] = $this->credit_model->get_credit($id);
		$data['paypal_settings'] = $this->payment_model->get_where(array('ID'=>1));
		$this->load->view('mastertemplate', $data);	
	}
	
	public function profile()
	{
		$data = array();
		$id = $this->session->userdata('MemberID');
		$data['data'] = $this->member_model->get_where(array('ID' => $id));
		$data['Title'] = $this->lang->line('my_account_heading');
		$data['template'] = "member/profile";
		$data['credit'] = $this->credit_model->get_credit($id);
		$this->load->view('mastertemplate', $data);
	}
	
	
	public function editprofile()
	{
		$this->form_validation->set_rules('FirstName', 'First Name', 'required|min_length[3]');
		$this->form_validation->set_rules('LastName', 'Last Name', 'required|min_length[3]');
		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('CurrentPassword', 'Current Password', 'required|min_length[5]');
		if ($this->form_validation->run() == FALSE)
		{
			$data = $this->input->post(NULL,TRUE);
			$this->session->set_flashdata("fail", $this->lang->line('error_field_required'));
			redirect(site_url('member/dashboard/profile'));
		}
		else {
			$data = $this->input->post(NULL,TRUE);
			$member_data = $this->member_model->get_where(array('ID' => $data['ID']));
			if($member_data[0]['Password'] == md5($data['CurrentPassword']))
			{
				unset($data['CurrentPassword']);
				
				if($data['NewPassword'] != "")
				{
					if($data['NewPassword'] == $data['ConfirmPassword'])
					{
						$data['Password'] = $data['NewPassword'];
					}
					else
					{
						$this->session->set_flashdata("fail", $this->lang->line('error_password_not_match'));
						redirect(site_url('member/dashboard/profile'));
					}
				}

				unset($data['NewPassword']);
				unset($data['ConfirmPassword']);
				$this->member_model->update($data, $data['ID']);
				$this->session->set_flashdata("success", $this->lang->line('error_update_successfully'));
				redirect(site_url('member/dashboard/profile'));
			}
			$this->session->set_flashdata("fail",$this->lang->line('error_wrong_password'));
			redirect(site_url('member/dashboard/profile'));
		}
	}

	
}	