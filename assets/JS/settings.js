const registerNewPassword = document.getElementById("registerNewPassword");
const iconShowPassword = document.getElementById("iconShowPassword1");

const registerNewPassword2 = document.getElementById("registerNewPassword2");
const iconShowPassword2 = document.getElementById("iconShowPassword2");

iconShowPassword.onclick = function () {
  if (iconShowPassword.classList.contains("fa-eye-slash")) {
    iconShowPassword.classList.remove("fa-eye-slash");
    iconShowPassword.classList.add("fa-eye");
    registerNewPassword.type = "text";
  } else {
    iconShowPassword.classList.add("fa-eye-slash");
    iconShowPassword.classList.remove("fa-eye");
    registerNewPassword.type = "password";
  }
};

iconShowPassword2.onclick = function () {
  if (iconShowPassword2.classList.contains("fa-eye-slash")) {
    iconShowPassword2.classList.remove("fa-eye-slash");
    iconShowPassword2.classList.add("fa-eye");
    registerNewPassword2.type = "text";
  } else {
    iconShowPassword2.classList.add("fa-eye-slash");
    iconShowPassword2.classList.remove("fa-eye");
    registerNewPassword2.type = "password";
  }
};
