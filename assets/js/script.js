function validateForm(formId) {
  const form = document.getElementById(formId);
  const inputs = form.querySelectorAll("input[required], textarea[required], select[required]");
  for (let input of inputs) {
    if (!input.value.trim()) {
      alert(`Please fill out the ${input.name} field.`);
      input.focus();
      return false;
    }
  }
  alert("Form submitted successfully!");
  return true;
}

function searchDonors() {
  const bloodGroup = document.getElementById("bloodGroup").value;
  const results = document.getElementById("results");
  results.innerHTML = `<p>Searching donors with blood group <b>${bloodGroup}</b>...</p>`;
  setTimeout(() => {
    results.innerHTML = `<div class='donor-card'><h3>John Doe</h3><p>Blood Group: ${bloodGroup}</p><p>City: Delhi</p></div>`;
  }, 1000);
}