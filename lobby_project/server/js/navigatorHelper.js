
function showCarousel() {

    $("#carouselModal").modal("show");
    let innerCarousel = document.getElementById("innerCarousel");
    let carousel = document.getElementById("myCarousel");
    carousel.style.display = "";

    for (let i = 1; i <= 44; i++) {

        let div = elCreator("div");
        let img = elCreator("img");
        if (i === 1)
            div.setAttribute("class", "carousel-item active");
        else
            div.setAttribute("class", "carousel-item");

        img.setAttribute("class", "d-block w-100");
        img.setAttribute("src", "server/img/carousel/" + i + ".jpg");

        div.appendChild(img);
        innerCarousel.appendChild(div);
    }
}

function elCreator(el) {
    let div = document.createElement(el);
    return div;
}

function showAgenda() {

    $("#agendaModal").modal("show");
    $("#agenda-modal-navigator").load("server/helpers/agendaNavigator.html");
    $('#agenda-content').load("server/helpers/agendaBody.html");
    $('#agenda-modal-footer').load("server/helpers/agendaFooter.html");

}

function accordionToggler(i_id) {
    console.log(i_id);
    let id = i_id + "_accordion";
    let accordion = document.getElementById(id)

    if (accordion != null && accordion != "null") {
        if (accordion.style.display === "none")
            accordion.style.display = "";
        else
            accordion.style.display = "none";
    } else {
        var x = document.getElementById("agenda-content");
        x.children[0].style.display = "none";
    }



}
