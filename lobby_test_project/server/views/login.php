<head>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">

    <style>
        body {
            height: 700px;
        }


        .container {
            background: url('http://localhost/lobby_project/server/img/initPage.jpg') center;
            width: 100%;
            height: -webkit-fill-available;
            max-width: -webkit-fill-available;
        }

        .col-md-4 h1 {
            color: #9f00a7;
            font-family: calibri, arial;
            font-weight: bold;
            font-size: 30px;
            position: relative;
            left: 30px;
        }


        #col-md-4 {
            height: 50px;
        }

        .header a:hover {
            transition-duration: 0.3s;
            color: rgb(0, 0, 0);
        }

        /*container design*/
        .control-label {
            float: left;
        }

        .container .inner {
            width: 480px;
            margin: 100px auto;
            border: 1px solid none;
            background: rgba(55, 55, 55, 0.4);
            padding: 10px;
            -webkit-transform: skew(30deg, 10deg);
            -moz-transform: skew(30deg, 10deg);
            -o-transform: skew(30deg, 10deg);
            transition-duration: 0.7s;
        }

        .container .inner:hover {
            -webkit-transform: skew(0deg, 0deg);
            -moz-transform: skew(0deg, 0deg);
            -o-transform: skew(0deg, 0deg);
            transition-duration: 0.7s;
            background: transparent;
        }

        .inner h1 {
            color: rgb(200, 200, 200);
            font-family: calibri, arial;
            font-weight: bold;
            text-align: center;
            font-size: 40px
        }

        .inner h3 {
            color: rgb(200, 200, 200);
            font-size: 18px;
            font-family: calibri;
            text-align: center;
            margin-top: -5px
        }

        .inner form label span {
            color: white;
        }

        .inner form lagend {
            color: white;
        }

        .inner .input {
            width: 90%;
            border: none;
            border-bottom: 1px solid white;
            /* color: #9f00a7; */
            color: white;
            background: transparent;
            padding: 10px;

        }

        ::placeholder {
            color: white;
        }

        .inner .input:focus {
            box-shadow: none;
            border: 1px solid none;
        }

        .container hr {
            border-color: rgb(100, 100, 100);
        }

        .inner .button {
            border-radius: 10px 10px 10px 10px;
            color: #9f00a7;
            background: rgba(50, 50, 50, 0.4);
            padding: 2px 30px;
            border: 2px solid #9f00a7;
            font-family: calibri;
            margin: 10px auto;
            font-weight: bold;
        }

        .inner .button:hover {
            background: #8f00a7;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="inner">
            <h1>Welcome!</h1>
            <div id="initDiv">
                <lagend style="color: white;">Enter your credentials</lagend><br>
                <label><span class="glyphicon glyphicon-user"></span></label>
                <input type="text" placeholder='First Name' class="input" id="firstName" />
                <br>
                <label><span class="glyphicon glyphicon-user"></span></label>
                <input type="text" placeholder="Last Name" class="input" id="lastName" />
                <br>
                <button class="button" id="initBtn">Sign in</button>
            </div>
        </div>
    </div>
    <script src="./server/js/initLogin.js"></script>
    <script src="./server/js/inputValidator.js"></script>
</body>