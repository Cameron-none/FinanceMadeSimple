
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Finance Made Simple</title>

		<!-- Bootstrap core CSS -->
		<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="/styles/sticky-footer-navbar.css" rel="stylesheet">
		<link href="/styles/theme.css" rel="stylesheet">
		<link href="/styles/bootstrap-dialog.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="/bootstrap/js/ie-emulation-modes-warning.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Finance Made Simple</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="/">Home</a></li>
						<!--<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>-->
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<!-- Begin page content -->
		<div class="container">
			<form id="main-form" action="" method="post" onsubmit="validateInput()">
				<div id="form-steps">
					<div class="form-step">
						<div class="page-header">
							<h1>How much would you like to borrow?</h1>
						</div>
						<p>This is the total amount you'd like to borrow. If you need $500,000, that is the number you enter (without the "$"). If you have an existing loan, 
						please enter the amount you borrowed at the very begining of your loan, this calculator will determine your remaining present value behind the scenes and give you 
						a meaningful result if you change your payment amount or interest rate.</p><br />
						<div class="row">
						    <div class="col-md-4 col-md-offset-4">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="borrow-amount" placeholder="Enter a figure" min="1" required />
									<span class="input-group-addon">.00</span>
								</div>
						    </div>
						</div>
					</div>
					<div class="form-step" style="display: none;">
						<div class="page-header">
							<h1>How many years have you had the loan for?</h1>
						</div>
						<p>If you have an existing loan you can use this calcutor to see how changes in various factors will influence the rest of your loan.<br><br> Please enter the number 
						of years you've had your current loan, if you don't have a current loan, please enter a zero.</p><br />
						<div class="row">
						    <div class="col-md-2 col-md-offset-5">
								<input type="number" class="form-control" id="loan-years" placeholder="Years" min="0" required />
						    </div>
						</div>
					</div>
				</div><br /><br />
				<div class="row">
					<div class="col-md-6 half"><button type="button" class="btn btn-primary btn-large" onclick="previous();" id="previous-button" disabled="true">Previous</button></div>
					<div class="col-md-6 half" style="text-align: right;"><button type="button" class="btn btn-success btn-large" onclick="next();" id="next-button">Next</button></div>
				</div><br />
				<div class="progress">
					<div id="progress-bar" class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						<span class="sr-only">0% Complete</span>
					</div>
				</div>
			</form>
		</div>

		<footer class="footer">
			<div class="container">
				<p class="text-muted">A project by Shane Reeves and Cameron Martin.</p>
			</div>
		</footer>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="/bootstrap/js/bootstrap.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="/bootstrap/js/ie10-viewport-bug-workaround.js"></script>

		<!-- JavaScript for form -->
		<script src="/scripts/loan-calculator.js" type="text/javascript"></script>

		<!-- Bootstrap Dialog -->
		<script src="/scripts/bootstrap-dialog.js" type="text/javascript"></script>
	</body>
</html>