@extends('layouts.app')

@section('content')

<!--DOCTYPE html-->
<!--html lang="en"-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Report</title>
</head>
<style>
    body {
        margin: 0;
        background-color: rgba(122, 217, 248, 0.61);
    }

    #container {
        margin: auto;
    }

    #title h1 {
        font-size: 50px;
        text-align: center;
    }

    .row {
        display: flex;
        margin: 7%;
    }

    select {
        padding: 4%;
        padding-right: 34%;
        padding-left: 6%;
        font-size: 18px;
    }

    h3 {
        font-size: 25px;
    }

    input {
        display: flex;
        margin-left: 74.5%;
        font-size: 22px;
        padding: 0.75%;
        padding-left: 2.5%;
        padding-right: 2.5%;
        border-radius: 25px;
        font-weight: bolder;
    }

    #comments {
        font-size: 1.2em;
        width: 80%;
        height: 202px;
    }

    .wrapper {
        height: 300px;
        width: 80%;
        border: 2px dashed black;
        background-color: rgba(220, 220, 220, 0.344);
        text-align: center;
    }

    #left1 {
        width: 50%;
    }

    #right1 {
        width: 50%;
    }

    #left2 {
        width: 50%;
    }

    #right2 {
        width: 50%;
    }

    .up {
        margin: 0;
        margin-top: 7%;
    }
</style>

<body>
    <div id="container">
        <div>
            <div id="title">
                <h1>Case Report</h1>
            </div>
            <form action="{{route('StudentCaseReport')}}" method="POST">
                @csrf
                <div class="row">
                    <!--Complaint Type-->
                    <div id="left1">
                        <label for="complaint">
                            <h3>Complaint Type</h3>
                        </label>
                        <select name="type" id="type">
                            @foreach ($complaints as $complaint)
                                <option value="{{$complaint->complaint_id}}">{{$complaint->complaint_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--Description-->
                    <div id="right1">
                        <h3>Description</h3>
                        <textarea name="comments" id="comments" placeholder="Hey... say something!"></textarea>
                    </div>
                </div>
                <div class="row">
                    <!--photo upload area-->
                    <div id="left2">
                        <h3>Relevent Photo</h3>
                        <div class="wrapper drop">
                            <input class="up" type="file" multiple="true">
                        </div>
                    </div>
                    <!--video upload area-->
                    <div id="right2">
                        <h3>Relevent Video</h3>
                        <div class="wrapper">
                            <input class="up" type="file" multiple="true">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Submit" style="cursor: pointer;">
            </form>
        </div>
    </div>
</body>

<!--/html-->
@endsection