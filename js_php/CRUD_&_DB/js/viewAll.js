$(document).ready(function() {
  $("#show_all").click(function() {
    var obj_to_send = {};
    obj_to_send["op"] = "select";

    let url = "http://127.0.0.1/_Test/controllers/Router.php";

    $.ajax({
      url: url,
      type: "post",
      data: obj_to_send,
      async: true,
      success: function(response) {
        table_builder_module.table_builder(JSON.parse(response));
      }
    });
  });
});
