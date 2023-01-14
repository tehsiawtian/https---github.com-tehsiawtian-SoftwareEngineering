@extends('layouts.app')

@section('content')
<style>
/* Body */
body {
    background-color: #212763;
}

p{
  font-size: 18px;
  text-align: left;
  font-weight: bold;
  margin-bottom: 5px;
}

.bold{
  font-size: 18px;
  font-weight:bold
}

/* form */
#container{
  background-color: #fff;
  margin: auto;
  border-radius:30px;
  padding: 50px 35px 20px;
  box-shadow: 10px 10px 50px rgba(0,0,0,0.4);
  width: 75%;
  margin-bottom: 30px;
}

/* Header */
#bgcon {
    text-align: center;
    padding: 2%;
}

#bgcon h1 {
    font-size: 6vw;
    font-weight: bold;
    color: #fff;
}

.btn.btn-primary {
  background: #f7db1b;
  border: 1px solid #f7db1b;
  color: #000;
  font-weight: bold;
  box-shadow: 0 0 10px rgba(0,0,0,0.4);
}

.btn {
  cursor: pointer;
  border-radius: 40px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-size: 16px;
  text-transform: uppercase;
  padding: 10px;
  width:70%;
}

.btn.btn-primary:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.1);
}
</style>

<body>
<!-- header -->
<div id="bg1">
    <div id="bgcon" class="text-center">
        <h1 class="mb-5">#Feedback</h1>
    </div>
</div>

<div id=container>
    <!--Title-->
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>Case Upload</h1>
            </div>
        </div>
    </div>

    <!--Assign and Complaint type-->
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <p>Complaint Type</p>
                <select class="form-select mt-1 border border-2 border-secondary" aria-label="Default select example">
                    <option selected>Complaint Type</option>
                    <option value="1">Cleaning</option>
                    <option value="2">Services</option>
                    <option value="3">Misconduct</option>
                    <option value="3">Overcharging</option>
                    <option value="3">Other</option>
                </select>
            </div>
        </div>
    </div>

    <!--Description-->
    <div class="container text-center">
        <div class="row mt-3">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label bold">Description</label>
                    <textarea class="form-control border border-2 border-secondary" id="exampleFormControlTextarea1"
                        rows="12"></textarea>
                </div>
            </div>
            <div>
            </div>

            <!--Video and Photo-->
            <div class="container text-center">
                <div class="row">
                    <div class="col-1">
                    </div>

                    <div class="col-10">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label bold">Relevant Photo and Video</label>
                            <input class="form-control border border-2 border-secondary" type="file"
                                id="formFileMultiple" multiple>
                        </div>

                    </div>
                    <div class="col-1">
                    </div>
                </div>
            </div>

            <!--Submit-->
            <div class="container text-center mt-4">
                <div class="row mb-5">
                    <div class="col-5">

                    </div>
                    <div class="col-2">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>


@endsection