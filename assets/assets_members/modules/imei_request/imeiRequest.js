
function historyOrderTable(param) {

    $("#historyOrderModal").modal("show");
    $("#table_data_imei").DataTable().destroy();
    new DataTable('#table_data_imei', {

        ajax: {
            url: base_url + "member/imeirequest/listener_new",
            type: 'POST',
            "data": {
                "param": param
            }
        },
        columns: [
            { data: "no" },
            { data: "imei" },
            { data: "service" },
            { data: "code" },
            { data: "note" },
            { data: "status" },
            { data: "created_at" },
        ],

        pagingType: "input",
        "processing": true,
        "serverSide": true,
        bInfo: false,
        ordering: false,
        deferRender: true,
        searching: true,
    });
}