/* ====== START CODING OF FORM TO SHOW AND HIDE PASSWORD ====== */
const fieldPass = document.querySelector(".password");

const showPass = document.querySelector(".iconInputLockShow");

showPass.addEventListener("click", () => {
  if (showPass.classList.contains("fa-eye-slash")) {
    showPass.classList.remove("fa-eye-slash");
    showPass.classList.add("fa-eye");
    fieldPass.type = "text";
  } else {
    showPass.classList.add("fa-eye-slash");
    showPass.classList.remove("fa-eye");
    fieldPass.type = "password";
  }
});

const loginUsernameError = document.getElementById("loginUsernameError");
const loginPasswordError = document.getElementById("loginPasswordError");

const loginUsername = document.getElementById("loginUsername");
const loginPassword = document.getElementById("loginPassword");

if (loginUsernameError.innerHTML.trim().length > 0) {
  loginUsername.style.borderColor = "#ca0000";
}

if (loginPasswordError.innerHTML.trim().length > 0) {
  loginPassword.style.borderColor = "#ca0000";
}
