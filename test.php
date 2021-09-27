<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Morris Charts CSS -->
    <link href="reports/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
   
   <!-- Custom CSS -->
	<link href="reports/dist/css/style.css" rel="stylesheet" type="text/css">
    
</head>

<body>
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<!-- Title -->					
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">morris chart</h5>
					</div>
					
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#">charts</a></li>
						<li class="active"><span>morris-chart</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
					
				</div>
				<!-- /Title -->
				
				<div class="row">
					<div class="col-lg-8">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Area Chart</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_area_chart" class="morris-chart"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Donut chart</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_donut_chart" class="morris-chart donut-chart"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			   
				<div class="row">
				   <div class="col-lg-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">line Chart</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_line_chart" class="morris-chart"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">bar Chart</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_bar_chart" class="morris-chart"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">line Chart</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div id="morris_extra_line_chart" class="morris-chart"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">bar Chart</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div id="morris_extra_bar_chart" class="morris-chart"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>
		<!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="reports/vendors/bower_components/jquery/reports/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="reports/vendors/bower_components/bootstrap/reports/dist/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="reports/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="reports/vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="reports/dist/js/morris-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="reports/dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="reports/vendors/bower_components/owl.carousel/reports/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="reports/vendors/bower_components/switchery/reports/dist/switchery.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="reports/dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="reports/dist/js/init.js"></script>
	
</body>

</html>
