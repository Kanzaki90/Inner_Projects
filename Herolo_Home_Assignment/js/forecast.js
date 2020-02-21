var forecast_module = (function () {


    function _get_gurrent_conditions(i_city_id_key) {

        //let url = "http://dataservice.accuweather.com/currentconditions/v1/" + i_city_id_key + "?apikey=aMmqZLi2OPbyU9XtvGrRcWryO67u1BJO&language=en-US&details=true";
        
        //walla
        let url = "http://dataservice.accuweather.com/currentconditions/v1/" + i_city_id_key + "?apikey=GWCsM5VwA33NiOJkmMSRGanNNPLM8Gtr&language=en-US&details=true";
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                let income_data = JSON.parse(this.responseText);
                temp2 = income_data;

                let celcius = income_data[0]["ApparentTemperature"]["Metric"]["Value"];
                let fahrenheit = income_data[0]["ApparentTemperature"]["Imperial"]["Value"];

                let current = {
                    celcius: celcius,
                    fahrenheit, fahrenheit
                }

                _get_five_days_forecast(i_city_id_key, current);

            }
        };

        xhttp.open("GET", url, true);
        xhttp.send();

    }


    function _get_five_days_forecast(i_city_id_key, current_weather) {


        // let url = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/" + i_city_id_key + "?apikey=aMmqZLi2OPbyU9XtvGrRcWryO67u1BJO&language=en-US&details=true&metric=true";
        //walla
        let url = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/" + i_city_id_key + "?apikey=GWCsM5VwA33NiOJkmMSRGanNNPLM8Gtr&language=en-US&details=true&metric=true";

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                let income_data = JSON.parse(this.responseText);

                data_analyzer(current_weather, income_data.DailyForecasts);
            }
        };

        xhttp.open("GET", url, true);
        xhttp.send();
    }

    function _start_retrieval(i_city_id) {
        console.log(i_city_id);

        _get_gurrent_conditions(i_city_id);
    }

    return {
        start_retrieval: _start_retrieval
    };


}());