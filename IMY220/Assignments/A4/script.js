$(document).ready(function () {
  $(".container .col button").on("click", function () {
    //__________________________________________________________section 1
    var message = $("#message").val();
    if (message.length > 0) {
      $(".messages.row").prepend(
        "<div class='col-4 offset-4 rounded mb-3'><div class='messages'>" +
          message +
          "</div></div>"
      );
      //clear textarea
      $("#message").val("");
    }

    //__________________________________________________________section 2
    const youTubeRegex = /^(https:\/\/www\.youtube\.com)/gm;
  });
});
