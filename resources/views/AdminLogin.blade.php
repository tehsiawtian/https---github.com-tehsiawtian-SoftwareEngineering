@extends('layouts.app')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asar&family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Admin Login Page</title>
</head>

<style>
    #container{
    position: relative;
    max-width: 1400px;
    margin: auto;
}

body{
    background: rgba(122, 217, 248, 0.61);
    font-family: 'Asar', serif;
    font-family: 'Merriweather', serif;
}

h1{
    font-size: 50px;
}

.topic{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 10%;
}

.topic2{
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>
<body>
    <div class="topic">
        <h1>Admin login</h1>
        <div class="topic2">
        <form>
            <div class="mb-3">
              <label for="inputusername" class="form-label">Username</label><br>
              <input type="text" class="form-control" id="inputusername">
            </div>
            <div class="mb-3">
              <label for="inputpassword" class="form-label">Password</label><br>
              <input type="password" class="form-control" id="inputpassword">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>
</body>

@endsection

