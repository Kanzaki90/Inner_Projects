<head>
    <title>
        Exibition
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">

</head>
<?php include_once("server/helpers/navigator.html") ?>

<body>
    <img src="server/img/chess.jpg" alt="mainLobby" usemap="#mainLobby" style="width: -webkit-fill-available;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;" />

    <map name="mainLobby" id="mainLobby">
        <area shape="rect" coords="286, 4, 475, 350" alt="hallA" id="hallA" onclick="rdr(this.id);" style="cursor: pointer;">

        <area shape="rect" coords="885, 255, 1150, 545" alt="hallB" id="hallB" onclick="rdr(this.id);" style="cursor: pointer;">
    </map>

    <div class="data-custom">
        <div class="card" style="width: 18rem;">
            <img src="server/img/lofi_gif.gif" class="card-img-top" alt="Null">
            <div class="card-body">
                <h5 class="card-title">LiFi Hip_hop</h5>
                <p class="card-text">Click for some relaxing music</p>
            </div>
        </div>
    </div>

    <div class="data-custom">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Who's there?</h5>
                <p class="card-text">Click to see who entered the Main Lobby</p>
            </div>
        </div>
    </div>


    
    <script src="server/js/redirector.js"></script>
    <script src="server/js/mapHelper.js"></script>

</body>