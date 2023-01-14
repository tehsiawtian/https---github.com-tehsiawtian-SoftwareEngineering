<!--DOCTYPE html-->
<!--html-->
@extends('layouts.app')

@section('content')

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Case Feedback</title>
</head>
<style>
    body {
            background-color: rgba(122, 217, 248, 0.61);
        }
        #container 
        {
            margin: auto;
        }
        #notititle
        {
            text-align: center;
            padding: 35px 1px;
        }
        #Status
        {
            text-align: right;
            font-size: 20px;
            margin-right: 16%;
            padding: 30px 1px;
        }
        #statusbox
        {
            width: 15%;
            padding: 7px 10px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            text-align: center;
        }
        #sec2
        {
            display:flex;
            justify-content: space-between;
        }
        #complaintcontent
        {
            font-size: 20px;
            padding: 2% 2%;
            margin-left: 14%;
        }
        #combox
        {
            padding: 8px 65px;
            margin: 8px 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            text-align: left;
        }
        #description
        {
            display: flex;
            text-align: right;
        }
        #parabox
        {
            background-color: #EEE;
        }
        #textbox
        {
            padding: 25px 250px;
            margin-right: 50%;
            text-align: left;
            font-size: 25px;
        }
        #sec3
        {
            display:flex;
            justify-content: space-between;
            padding: 40px 1px;
        }
        #UploadPhoto
        {
            font-size:25px;
            margin-left: 15%
        }
        #photobox
        {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 450px;
            height: px;
            padding: 90px 50px 90px 90px;
            font-size: 15px;
        }
        #UploadVideo{
            font-size:25px;
            margin-right: 15%;
        }
        #videobox
        {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 450px;
            height: px;
            padding: 90px 50px 90px 90px;
            font-size: 15px;
        }
        #sec4
        {
            text-align: left;
            font-size: 25px;
            padding: 100px 1px;
            margin-left: 15%;
        }
        #sec4box
        {
            background-color: #EEE;
        }
        #sec5
        {
            text-align: left;
            font-size: 25px;
            text-align: left;
            padding: 100px 1px;
            margin-left: 15%;
        }
        #sec5box
        {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 1000px;
            height: 200px;
            padding: 8px;
            font-size: 15px;
        }
        #drag_upload_file 
        {
            width: 50%;
            margin: auto;
            text-align: center;
            padding: 70px;
        }
        #drag_upload_file p 
        {
        text-align: center;
        }
        #drag_upload_file #selectfile {
        display: none;
        }
        #sec6
        {
            text-align: left;
            font-size: 25px;
            text-align: left;
            font-size: 25px;
            padding: 100px 1px;
            margin-left: 15%;
        }
        #sec6box
        {
            background-color: #EEE;
        }
        #buttonbox {
            margin-left: 5%;
        }
        #buttonbox a
        {
            text-decoration: none;
            color: black;
        }
        #button
        {
            width: 15%;
            text-align: center;
            padding: 10px 1px;
            margin-left: 70%;
            text-decoration: none;
        }
        #finalbutton
        {
            background-color: #d9d9d9;
            border-radius: 80px;
            padding: 10px;
            text-decoration: none;

        }
        
</style>
<body>
    <div id="container ">

            <!--Title-->
        <div id="notititle">
                <h1> Staff Case Feedback </h1>
        </div>
        <div id="Status">

            <!--Status-->
            <div id="Status-content">
                <label for="status">Status</label>
                    <select name="statusbox" id="statusbox">
                    <option value="volvo"> Ongoing </option>
                    <option value="Pending"> Pending </option>
                    <option value="Closed"> Closed </option>
                    <option value="Solved"> Solved </option>
                    </select>           
            </div>
        </div>
        <div id="sec2">

            <!--Complaint Type-->
            <div id="complaintcontent">
                <label for="com">Complaint Type</label>
                <br>
                        <select name="combox" id="combox">
                        <option value="volvo">-Select-</option>
                        <option value="volvo">Cleaning</option>
                        <option value="volvo">Services</option>
                        <option value="volvo">Misconduct</option>
                        <option value="volvo">Overcharging</option>
                        <option value="volvo">Other</option>
                        </select>  
            </div>
            <div id="destitle">

                <!--Description-->
                <div id="textbox">
                    <form action="/action_page.php">
                        <label for="text"> Description </label>
                        <br><br>
                        <textarea id="parabox" name="parabox" rows="8" cols="35"> </textarea>
                      </form>
                </div>
            </div>
        </div>
        <div id="sec3">

            <!--Relevant Video-->
            <div id="UploadPhoto">
                <label for="phototitle"> Relevant Photo </label>
                <div id="photobox" ondrop="upload_file(event)" ondragover="return false">
                    <div id="photouploadfile">
                        <input type="file" id="photofile" name="photofile" accept="image/*">
                    </div>
                </div>
            </div>

            <!--Relevant Video -->
            <div id="UploadVideo">
                <label for="videotitle"> Relevant Video </label>
                <br>
                <div id="videobox" ondrop="upload_file(event)" ondragover="return false">
                    <div id="videouploadfile">
                        <input type="file" id="videofile" name="videofile" accept="video/*">
                    </div>
                </div>
            </div>
        </div>
        <div id="sec4">

            <!--Comment/ Review-->
            <div id="sec4textbox">
                <form action="/action_page.php">
                    <label for="text"> Comment/ Review </label>
                    <br><br>
                    <textarea id="sec4box" name="sec4box" rows="10" cols="89"> </textarea>
                  </form>
            </div>
        </div>
        <div id="sec5">

            <!--Supporting Docs (if any)-->
            <div id="Uploadfile">
                <label for="sec5title">Supporting Docs (if any)</label>
                <div id="sec5box" ondrop="upload_file(event)" ondragover="return false">
                    <div id="drag_upload_file">
                        <input type="file" id="sec5file" name="sec5file" accept="file/*">
                    </div>
                </div>
            </div>
        </div>
        <div id="sec6">

            <!--Remark for internal-->
            <div id="sec6textbox">
                <form action="/action_page.php">
                    <label for="text">Remark for internal</label>
                    <br><br>
                    <textarea id="sec6box" name="sec6box" rows="5" cols="89"> </textarea>
                  </form>
            </div>
        </div>
        <div id="buttonbox">
            <!--Button-->
            <div id="button">
                <div id="finalbutton">
                    <a href="..."><h3>Submit</h3></a>
                </div>
            </div>       
        </div>
    </div>
</body>
<!--/html-->
@endsection