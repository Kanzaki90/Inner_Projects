function makeRequest() {
  
  let url = "server/controllers/LoginController.php";
  let obj_to_send = {};
  obj_to_send["op"] = "pullData";

  $.ajax({
    url: url,
    type: "post",
    data: obj_to_send,
    async: true,
    success: function (response) {
      let dbResponse = JSON.parse(response);
      tableBuilderModule.tableBuilder(dbResponse);
    }
  });
}

$(document).ready(function () {
  makeRequest();
});