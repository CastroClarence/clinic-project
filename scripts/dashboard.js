window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Difference of Amount Charged & Amount Paid by Customers"
        },
        axisX: {
            valueFormatString: "DD MMM",
        },
        axisY: {
            title: "Amount",
        },
        data: [{
            type: "stackedArea",
            name: "Amount Paid",
            showInLegend: true,
            xValueFormatString: "DD MMM",
            yValueFormatString: "₱ #,###.##",
            dataPoints: chartData.map(function(item) {
                return { x: new Date(item.transDate), y: parseFloat(item.transAmountPaid) };
            })
        },{
            type: "stackedArea",
            name: "Charge Amount",
            showInLegend: true,
            xValueFormatString: "DD MMM",
            yValueFormatString: "₱ #,###.##",
            dataPoints: chartData.map(function(item) {
                return { x: new Date(item.transDate), y: parseFloat(item.transChargeAmount) };
            })
        }]
    });

    chart.render();
}
