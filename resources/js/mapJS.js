$(document).ready(function () {

    if(document.getElementById('householdRadio').checked) {
        document.getElementById('householdForm').style.display = 'block';
        document.getElementById('workerForm').style.display = 'none';
    } else if(document.getElementById('workerRadio').checked) {
        document.getElementById('householdForm').style.display = 'none';
        document.getElementById('workerForm').style.display = 'block';
    }
});
