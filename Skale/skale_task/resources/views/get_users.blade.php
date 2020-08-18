<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>

<h1>Users Page</h1>
@foreach($all_users as $user)    
    <li>
        {{$user->user_name}}
    </li>
@endforeach
</body>
</html>