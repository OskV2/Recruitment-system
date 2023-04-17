const jobSelect = document.getElementById('job');
const jobInput = document.getElementById('job_input');

  jobSelect.addEventListener('change', function() {
    const selectedJob = jobSelect.value;
    jobInput.value = selectedJob;
});
