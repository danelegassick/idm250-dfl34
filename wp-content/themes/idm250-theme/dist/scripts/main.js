console.log('hi!');

const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav ul");
const links = document.querySelectorAll(".nav ul a");
const introText = document.querySelector(".intro-text");
hamburger.addEventListener("click", () => {
  navLinks.classList.toggle("nav-open");
  document.body.classList.toggle("hide");
  document.querySelector("html").classList.toggle("hide");
});
links.forEach((link) => {
  link.addEventListener("click", () => {
    navLinks.classList.toggle("nav-open");
    document.body.classList.remove("hide");
    document.querySelector("html").classList.remove("hide");
  });
});