<?php 
	 require('dash-top.php');

	$top3products=mysqli_query($con,"select order_details.qty,product.pname from order_details,product where order_details.product_id=product.product_id order by qty desc limit 3");
	$donut_chart='';

	while($top3row=mysqli_fetch_array($top3products)){
		$pname=substr($top3row['pname'],0,22);
		$donut_chart.="{
			label: \"".$pname."\",
			value: ".$top3row['qty']."
		}, ";
	}
	$donut=substr($donut_chart,0,-2);

	$orderdeets=mysqli_query($con,"select count(*),DATE(added_on) date from `order` 
	where added_on between (CURDATE() - INTERVAL 31 DAY)
	and (CURDATE() - INTERVAL 1 DAY)
	group by DATE(added_on)");
	$order_chart='';

	while($orderrow=mysqli_fetch_assoc($orderdeets)){
		$order_chart.=" {
			d: '".$orderrow['date']."',
			Orders: ".$orderrow['count(*)']."
		}, ";
	}
	$order=substr($order_chart,0,-2);


	$catdeets=mysqli_query($con,"select category.cat_name,subcategory.* from category,subcategory where category.cat_id=subcategory.cat_id");
	$cat_chart='';

	while($catrow=mysqli_fetch_assoc($catdeets)){
		$cat_chart.=" {
			y: '".$catrow['cat_name']."',
			a: ".$catrow['subcat_id'].",
			b: 0,
			c: 0
		}, ";
	}
	$cat=substr($cat_chart,0,-2);
	
?>
<head>
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<div class="main-container">
		<div class="page-heading">
			<h1>REPORTS</h1>		
		</div>
		<div class="tb">
			<div class="page-heading">
				<div><h2>TOP 3 PRODUCTS </h2></div>
			</div>
		</div>

		<div class="tb">
			<div id="morris_donut_chart" class="morris-chart donut-chart"></div>
		</div>
		<div class="tb">
			<div class="page-heading">
				<div><h2>Orders placed</h2></div>
			</div>
		</div>
	<div class="tb">
		<div id="morris_line_chart" class="morris-chart"></div>
	</div>

</div>
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>


    <!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>

<script>
	// Donut Chart
	Morris.Donut({
		element: 'morris_donut_chart',
		data: [<?php echo $donut;?>],
		colors: ['rgba(46,205,153,.6)', 'rgba(240,197,65,.6)', 'rgba(237,111,86,.6)'],
		resize: true,
		labelColor: '#878787',
	});	
		
	
	Morris.Line({
		// ID of the element in which to draw the chart.
		element: 'morris_line_chart',
		// Chart data records -- each entry in this array corresponds to a point on
		// the chart.
		data: [<?php echo $order;?> ],
		// The name of the data record attribute that contains x-Orderss.
		xkey: 'd',
		// A list of names of data record attributes that contain y-Orderss.
		ykeys: ['Orders'],
		// Labels for the ykeys -- will be displayed when you hover over the
		// chart.
		labels: ['Orders'],
		// Disables line smoothing
		pointSize: 1,
		pointStrokeColors:['#2ecd99'],
		behaveLikeLine: false,
		grid:false,
		gridTextColor:'#878787',
		lineWidth: 2,
		smooth: true,
		hideHover: 'auto',
		lineColors: ['#2ecd99'],
		resize: true,
		gridTextFamily:"Poppins"
	});
	
	Morris.Bar({
		element: 'morris_extra_bar_chart',
		data: [<?php echo $cat;?>],
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['A', 'B', 'C'],
		barColors:['#2ecd99', '#f0c541', '#ed6f56'],
		barOpacity:.6,
		hideHover: 'auto',
		grid: false,
		resize: true,
		gridTextColor:'#878787',
		gridTextFamily:"Poppins"
	});	
</script>
	
<?php
    require('dash-footer.php');
?>