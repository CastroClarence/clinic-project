window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2", 
        animationEnabled: true,
        zoomEnabled: true,
        title: {
            text: "Difference of Amount Charged & Amount Paid by Customers",
            fontFamily: "Jost, sans-serif",
            fontColor: "#38a095",
        },
        axisX: {
            valueFormatString: "DD MMM",
            fontFamily: "Jost, sans-serif",
        },
        axisY: {
            title: "Amount",
            prefix: "₱",
            fontFamily: "Jost, sans-serif"
        },
        legend:{
            cursor: "pointer",
            itemclick: toggleDataSeries,
            fontFamily: "Jost, sans-serif"
	    },
        toolTip: {
            shared: true,
            fontFamily: "Jost, sans-serif",
        },
        backgroundColor: "#F4FAFA",
        data: [{
            type: "splineArea",
            name: "Charge Amount",
            showInLegend: true,
            xValueFormatString: "DD MMM",
            yValueFormatString: "₱#,###.##",
            dataPoints: chartData.map(function(item) {
                return { x: new Date(item.transDate + ' ' + item.transTime), y: parseFloat(item.transChargeAmount) };
            })
        },{
            type: "splineArea",
            name: "Amount Paid",
            showInLegend: true,
            xValueFormatString: "DD MMM",
            yValueFormatString: "₱#,###.##",
            dataPoints: chartData.map(function(item) {
                return { x: new Date(item.transDate + ' ' + item.transTime), y: parseFloat(item.transAmountPaid) };
            })
        }]
    });

    chart.render();

    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
}
