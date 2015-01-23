
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
		<link href="/styles/bootstrap-switch.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="/bootstrap/js/ie-emulation-modes-warning.js"></script>

		<!-- JavaScript for form -->
		<script src="/scripts/loan-calculator.js" type="text/javascript"></script>

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
			<div id="welcome">
				<h1>Welcome to Finance Made Simple</h1>
				<p>Hi there, my name is Cameron Martin and welcome to financemadesimple.net! For most of us the purchase of a home will likely be the largest financial decision we ever 
				make. With this in mind, it makes sense to know as many of the ins and outs of a home loan as possible so you can achieve the best financial outcome for you and your 
				family.</p>
				<p>While home loan calculators already exist, they are often simple, not taking into account paying more than you need to, and being tailored to people looking to get a 
				home loan with little attention paid to those with existing loans. Not to worry however, my calculators will let you see how much your duration decreases by paying more 
				per week/fortnight/month, and it works with existing loans too!</p>
				<p>Even if you have a fixed interest period, you'll be able to enter your details and assess your payment options once the fixed interest period expires.</p>
				<p>Disclaimer: Please note that this website is currently in development and undergoing testing, figures may not be 100% accurate at all times. You should seek 
				professional advice before acting on any of the imformation seen on this site.</p>
				<br />
				<div class="row">
					<div class="col-md-4 col-md-offset-4" style="text-align: center;"><button class="btn btn-success btn-lg" onclick="start();">Get Started</button></div>
				</div>
			</div>
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
									<input type="number" class="form-control" id="borrow-amount" placeholder="Enter a figure" min="1" onkeyup="checkForReturn(event)" required />
									<span class="input-group-addon">.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-step">
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
					<div class="form-step">
						<div class="page-header">
							<h1>Is there a fixed period?</h1>
						</div>
						<p>This is the period of time in which the interest rate is static, it doesn't change even if the bank changes their rates, you're locked into this rate for this 
						duration. It is sometimes associated with periods of time in which you're unable to pay more than your regular payment, this calculator makes use of the assumption.</p>
						<p>Please enter the number of years you've had your current loan, if you don't have a current loan, please enter a zero.</p><br />
						<div class="row">
							<div class="col-md-2 col-md-offset-5">
								<input type="number" class="form-control" id="fixed-period" placeholder="Years" min="0" required />
							</div>
						</div>
					</div>
					<div class="form-step">
						<div class="page-header">
							<h1>What is the fixed interest period's rate? (%)</h1>
						</div>
						<p>This is your standard fixed interest rate, they may vary from institution from institution. I encourage you to look around, you may be able to find a lower rate, 
						and therefore pay less interest! </p>
						<p>If there is no fixed period, make this field exactly the same as the variable interest rate two boxes below.</p><br />
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<div class="input-group">
									<input type="number" class="form-control" id="fixed-interest-rate" min="0" max="100" step="0.01" required />
									<span class="input-group-addon">%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-step">
						<div class="page-header">
							<h1>What is the total length of the loan? (Years)</h1>
						</div>
						<p>This is the duration or length of the loan, it is measured in years. This is how long you'd like to pay off the loan for. You'll notice that if you choose to 
						include an additional payment this number will decrease, meaning you'll pay your loan off quicker and with less interest!</p><br />
						<div class="row">
							<div class="col-md-2 col-md-offset-5">
								<input type="number" class="form-control" id="loan-length" placeholder="Years" min="1" required />
							</div>
						</div>
					</div>
					<div class="form-step">
						<div class="page-header">
							<h1>What is the variable interest rate?</h1>
						</div>
						<p>This is the variable interest rate, it is able to fluctate and most likely will over the duration of your home loan. The higher this percentage is, the more 
						money you will have to pay your financial institution in interest repayments. It is determined by the reserve bank and there a many complicated factors that decide 
						what this rate is. It is beyond your control and something that must simply be accepted.</p><br />
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<div class="input-group">
									<input type="number" class="form-control" id="variable-interest-rate" min="0" max="100" step="0.01" required />
									<span class="input-group-addon">%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-step">
						<div class="page-header">
							<h1>After the fixed interest period ends, how much would you like to pay?</h1>
						</div>
						<p>The most important function of the calculator and also the reason financemadesimple exists! This is the value of the extra money you would pay weekly. If you've 
						decided you can afford to pay an additional $50 per period towards your loan, please enter 50. Paying extra per period reduces the present value of your loan faster 
						than you would if you paid the regular amount, what that means is, the total amount owing is decreasing faster.</p>
						<p>This will decrease the number of periods required to pay back your loan, reducing both the total time it would take to pay off your loan, as well as reducing the 
						total interest you pay your financial instituion. Paying as little as $50 extra per week could save you literally tens of thousands of dollars of the duration of the 
						loan.</p>
						<p> This will decrease the number of periods required to pay back your loan, reducing both the total time it would take to pay off your loan, as well as reducing the 
						total interest you pay your financial instituion. Paying as little as $50 extra per week could save you literally tens of thousands of dollars of the duration of the 
						loan.</p><br />
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="pay-at-end" placeholder="Enter a figure" min="1" required />
									<span class="input-group-addon">.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-step">
						<div class="page-header">
							<h1>Lastly, please select the payment frequency of your payments</h1>
						</div>
						<p>This is the duration or length of the loan, it is measured in years. This is how long you'd like to pay off the loan for. You'll notice that if you choose to 
						include an additional payment this number will decrease, meaning you'll pay your loan off quicker and with less interest!</p><br />
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<select class="form-control" id="payment-frequency" required>
									<option value="52" selected>Weekly</option>
									<option value="26">Fortnightly</option>
									<option value="12">Monthly</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div id="results">
					<div class="page-header">
						<h1>Results</h1>
					</div>
					<table class="table table-hover">
						<tr onclick="$('#results-periodic-payment-info').fadeToggle(200);">
							<th>Periodic payment</th>
							<td id="results-periodic-payment">$100</td>
						</tr>
						<tr id="results-periodic-payment-info">
							<td colspan="2">
								<p>This figure represents your on going payment. So whatever frequency you selected (Weeks, Months, Fortnights), this is the value you will be required to pay each 
								week/fortnight/month.</p>
								<p>A very important thing to note is that the interest component of this figure is calculated on your total remaining principal (The amount you borrowed minus what 
								you've paid back.)</p>
								<p>A simple example: If you borrowed $500,000 over 25 years at 5% per annum and only had to pay once a year, each payment would be worth $35,476.23. The interest on 
								$500,000 at 5% is $25,000 though, so $34,476.24-$25,000= $9,476.</p>
								<p>So after your first payment of $34,476.24, you still owe over $490,500! However if you pay $60,000 instead of $34,476.24, the interest component is still $25,000, 
								so the remainder of your payment ($60,000-$25,000=$35,000) will go straight to the amount owing and after the first year you've paid off $35,000 and now have $465,000 
								owing!</p>
								<p>Let's say you have exactly the same situation as above, except you only have 5 years left. The amount you owe would be $149,264, and the interest component of your 
								years payment of $34,476.24 is only $7,463. As the long progresses, you pay off the amount owing faster! What this means is, if you pay more than you're required to at 
								the start of your loan, it will be significantly more effective in both reducing the time it will take you to pay back the loan and the total interest you pay! Free 
								feel to play around with the calculator to see how paying extra will affect your loan.</p>
							</td>
						</tr>
						<tr onclick="$('#results-variable-rate-payment-info').fadeToggle(200);">
							<th>Your periodic variable rate payment</th>
							<td id="results-variable-rate-payment"></td>
						</tr>
						<tr id="results-variable-rate-payment-info">
							<td colspan="2">
								<p>This is the value you will pay per week/month/fortnight IF this interest rate changes. This calculator lets you see what happens when a fixed interest rate switches to a 
							variable rate (able to fluctuate).</p>
							</td>
						</tr>
						<tr onclick="$('#results-extra-periodic-payment-info').fadeToggle(200);">
							<th>Your extra periodic payment</th>
							<td id="results-extra-periodic-payment"></td>
						</tr>
						<tr id="results-extra-periodic-payment-info">
							<td colspan="2">
								<p>This is the value of your on going periodic payment, PLUS the extra amount you've enter to pay. It is calculated by adding the value of your variable interest rate payment 
								plus the extra amount. The higher this is, the faster you'll be able to pay off your loan.</p>
							</td>
						</tr>
						<tr onclick="$('#results-adjusted-loan-duration-info').fadeToggle(200);">
							<th>Your adjusted loan duration (Years)</th>
							<td id="results-adjusted-loan-duration"></td>
						</tr>
						<tr id="results-adjusted-loan-duration-info">
							<td colspan="2">
								<p>The is the duration of your loan measured in years. If you choose $0 as your extra payment, the duration will be exactly the same as the time you choose. However with each 
								additional dollar you choose to pay, the time it takes to pay back the loan will decrease.</p>
							</td>
						</tr>
						<tr onclick="$('#results-total-payment-info').fadeToggle(200);">
							<th>Your current total payment</th>
							<td id="results-total-payment"></td>
						</tr>
						<tr id="results-total-payment-info">
							<td colspan="2">
								<p>This is the total money you will pay for the loan. It is calculated by adding the amount you chose to borrow, plus all the interest you pay on the loan.</p>
							</td>
						</tr>
						<tr onclick="$('#results-new-total-payment-info').fadeToggle(200);">
							<th>Your <em>new</em> total payment</th>
							<td id="results-new-total-payment"></td>
						</tr>
						<tr id="results-new-total-payment-info">
							<td colspan="2">
								<p>This is the total value you will pay for your loan after being adjusted for your additional payment. The difference between this value and the value above is the total you 
								save in interest payments!</p>
							</td>
						</tr>
						<tr onclick="$('#results-interest-paid-without-info').fadeToggle(200);">
							<th>Interest paid without your additional payment</th>
							<td id="results-interest-paid-without"></td>
						</tr>
						<tr id="results-interest-paid-without-info">
							<td colspan="2">
								<p>This is the total value of the interest you pay for having the loan. Think of the interest payment as the cost of borrowing, or the cost of the loan. The instituion you 
								borrowed from needs some incentive to offer you a loan, they also need to protect themselves from the time value of money. Remember what things cost 20 years ago? A dollar today 
								is worth less than a dollar yesterday.</p>
							</td>
						</tr>
						<tr onclick="$('#results-interest-saved-info').fadeToggle(200);">
							<th>Interest saved with the additional payment</th>
							<td id="results-interest-saved"></td>
						</tr>
						<tr id="results-interest-saved-info">
							<td colspan="2">
								<p>This is possibly the most important value the calculator provides, this is the total value of your savings by paying more each period. It may seem counter intuitive to think 
								that paying more will somehow save you money. The explaination is that by paying more, you pay back the amount owing faster.</p>
								<p>As you pay this value back quickly, the total duration of the loan decreases, you might be able to pay your loan back in 20 years instead of 25 years. If you're paying weekly, 
								that would mean you just saved yourself 260 weeks of loan repayments!</p>
							</td>
						</tr>
					</table>
				</div>
				<br /><br />
				<div id="form-nav">
					<div class="row">
						<div class="col-md-6 half"><button type="button" class="btn btn-primary btn-large" onclick="previous();" id="previous-button" disabled="true">Previous</button></div>
						<div class="col-md-6 half" style="text-align: right;"><button type="button" class="btn btn-success btn-large" onclick="next();" id="next-button">Next</button></div>
					</div><br />
					<div class="progress">
						<div id="progress-bar" class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
							<span class="sr-only">0% Complete</span>
						</div>
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

		<!-- Bootstrap Addons -->
		<script src="/scripts/bootstrap-dialog.js" type="text/javascript"></script>
	</body>
</html>