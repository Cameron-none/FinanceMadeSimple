var currentStep = 1, steps = null, progressBar = null, previousButton = null, nextButton = null;

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
			if (!$("#loan-years")[0].checkValidity() || $("#loan-years")[0].value <= 0) {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_DANGER,
					title: 'Error',
		            message: 'Please enter a valid number representing how many years you have had the loan.'
		        });

		        return false;
			}
			else {
				BootstrapDialog.show({
					type: BootstrapDialog.TYPE_SUCCESS,
					title: 'Success',
		            message: 'Successfully completed the form!'
		        });
			}
		break;
		case 3:
		break;
	}

	return true;
}

function updateProgress() {
	progressBar.style.width = (currentStep - 1) / steps.length * 100 + "%";
	
	if (currentStep == steps.length) {
		$(previousButton).prop('disabled', false);
		nextButton.innerHTML = "Finish";
	}
	else if (currentStep == 1) {
		$(previousButton).prop('disabled', true);
		nextButton.innerHTML = "Next";
	}
	else {
		$(previousButton).prop('disabled', false);
		nextButton.innerHTML = "Next";
	}
}

function goToStep(stepNumber) {
	$(steps[currentStep - 1]).fadeOut(200, function() {
		$(steps[stepNumber - 1]).fadeIn(200);
	});
}

function previous() {
	if (currentStep > 1) {
		goToStep(currentStep - 1);
		currentStep--;
	}

	updateProgress();
}

function next() {
	if (validateInput() && currentStep < steps.length) {
		goToStep(currentStep + 1);
		currentStep++;
	}

	updateProgress();
}

function prepare() {
	steps = document.getElementsByClassName("form-step");
	progressBar = document.getElementById("progress-bar");
	previousButton = document.getElementById("previous-button");
	nextButton = document.getElementById("next-button");

	document.getElementById("main-form").submit = validateInput;

	updateProgress();
}

window.onload = prepare;