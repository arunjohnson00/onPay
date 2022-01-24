
<?php

//$conn=mysqli_connect("localhost","root","","mytable");
include('user_connect.php');




?>
<style>
  @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}
	.chartjs-render-monitor{animation:chartjs-render-animation 1ms}
	.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}
	.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}
	.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}

</style>
<div style="width:100%;height: 689px">
		<div class="chartjs-size-monitor">
			<div class="chartjs-size-monitor-expand">
				<div class=""></div>
			</div>
			<div class="chartjs-size-monitor-shrink">
				<div class=""></div>
			</div>
		</div>
		<canvas id="canvas" style="display: block; padding-top:50px" class="chartjs-render-monitor"></canvas>
	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn2.hubspot.net/hubfs/476360/Chart.js"></script>
<script src="https://cdn2.hubspot.net/hubfs/476360/utils.js"></script>
<script>
/*var config = {
		type: 'bar',
		data: {*/
		/*	labels: [<?php 
         /* $sqlm="SELECT * FROM pay_tabe";
          
          if($reqm=mysqli_query($serv,$sqlm)){

while($rowm=mysqli_fetch_array($reqm))
{
	//echo $row['paid_amount'].",";

 $month=date("F",strtotime($rowm['r_time']));

echo "'$month',";
}

}*/?>],*/
		/*	datasets: [{
				label: 'Students',
				backgroundColor: window.chartColors.red,
				borderColor: window.chartColors.red,
				fill: false,
				data: [		  <?php 
         /* $sqls="SELECT * FROM mytable";
          
          if($reqs=mysqli_query($serv,$sqls)){
$countStudents=0;
while($rows=mysqli_fetch_array($reqs))
{    $countStudents++;
    echo $countStudents.",";
//	echo $rows['studentsCount'].",";
// $month=date("F",$row['regtime']);
}

}*/?>
			
        
					/*randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()*/
			/*	],
			}, {
				label: 'Payment',
				backgroundColor: window.chartColors.blue,
				borderColor: window.chartColors.blue,
				fill: false,
				data: [*/
				  <?php 
       /*   $sql="SELECT * FROM pay_tabe";
          
          if($req=mysqli_query($serv,$sql)){

while($row=mysqli_fetch_array($req))
{
 echo $payfirst=$row['paid_amount'].",";
	

// $month=date("F",$row['regtime']);
}

} */?>
		/*		],
		
			}]
		},
		options: {
			responsive: true,
			    maintainAspectRatio : false,
			title: {
				display: true,
				text: 'OnPay Statitics'
			},
			scales: {
				xAxes: [{
					display: true,
          scaleLabel: {
            display: true,
            labelString: 'Total Count/ Payment'
          },
          ticks: {
							//min: 0,
							//max: 1000,

							// forces step size to be 5 units
							stepSize: 1
						}
			
				}],
				yAxes: [{
					display: true,
					//type: 'logarithmic',
          scaleLabel: {
							display: true,
							labelString: 'Payment / Students Count'
						},
						ticks: {
							min: 0,
							max: 10,

							// forces step size to be 5 units
							stepSize: 1
						}
				}]
			}
		}
	};

	window.onload = function() {
		var ctx = document.getElementById('canvas').getContext('2d');
		window.myLine = new Chart(ctx, config);
	};

	document.getElementById('randomizeData').addEventListener('click', function() {
		config.data.datasets.forEach(function(dataset) {
			dataset.data = dataset.data.map(function() {
				return randomScalingFactor();
			});

		});

		window.myLine.update();
	});*/
	
	
	
	var canvas = document.getElementById("canvas");
var ctx = canvas.getContext('2d');

// Global Options:
 Chart.defaults.global.defaultFontColor = 'dodgerblue';
 Chart.defaults.global.defaultFontSize = 16;


// Data with datasets options
var data = {
    labels: ["Students Count", "Total Payment"],
      datasets: [
        {
            label: "Count / Payment  ",
            fill: true,
            backgroundColor: [
                'green',
                'orange'],
            data: [ <?php 
       $sqls="SELECT COUNT('id') AS CountSTD FROM mytable";
          
          if($reqs=mysqli_query($serv,$sqls)){
$countStudents=0;
while($rows=mysqli_fetch_array($reqs))
{  
    
    // $countStudents++;
   // echo $countStudents++;
echo $rows['CountSTD'];
// $month=date("F",$row['regtime']);
}

}?>, <?php 
       $sqlsa="SELECT SUM(paid_amount) AS CountSUM FROM pay_tabe";
          
          if($reqsa=mysqli_query($serv,$sqlsa)){

while($rowsa=mysqli_fetch_array($reqsa))
{  
 
echo $rowsa['CountSUM'];

}

}?>]
        }
    ]
};

// Notice how nested the beginAtZero is
var options = {
    	responsive: true,
			    maintainAspectRatio : false,
        title: {
                  display: true,
                  text: 'OnPay Statitics',
                  position: 'top'
              },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    	min: 0,
							max: 20,

							// forces step size to be 5 units
							stepSize: 1
                }
            }]
        }
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});

</script>

