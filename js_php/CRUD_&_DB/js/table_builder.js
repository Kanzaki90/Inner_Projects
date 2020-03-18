var table_builder_module = (function() {
  function _table_builder(i_data) {
    console.log("Inside table builder");

    var body = document.querySelector("#log_table");

    if (body.childElementCount > 0) {
      while (body.childElementCount != 0) {
        body.firstElementChild.remove();
      }
    }
    for (let i = 0; i < i_data.length; i++) {
      let tr = document.createElement("tr");
      tr.setAttribute("id", "row_" + i);

      let td = _td_creator();
      td.setAttribute("class", "col_" + i);
      td.innerHTML = i_data[i]["registered"];
      tr.appendChild(td);

      td = _td_creator();
      let input = _input_creator(i);
      input.value = i_data[i]["firstname"];
      td.appendChild(input);
      tr.appendChild(td);

      td = _td_creator();
      input = _input_creator(i);
      input.value = i_data[i]["lastname"];
      td.appendChild(input);
      tr.appendChild(td);

      td = _td_creator();
      input = _input_creator(i);
      input.value = i_data[i]["email"];
      td.appendChild(input);
      tr.appendChild(td);

      td = _td_creator();
      input = _input_creator(i);
      input.value = i_data[i]["password"];
      td.appendChild(input);
      tr.appendChild(td);

      td = _td_creator();
      td.innerHTML = i_data[i]["edited"];
      tr.appendChild(td);

      td = _td_creator();
      let btn = document.createElement("button");
      btn.setAttribute("class", "btn-primary");
      btn.setAttribute("onclick", "edit_row(row_" + i + ");");
      btn.innerText = "Edit";
      td.appendChild(btn);
      tr.appendChild(td);

      td = _td_creator();
      btn = document.createElement("button");
      btn.setAttribute("class", "btn-secondary col_" + i);
      btn.setAttribute("onclick", "save_edited_row(row_" + i + ");");
      btn.setAttribute("disabled", "true");
      btn.innerText = "Save";
      td.appendChild(btn);
      tr.appendChild(td);

      td = _td_creator();
      btn = document.createElement("button");
      btn.setAttribute("class", "btn-secondary col_" + i);
      btn.setAttribute("onclick", "delete_row(row_" + i + ");");
      btn.innerText = "Delete Row";
      td.appendChild(btn);
      tr.appendChild(td);

      body.appendChild(tr);
    }
  }

  function _td_creator() {
    let td = document.createElement("td");
    return td;
  }

  function _input_creator(i) {
    let input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "col_" + i);
    input.setAttribute("disabled", "true");
    return input;
  }
  return {
    table_builder: _table_builder
  };
})();
