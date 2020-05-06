var tableBuilderModule = (function () {

    function _tableBuilder(i_data) {

        var body = document.querySelector("#mainTbody");

        for (let i = 0; i < i_data.length; i++) {

            let tr = document.createElement("tr");

            let td = _tdCreator();
            td.innerHTML = i + 1;
            tr.appendChild(td);

            td = _tdCreator();
            td.innerHTML = i_data[i]["firstname"];
            tr.appendChild(td);

            td = _tdCreator();
            td.innerHTML = i_data[i]["lastname"];
            tr.appendChild(td);

            td = _tdCreator();
            td.innerHTML = i_data[i]["login_time"];
            tr.appendChild(td);

            body.appendChild(tr);
        }
    }

    function _tdCreator() {
        let td = document.createElement("td");
        return td;
    }

    return {
        tableBuilder: _tableBuilder
    };
})();
