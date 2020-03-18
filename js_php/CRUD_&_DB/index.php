<!DOCTYPE html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">

    <title>_Kanzaki_</title>

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>


</head>

<body>

    <div>
        <h2 style="color: black">Hello world</h2>
        <br>

        <!-- First Name-->
        <div class="form-group row custom-register-row">
            <label for="first_name" class="col-sm-2 col-form-label pr-2" style="color: black">First Name:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control custom-data" id="first_name" value="" placeholder="Enter your first name">
            </div>
        </div>

        <!-- Last Name-->
        <div class="form-group row custom-register-row">
            <label for="last_name" class="col-sm-2 col-form-label pr-2" style="color: black">Last Name:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control custom-data" id="last_name" value="" placeholder="Enter your last name">
            </div>
        </div>

        <!-- Email-->
        <div class="form-group row custom-register-row custom-login-row">
            <label for="email" class="col-sm-2 col-form-label pr-2" style="color: black">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control custom-data" id="email" value="" placeholder="Enter your email">
            </div>
        </div>

        <!-- Password-->
        <div class="form-group row custom-register-row custom-login-row">
            <label for="password" class="col-sm-2 col-form-label pr-2" style="color: black">Password</label>
            <div class="col-sm-6">
                <input type="text" class="form-control custom-data" id="password" value="" placeholder="Enter your password">
            </div>
        </div>
        <br>

        <div class="form-group row col-sm-3 offset-4">
            <input type="button" class="form-control btn-primary" style="cursor:pointer" value="Submit" id="frm_submit">
            <br><br>
            <input type="button" class="form-control btn-primary" style="cursor:pointer" value="Show All" id="show_all">
        </div>
    </div>

    <br>
    <table>
        <thead>
            <th>Registered</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edited</th>
            <th>Edit</th>
            <th>Save</th>
            <th>Delete</th>
        </thead>
        <tbody id="log_table">

        </tbody>

    </table>
    <!-- Begin Scripts -->

    <script src="./js/submit.js"></script>
    <script src="./js/viewAll.js"></script>
    <script src="./js/table_builder.js"></script>
    <script src="./js/edit_row.js"></script>

</body>