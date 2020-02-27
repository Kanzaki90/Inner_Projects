var table_builder_module = (function () {

    function _table_builder(i_data) {
        console.log("Inside table builder");
        console.log(i_data);

        var table = document.querySelector("#log_table");
        var export_to_pdf = document.querySelector("#export_to_pdf");

        if (i_data.length > 0) {

            table.style.display = "";
            export_to_pdf.style.display = "";
        }


        let body = document.querySelector("#log_table_body");
        if (body.childElementCount > 0) {
            while (body.childElementCount != 0) {
                body.firstElementChild.remove();
            }
        }

        for (let i = 0; i < i_data.length; i++) {

            let tr = document.createElement("tr");
            // #
            let td = document.createElement("td");
            td.innerHTML = i + 1;
            tr.appendChild(td);

            // Phone Number
            td = document.createElement("td");
            td.innerHTML = i_data[i].phone_number;
            tr.appendChild(td);

            // Message
            td = document.createElement("td");
            td.innerHTML = i_data[i].message;
            tr.appendChild(td);

            // Send Time
            td = document.createElement("td");
            td.innerHTML = i_data[i].send_time;
            tr.appendChild(td);

            body.appendChild(tr);
        }

    }


    return {
        table_builder: _table_builder
    }

}());