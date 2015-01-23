var currentStep = 0, steps = null, progressBar = null, previousButton = null, nextButton = null;

function calculateResults() {
	var paymentFrequency = parseFloat($("#payment-frequency")[0].value);
	var borrowAmount = parseFloat($("#borrow-amount")[0].value);
	var loanYears = parseFloat($("#loan-years")[0].value);
	var fixedInterestYears = parseFloat($("#fixed-period")[0].value);
	var fixedInterestRate = parseFloat($("#fixed-interest-rate")[0].value);
	var loanLength = parseFloat($("#loan-length")[0].value);
	var variableInterestRate = parseFloat($("#variable-interest-rate")[0].value);
	var payAtEnd = parseFloat($("#pay-at-end")[0].value);

	var rRateFx = fixedInterestRate / (paymentFrequency * 100);
	var rDurati = loanLength * paymentFrequency
	var stepOne = (rRateFx + 1);
	var stepTwo = (Math.pow(stepOne, -rDurati));
	var stepThr = (stepTwo - 1) * -1;
	var stepFou = stepThr / rRateFx
	var fixdPay = borrowAmount / stepFou
	var fixdPyy = Math.round(fixdPay * 100) / 100;

	if (loanYears > fixedInterestYears) {
		var step111 = (loanLength - loanYears) * paymentFrequency
		var step222 = (Math.pow(stepOne, -step111));
		var step333 = (step222 - 1) * -1;
		var step444 = step333 / rRateFx;
		var pvCurLo = Math.round((step444 * fixdPay) * 100) / 100;

		var rVarInt = variableInterestRate / (paymentFrequency * 100);
		var type000 = (rVarInt + 1)
		var type111 = (Math.pow(type000, -step111));
		var type222 = (type111 - 1) * -1
		var type333 = type222 / rVarInt
		var newPAMT = pvCurLo / type333
		var newPAM1 = Math.round(newPAMT * 100) / 100;

		var newPay1 = newPAMT - (-payAtEnd);
		var iTil111 = pvCurLo / newPay1;
		var iTil222 = iTil111 * rVarInt;
		var iTil333 = (iTil222 - 1) * -1;
		var iTil444 = (Math.log(iTil333) / Math.log(type000)) * -1
		var years11 = loanYears + (iTil444 / paymentFrequency);
		var years12 = Math.round(years11 * 100) / 100;


		var totPay1 = (paymentFrequency * loanYears * fixdPay) + (iTil444 * newPay1);
		var totPy03 = Math.round(totPay1 * 100) / 100;
		var totPay2 = Math.round((totPay1) * 1) / 1;
		var totPay0 = (fixdPay * fixedInterestYears * paymentFrequency) + (loanLength - fixedInterestYears) * (paymentFrequency * newPAMT)
		var intPay1 = totPay0 - borrowAmount;
		var intPay3 = Math.round(intPay1 * 100) / 100;
		var intPay2 = totPay0 - totPay1
		var intPay4 = Math.round(intPay2 * 100) / 100;
		var newPay2 = Math.round(newPay1 * 100) / 100;
		var totPy01 = Math.round(totPay0 * 100) / 100;
		if (payAtEnd === 0) {
			intPay4 = 0
		}
		if (payAtEnd === 0) {
			totPy03 = totPy01
		}
	} else {
		var step111 = (loanLength - fixedInterestYears) * paymentFrequency
		var step222 = (Math.pow(stepOne, -step111));
		var step333 = (step222 - 1) * -1;
		var step444 = step333 / rRateFx;
		var pvCurLo = Math.round((step444 * fixdPay) * 100) / 100;

		var rVarInt = variableInterestRate / (paymentFrequency * 100);
		var type000 = (rVarInt + 1)
		var type111 = (Math.pow(type000, -step111));
		var type222 = (type111 - 1) * -1
		var type333 = type222 / rVarInt
		var newPAMT = pvCurLo / type333
		var newPAM1 = Math.round(newPAMT * 100) / 100;

		var newPay1 = newPAMT - (-payAtEnd);
		var iTil111 = pvCurLo / newPay1;
		var iTil222 = iTil111 * rVarInt;
		var iTil333 = (iTil222 - 1) * -1;
		var iTil444 = (Math.log(iTil333) / Math.log(type000)) * -1
		var years11 = fixedInterestYears + (iTil444 / paymentFrequency);
		var years12 = Math.round(years11 * 100) / 100;


		var totPay1 = (paymentFrequency * fixedInterestYears * fixdPay) + (iTil444 * newPay1)
		var totPy03 = Math.round(totPay1 * 100) / 100;
		var totPay2 = Math.round((totPay1) * 1) / 1;
		var totPay0 = (fixdPay * fixedInterestYears * paymentFrequency) + (loanLength - fixedInterestYears) * (paymentFrequency * newPAMT)
		var intPay1 = totPay0 - borrowAmount;
		var intPay3 = Math.round(intPay1 * 100) / 100;
		var intPay2 = totPay0 - totPay1
		var intPay4 = Math.round(intPay2 * 100) / 100;
		var newPay2 = Math.round(newPay1 * 100) / 100;
		var totPy01 = Math.round(totPay0 * 100) / 100;
		if (payAtEnd === 0) {
			intPay4 = 0
		}
		if (payAtEnd === 0) {
			totPy03 = totPy01
		}
	}

	$("#results-periodic-payment")[0].innerHTML = "$" + fixdPyy;
	$("#results-variable-rate-payment")[0].innerHTML = "$" + newPAM1;
	$("#results-extra-periodic-payment")[0].innerHTML = "$" + newPay2;
	$("#results-adjusted-loan-duration")[0].innerHTML = years12;
	$("#results-total-payment")[0].innerHTML = "$" + totPy01;
	$("#results-new-total-payment")[0].innerHTML = "$" + totPy03;
	$("#results-interest-paid-without")[0].innerHTML = "$" + intPay3;
	$("#results-interest-saved")[0].innerHTML = "$" + intPay4;
}

