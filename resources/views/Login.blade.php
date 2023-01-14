@extends('layouts.app')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asar&family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>
<style>
    #container{
    position: relative;
    max-width: 100%;
    margin: auto;
}

body{
    background: #212763;
    font-family: 'Asar', serif;
    font-family: 'Merriweather', serif;
}

p{
    font-size: 25px;
    margin-bottom: 0;
}

.school{
    margin: auto;
    align-items: center;
    justify-content: space-between;
    margin-top: 5%;
}

.school1{
    margin:auto;
    flex-direction: column;
    width: 60%;
}

.slogo{
    display: flex;
    justify-content: center;
}

.slogo img{
    width: 50%;
}

.stext{
    text-align: center;
}

.stext h1{
    padding-top:20px;
    margin-top: 0;
    font-size: 55px;
    color: white;
}
.stext h4{
    padding-top:20px;
    margin-top: 0;
    color: white;
}

.stext h2{
    font-size:30px;
    color: white;
}

.school2{
    text-align:center;
    margin: auto;
    flex-direction: column;
    align-items: flex-start;
    width: 50%;
    padding-top:30px;
}

.loginp img{
    width: 30px;
    height: 30px;
    padding-right:5px ;
}

.loginp a{
    display: flex;
    text-decoration: none;
    color: white;
    align-items: center;
}

.loginp a:hover{
    color: #f7db1b;
}

label{
    color: white;
    font-size: 20px;
    padding:5px;
    
}

p{
    color:white;
}

.loginp{
    display: flex;
    flex-direction: column;
}

.btn.btn-primary {
    background: #f7db1b;
    border: 2px solid #f7db1b;
    border-radius:50px;
    padding:15px 45px 15px 45px;
    font-size:20px;
    font-weight: bold;
    color: #000;
    box-shadow: 0 0 10px rgba(0,0,0,0.4);
}

.btn.btn-primary:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.03);
}

</style>
<body>
<div id="container">
    <div class="school">
        <div class="school1">
            <div class="slogo">
                <img src="images/neweralogo.png">
            </div>
            <div class="stext mt-5">
                <h1>Complaints Form Department</h1>
                <h2 class="mt-4"><i>New Era student, executive and lecturer only</i></h2>
            </div>
            <div class="stext mt-5">
                <h4>Any Complain? Do It Now</h4>
            </div>
        </div>
        <div class="school2">

            <div class="loginp">
            <form action="{{route('login')}}">
            @csrf
                <input type="submit" value="Start Now" class="btn btn-primary">
            </div>
        </div>
    </div>
</div>
</body>

@endsection