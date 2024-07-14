// Function to initialize a doughnut chart
$(document).ready(function () {
    historyOrderTable("IMEI Orders");
});

function detailIMEI(id_order) {

    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: base_url + "member/dashboard/listener_new_detail",
        data: {
            "id_order": id_order
        },
        beforeSend: function () { },
        success: function (res) {
            $("#detailImeiOrderModal").modal("show");

            $("#titleModal").html(res.Title);
            $("#imeiModal").html(res.IMEI);
            $("#priceModal").html(res.Price);
            $("#deliveryModal").html(res.DeliveryTime);
            $("#statusModal").html(res.Status);
            $("#codeModal").html(res.Code);
            $("#commentsModal").html(res.Comments);
            $("#noteModal").html(res.Note);
            $("#createdAtModal").html(res.CreatedDateTime);
        },
    })
        .done(function (data) { })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Error!!! " + errorThrown);
        });
}

function historyOrderTable(param) {

    $("#titleOrderHistory").text(param);

    if (param == "IMEI Orders") {
        DataTableImei();
        $('#tableDataImei').css("display", "block");
        $('#tableDataServer').css("display", "none");
        $('#tableDataCredit').css("display", "none");
    } else if (param == "Server Orders") {
        DataTableServer();
        $('#tableDataImei').css("display", "none");
        $('#tableDataServer').css("display", "block");
        $('#tableDataCredit').css("display", "none");
    } else {
        DataTableCredit();
        $('#tableDataImei').css("display", "none");
        $('#tableDataServer').css("display", "none");
        $('#tableDataCredit').css("display", "block");
    }

}

function DataTableImei() {

    $("#table_data_imei").DataTable().destroy();
    new DataTable('#table_data_imei', {

        ajax: {
            url: base_url + "member/dashboard/listener_new",
            type: 'POST',
            "data": {}
        },
        columns: [
            { data: "no" },
            { data: "detail" },
            { data: "imei" },
            // { data: "description" },
            // { data: "price" },
            // { data: "service" },
            // { data: "code" },
            { data: "status" },
            // { data: "created_at" },
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

function DataTableServer() {

    $("#table_data_server").DataTable().destroy();
    new DataTable('#table_data_server', {

        ajax: {
            url: base_url + "member/dashboard/serverorder_new",
            type: 'POST',
            "data": {}
        },
        columns: [
            { data: "no" },
            { data: "service" },
            { data: "code" },
            { data: "email" },
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

function DataTableCredit() {

    $("#table_data_credit").DataTable().destroy();
    new DataTable('#table_data_credit', {

        ajax: {
            url: base_url + "member/dashboard/credit_new",
            type: 'POST',
            "data": {}
        },
        columns: [
            { data: "no" },
            { data: "code" },
            { data: "amount" },
            { data: "description" },
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

function initializeDoughnutChart(chartElement, chartData, chartOptions) {
    var ctx = chartElement.getContext('2d');

    // Register plugin for displaying data percentages inside the chart segments
    Chart.pluginService.register({
        beforeDraw: function (chart) {
            var width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;

            ctx.restore();
            var fontSize = (height / 114).toFixed(2);
            ctx.font = fontSize + "em sans-serif";
            ctx.textBaseline = "middle";

            var text = "75%", // Default text to display if no data provided
                dataSum = 0;

            // Calculate the sum of data values
            chart.data.datasets.forEach(function (dataset) {
                dataset.data.forEach(function (element) {
                    dataSum += element;
                });
            });

            if (dataSum > 0) {
                var percentage = Math.round((chart.data.datasets[0].data[0] / dataSum) * 100);
                text = percentage + "%";
            }

            var textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;

            ctx.fillText(text, textX, textY);
            ctx.save();
        }
    });

    // Create the doughnut chart instance
    var myDoughnutChart = new Chart(ctx, {
        type: "doughnut",
        data: chartData,
        options: chartOptions
    });
}

// Example usage:
var doughnutChartAvailable = document.getElementById('doughnutChartAvailable');
var data1 = {
    datasets: [{
        data: [appraovedPercentage, 100 - appraovedPercentage],
        backgroundColor: ["#32CD32", "#f3f3f3"],
    }],
};
var options1 = {
    responsive: true,
    maintainAspectRatio: false,
    cutoutPercentage: 60,
    tooltips: {
        enabled: false
    },
    layout: {
        padding: {
            left: 20,
            right: 20,
            top: 20,
            bottom: 20,
        },
    },
};

initializeDoughnutChart(doughnutChartAvailable, data1, options1);

// Repeat for additional charts
var doughnutChartRejected = document.getElementById('doughnutChartRejected');
var data2 = {
    datasets: [{
        data: [rejectPercentage, 100 - rejectPercentage],
        backgroundColor: ["#00BFFF", "#f3f3f3"],
    }],
};
var options2 = {
    responsive: true,
    maintainAspectRatio: false,
    cutoutPercentage: 60,
    tooltips: {
        enabled: false
    },
    layout: {
        padding: {
            left: 20,
            right: 20,
            top: 20,
            bottom: 20,
        },
    },
};

initializeDoughnutChart(doughnutChartRejected, data2, options2);

// Repeat for additional charts
var doughnutChartPending = document.getElementById('doughnutChartPending');
var data3 = {
    datasets: [{
        data: [pendingPercentage, 100 - pendingPercentage],
        backgroundColor: ["#FF4500", "#f3f3f3"],
    }],
};
var options3 = {
    responsive: true,
    maintainAspectRatio: false,
    cutoutPercentage: 60,
    tooltips: {
        enabled: false
    },
    layout: {
        padding: {
            left: 20,
            right: 20,
            top: 20,
            bottom: 20,
        },
    },
};

initializeDoughnutChart(doughnutChartPending, data3, options3);