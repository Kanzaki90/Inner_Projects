<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">

</head>

<?php include_once("server/helpers/navigator.html") ?>


<body background="server/img/1.png">

  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Login</th>
      </tr>
    </thead>
    <tbody id="mainTbody">
    </tbody>
  </table>

  <script src="server/js/hallB.js"></script>
  <script src="server/js/tableBuilder.js"></script>
  <script src="server/js/redirector.js"></script>

</body>