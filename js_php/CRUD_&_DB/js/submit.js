$(document).ready(function() {
  $("#frm_submit").click(function() {
    let data = document.querySelectorAll(".custom-data");
    let obj_to_send = {};

    for (let i = 0; i < data.length; i++) {
      if (
        typeof obj_to_send[data[i].id] === "undefined" &&
        data[i].value != ""
      ) {
        obj_to_send[data[i].id] = data[i].value;
      }
    }

    obj_to_send["op"] = "insert";

    let url = "http://127.0.0.1/_Test/controllers/Router.php";

    $.ajax({
      url: url,
      type: "post",
      data: obj_to_send,
      async: true,
      success: function(response) {
        $("#show_all").click();
      }
    });
  });
});
