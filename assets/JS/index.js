/* ====== START CONDING OF ACTIVE NAVIGATION ====== */
const nav = document.getElementById("nav");
const togglleM = document.getElementById("navToggles");

togglleM.addEventListener("click", () => {
  nav.classList.toggle("active");
});

togglleM.addEventListener("click", () => {
  togglleM.classList.toggle("active");
});

const navLinkProfile = document.getElementById("navLinkProfile");
const navLinkProfileIcon = document.getElementById("navLinkProfileIcon");
const dropDwonMenu = document.getElementById("drop-dwon-menu");

navLinkProfile.addEventListener("click", () => {
  dropDwonMenu.classList.toggle("active");
  if (navLinkProfileIcon.classList.contains("fa-caret-down")) {
    navLinkProfileIcon.classList.toggle("fa-caret-up");
  }
});

/* ====== START CONDING OF SHOW FORM LOGIN AND SGINUP ====== */
const links = document.querySelectorAll(".menu .shortCute");
const input_search = document.getElementById("search");
const overlay_search = document.querySelector(".overlay_search");
const l_header = document.querySelector(".l-header");
const searchForm = document.getElementById("inputBoxSearch");
const autocomBox = document.querySelector(".box-search .autocom-box");

links.forEach((link) => {
  link.addEventListener("click", () => {
    input_search.focus();
  });
});

input_search.addEventListener("focus", () => {
  overlay_search.classList.add("active");
  autocomBox.classList.add("active");
});

overlay_search.addEventListener("click", () => {
  overlay_search.classList.remove("active");
  autocomBox.classList.remove("active");
});
