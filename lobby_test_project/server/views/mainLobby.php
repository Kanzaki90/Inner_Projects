<head>
    <title>
        Main Lobby
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">

</head>

<body>
    <img src="server/img/main_lobby.jpg" alt="mainLobby" usemap="#mainLobby" style="width: -webkit-fill-available;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;" />

    <map name="mainLobby" id="mainLobby">

        <area shape="rect" coords="5, 520, 118, 565" alt="hallA" id="hallA" onclick="rdr(this.id);" style="cursor: pointer;">

        <area shape="rect" coords="396, 491, 506, 537" alt="hallB" id="hallB" onclick="rdr(this.id);" style="cursor: pointer;">

        <area shape="rect" coords="998, 575, 1128, 621" alt="exibition" id="exibition" onclick="rdr(this.id);" style="cursor: pointer;">

        <area shape="rect" coords="737, 121, 916, 435" style="cursor: pointer;">

    </map>

    <div></div>

    <div class="data-custom">
    </div>
    <div class="data-custom">
    </div>
    <div class="data-custom">
    </div>
    <div class="data-custom">
        <div class="card" style="width: 18rem;">
            <img src="server/img/lofi_gif.gif" class="card-img-top" alt="Null">
        </div>
    </div>


    <script src="server/js/redirector.js"></script>
    <script src="server/js/mapHelper.js"></script>


</body>