var auto_complete_module = (function () {


    function _search(i_city, callback) {

        // let url = "http://dataservice.accuweather.com/locations/v1/cities/autocomplete?apikey=aMmqZLi2OPbyU9XtvGrRcWryO67u1BJO&q=" + i_city + "&language=en-US";

        //walla
        let url = "https://dataservice.accuweather.com/locations/v1/cities/autocomplete?apikey=GWCsM5VwA33NiOJkmMSRGanNNPLM8Gtr&q=" + i_city + "&language=en-US";

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {
                let income_data = JSON.parse(this.responseText);

                if (income_data.length === 0) {
                    modal_toggler("Something wrong came back from the server =( ");
                    return "";
                }

                let city_id_key = income_data[0]["Key"];
                callback(city_id_key, i_city);
            }
        };

        xhttp.open("GET", url, true);
        xhttp.send();
    }

    return {
        search: _search
    };

}());