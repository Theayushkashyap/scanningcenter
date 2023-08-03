<script>
let valueDisplays = document.querySelectorAll(".num");
let patientValueDisplay = valueDisplays[0]; // Selecting the element for the number of patients
let staffValueDisplay = valueDisplays[1]; // Selecting the element for the number of staff
let interval = -10000;

// Adjust the duration to increase or decrease the speed of the counters.
let patientDuration = 10; // Change this value to adjust the speed of patient counter.
let staffDuration = 50; // Change this value to slow down the staff counter.

let startPatientValue = 1000;
let endPatientValue = parseInt(patientValueDisplay.getAttribute("data-val"));

let startStaffValue = 1000;
let endStaffValue = parseInt(staffValueDisplay.getAttribute("data-val"));

function updatePatientCounter() {
    startPatientValue += Math.ceil((endPatientValue - startPatientValue) / patientDuration);
    patientValueDisplay.textContent = (startPatientValue < endPatientValue ? startPatientValue : endPatientValue) + "+";
    if (startPatientValue < endPatientValue) {
        requestAnimationFrame(updatePatientCounter);
    }
}

function updateStaffCounter() {
    startStaffValue += Math.ceil((endStaffValue - startStaffValue) / staffDuration);
    staffValueDisplay.textContent = (startStaffValue < endStaffValue ? startStaffValue : endStaffValue);
    if (startStaffValue < endStaffValue) {
        requestAnimationFrame(updateStaffCounter);
    }
}

updatePatientCounter();
updateStaffCounter();
</script>