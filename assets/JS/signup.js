const fieldPassword = document.querySelector(".r-p");
const fieldConfirmPassword = document.querySelector(".r-c-p");

const showPassword = document.querySelector(".su-ic-p");
const showConfirmPassword = document.querySelector(".su-ic-p-2");

showPassword.addEventListener("click", () => {
  if (showPassword.classList.contains("fa-eye-slash")) {
    showPassword.classList.remove("fa-eye-slash");
    showPassword.classList.add("fa-eye");
    fieldPassword.type = "text";
  } else {
    showPassword.classList.add("fa-eye-slash");
    showPassword.classList.remove("fa-eye");
    fieldPassword.type = "password";
  }
});

showConfirmPassword.addEventListener("click", () => {
  if (showConfirmPassword.classList.contains("fa-eye-slash")) {
    showConfirmPassword.classList.remove("fa-eye-slash");
    showConfirmPassword.classList.add("fa-eye");
    fieldConfirmPassword.type = "text";
  } else {
    showConfirmPassword.classList.add("fa-eye-slash");
    showConfirmPassword.classList.remove("fa-eye");
    fieldConfirmPassword.type = "password";
  }
});

const registerUsernameError = document.getElementById("registerUsernameError");
const registerEmailError = document.getElementById("registerEmailError");
const registerPasswordError = document.getElementById("registerPasswordError");
const registerConfirmPasswordError = document.getElementById(
  "registerConfirmPasswordError"
);

const registerUsername = document.getElementById("registerUsername");
const registerEmail = document.getElementById("registerEmail");
const registerPassword = document.getElementById("registerPassword");
const registerConfirmPassword = document.getElementById(
  "registerConfirmPassword"
);

if (registerUsernameError.innerHTML.trim().length > 0) {
  registerUsername.style.borderColor = "#ca0000";
}

if (registerEmailError.innerHTML.trim().length > 0) {
  registerEmail.style.borderColor = "#ca0000";
}

if (registerPasswordError.innerHTML.trim().length > 0) {
  registerPassword.style.borderColor = "#ca0000";
}

if (registerConfirmPasswordError.innerHTML.trim().length > 0) {
  registerConfirmPassword.style.borderColor = "#ca0000";
}
