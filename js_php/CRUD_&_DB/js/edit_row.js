function edit_row(i_row_id) {
  let col_id = "col_" + i_row_id.id.split("_")[1];
  let cols = document.querySelectorAll("." + col_id);

  for (let i = 0; i < cols.length; i++) {
    cols[i].disabled = false;
  }
}

function save_edited_row(i_row_id) {
  let col_id = "col_" + i_row_id.id.split("_")[1];
  let cols = document.querySelectorAll("." + col_id);

  for (let i = 0; i < cols.length; i++) {
    cols[i].disabled = true;
  }

  let obj_to_send = {
    op: "edit",
    registered: cols[0].innerText,
    firstname: cols[1].value,
    lastname: cols[2].value,
    email: cols[3].value,
    password: cols[4].value
  };

  console.log(obj_to_send);

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
}

function delete_row(i_row_id) {
  if (!confirm("Are you sure???")) return "";

  let col_id = "col_" + i_row_id.id.split("_")[1];
  let cols = document.querySelectorAll("." + col_id);

  let obj_to_send = {
    op: "delete",
    registered: cols[0].innerText
  };

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
}
