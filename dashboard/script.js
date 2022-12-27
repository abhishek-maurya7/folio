let container = document.querySelector(".greeting");
let timeNow = new Date().getHours();
let greeting =
  timeNow >= 5 && timeNow < 12
    ? "Good Morning"
    : timeNow >= 12 && timeNow < 16
    ? "Good Afternoon"
    : "Good Evening";
container.innerHTML = `<h1>${greeting}</h1>`;
