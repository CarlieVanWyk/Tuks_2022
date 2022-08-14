$(document).ready(function () {
  $("#dayNightBTN").click(function () {
    if (localStorage.getItem("theme") == "day") {
      $(".dayNight").toggleClass("change");
      localStorage.setItem("theme", "night");
    } else {
      $(".dayNight").toggleClass("change");
      localStorage.setItem("theme", "day");
    }
  });
});