function validateInput() {
	$("main-form").submit();

	switch (currentStep) {
		case 1:
			if (!$("#borrow-amount")[0].checkValidity() || $("#borrow-amount")[0].value <= 0) {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Error',
		            message: 'Please enter a valid dollar amount representing how much money you wish to borrow.'
		        });

		        return false;
			}
		break;
		case 2:
			if (!$("#loan-years")[0].checkValidity() || $("#loan-years")[0].value < 0 || $("#loan-years")[0].value == "") {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: 'Please enter a valid number representing how many years you have had the loan.'
				});

				return false;
			}
		break;
		case 4:
			if (!$("#fixed-interest-rate")[0].checkValidity() || $("#fixed-interest-rate")[0].value < 0 || 
				$("#fixed-interest-rate")[0].value >= 100 || $("#fixed-interest-rate")[0].value == "") {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: 'Please enter a valid interest rate as a percentage.'
				});

				return false;
			}
		break;
		case 5:
			if (!$("#loan-length")[0].checkValidity() || $("#loan-length")[0].value <= 0 || $("#loan-length")[0].value == "") {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: 'Please enter a valid number representative of your loan\'s duration in years.'
				});

				return false;
			}
		break;
		case 6:
			if (!$("#variable-interest-rate")[0].checkValidity() || $("#variable-interest-rate")[0].value < 0 || 
				$("#variable-interest-rate")[0].value >= 100 || $("#variable-interest-rate")[0].value == "") {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: 'Please enter a valid interest rate as a percentage.'
				});

				return false;
			}
		break;
		case 7:
			if (!$("#pay-at-end")[0].checkValidity() || $("#pay-at-end")[0].value <= 0) {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Error',
		            message: 'Please enter a valid dollar amount representing how much money you wish to pay at the end of the fixed interest period.'
		        });

		        return false;
			}
		break;
	}

	if (currentStep == steps.length) {
		calculateResults();
	}

	return true;
}

function updateProgress(step) {
	progressBar.style.width = (step - 1) / steps.length * 100 + "%";
	
	if (step == steps.length) {
		$(previousButton).prop('disabled', false);
		nextButton.innerHTML = "Finish";
	}
	else if (step == 1) {
		$(previousButton).prop('disabled', true);
		nextButton.innerHTML = "Next";
	}
	else if (step > steps.length) {
		$(previousButton).prop('disabled', true);
		nextButton.innerHTML = "Restart";
		nextButton.onclick = restart;
	}
	else {
		$(previousButton).prop('disabled', false);
		nextButton.innerHTML = "Next";
	}
}

function goToStep(stepNumber) {
	if (stepNumber > steps.length) {
		$("#form-steps").fadeOut(200, function() {
			$("#results").fadeIn(200);
		});
	}
	else {
		$(steps[currentStep - 1]).fadeOut(200, function() {
			$(steps[stepNumber - 1]).fadeIn(200);
			currentStep = stepNumber;
		});
	}
			
	$("body").animate(
		{
			scrollTop: 0
		}, 
			800, 
			function(){
				$("body").clearQueue();
			}
		);

	updateProgress(stepNumber);
}

/*function focusNextField() {
	var field = $(steps[currentStep - 1])[0].getElementsByTagName("input");

	if (field != null) {
		field[0].focus();
	}
}*/

function previous() {
	if (currentStep > 1) {
		goToStep(currentStep - 1);
	}
}

function next() {
	if (validateInput() && currentStep <= steps.length) {
		goToStep(currentStep + 1);
	}
}

function start() {
	$("#welcome").fadeOut(200, function() {
		$("#form-steps").fadeIn(200);
		$("#form-nav").fadeIn(200);
		currentStep = 1;
		goToStep(1);
	});
}

function restart() {
	goToStep(1);

	$("#results").fadeOut(200, function() {
		$("#form-steps")[0].style.display = "block";
		$("#main-form")[0].reset();
	});

	nextButton.onclick = next;
	nextButton.innerHTML = "Next";
}

function checkForReturn(event) {
	if(event.keyCode == 13){
        next();
    }
}

function prepare() {
	steps = document.getElementsByClassName("form-step");
	progressBar = document.getElementById("progress-bar");
	previousButton = document.getElementById("previous-button");
	nextButton = document.getElementById("next-button");

	document.getElementById("main-form").submit = validateInput;

	updateProgress(0);


    $('[data-toggle="popover"]').popover({
    	title: "Information",
        placement: "left",
        html: true
    });
}

window.onload = prepare;