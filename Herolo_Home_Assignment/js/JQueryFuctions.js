$(document).ready(function () {

    $("#add_fvrt_btn").click(function () {
        let x = document.getElementsByClassName("_custom_class");
        let city = x[0].id.split(":")[1];

        localStorage.setItem(city, global_current_forecast);
        document.querySelector("#rmv_fvrt_btn").style.display = "";
        document.querySelector("#add_fvrt_btn").style.display = "none";
        document.querySelector("#favorited_indicator").innerText = "This city is saved in your favorites";


    });

    $("#rmv_fvrt_btn").click(function () {
        let x = document.getElementsByClassName("_custom_class");
        let city = x[0].id.split(":")[1];

        localStorage.removeItem(city);
        document.querySelector("#rmv_fvrt_btn").style.display = "none";
        document.querySelector("#add_fvrt_btn").style.display = "";
        document.querySelector("#favorited_indicator").innerText = "This city haven't been saved in your favorites";
    });


    $("#toggle").click(function () {
        if (document.body.style.backgroundColor == "lightgray")
            document.body.style.backgroundColor = "darkgrey";
        else
            document.body.style.backgroundColor = "lightgray";
    });

});

