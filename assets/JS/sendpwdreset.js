const sendPwdReset = document.getElementById("sendPwdReset");
const sendConfirmPwdReset = document.getElementById("sendConfirmPwdReset");

const iconInputConfirmLock = document.getElementById("iconInputConfirmLock");
const iconInputLock = document.getElementById("iconInputLock");

iconInputLock.addEventListener("click", () => {
  if (iconInputLock.classList.contains("fa-eye-slash")) {
    iconInputLock.classList.remove("fa-eye-slash");
    iconInputLock.classList.add("fa-eye");
    sendPwdReset.type = "text";
  } else {
    iconInputLock.classList.remove("fa-eye");
    iconInputLock.classList.add("fa-eye-slash");
    sendPwdReset.type = "password";
  }
});

iconInputConfirmLock.addEventListener("click", () => {
  if (iconInputConfirmLock.classList.contains("fa-eye-slash")) {
    iconInputConfirmLock.classList.remove("fa-eye-slash");
    iconInputConfirmLock.classList.add("fa-eye");
    sendConfirmPwdReset.type = "text";
  } else {
    iconInputConfirmLock.classList.remove("fa-eye");
    iconInputConfirmLock.classList.add("fa-eye-slash");
    sendConfirmPwdReset.type = "password";
  }
});
