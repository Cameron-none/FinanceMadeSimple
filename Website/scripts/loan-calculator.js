var currentStep = 1, steps = null, progressBar = null, previousButton = null, nextButton = null;

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

function previous() {
	if (currentStep > 1) {
		$(steps[currentStep - 1]).fadeOut(200, function() {
			$(steps[currentStep - 1]).fadeIn(200);
		});
		currentStep--;
	}

	updateProgress();
}

function next() {
	if (currentStep < steps.length) {
		$(steps[currentStep - 1]).fadeOut(200, function() {
			$(steps[currentStep - 1]).fadeIn(200);
		});
		currentStep++;
	}

	updateProgress();
}

function prepare() {
	steps = document.getElementsByClassName("form-step");
	progressBar = document.getElementById("progress-bar");
	previousButton = document.getElementById("previous-button");
	nextButton = document.getElementById("next-button");

	updateProgress();
}

window.onload = prepare;