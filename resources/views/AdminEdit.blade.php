@extends('layouts.app')

@section('content')

<style>
html body {
    background-color: #212763;
}

#bgcon {
    text-align: center;
    padding: 2%;
}

#bgcon h1 {
    font-size: 6vw;
    font-weight: bold;
    color: #fff;
}

.headerBG {
    background-color: #212763;''
}

.createCaseBtn {
    background-color: rgb(255, 153, 109);
}

.notificationBtn {
    background-color: rgb(203, 171, 254);
}

.dash{
    font-size:80px;
    color:white;
    text-align: center;
}
/* form */
#container{
  background-color: #fff;
  margin: auto;
  border-radius:30px;
  padding: 50px 35px;
  box-shadow: 10px 10px 50px rgba(0,0,0,0.4);
  width: 30%;
  margin-bottom: 30px;
}

p{
    margin:0;
    font-weight:bold;
}

.form-control {
  font-size: 18px;
  height: 45px;
  border: 2px solid grey;
  box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.07);
  border-radius: 40px;
  padding: 15px 20px 17px;

}

.edit{
    border:3px solid #f7db1b;
    background: #f7db1b;
    border-radius: 10px;
    padding:5px 10px 5px 10px;
    font-weight:500;
    box-shadow: 0 0 10px rgba(0,0,0,0.4);
}

.edit:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.1);
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
  width:30%;
}

.btn.btn-primary:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.1);
}
</style>
<body>
    <!--Top Header-->
    <nav class="navbar navbar-expand-lg p-3 headerBG">
        <div class="container-fluid">
            <div class="w-25">
                <img src="./images/neweraIcon.png" alt="" width="100%">
            </div>
            <div class="w-25 d-flex">
                <div class="w-25">
                    <img src="userIcon.png" alt="" width="100%">
                </div>
            </div>
        </div>
    </nav>
    <!--Header-->
    <div id="bg1">
        <div id="bgcon" class="text-center">
            <h1 class="mb-5">#Admin Edit</h1>
        </div>
    </div>
    <!--Dashboard-->
    <div id=container>
    <!--Title-->
        <div class="container text-center mb-3">
            <div class="row">
                <div class="col">
                    <h1>{{ Str::title(auth()->user()->roles->first()->name) }} Edit</h1>
                </div>
            </div>
        </div>
        <!-- Form -->
        <form action="{{ route('admin-edit', $user->id) }}" method="POST">
            @csrf
            <div class="d-flex">
                <div class="container text-center mb-3">
                    <div class="row">
                        <div class="col">
                            <p>User ID</p>
                            <input id="UserID" type="text" class="form-control" name="UserID" value="{{ $user->id }}" autocomplete="name"
                                autofocus disabled>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <p>Username</p>
                            <input id="Username" type="text" class="form-control" name="Username" value="{{ $user->name }}" autocomplete="name"
                                autofocus disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <p>Email</p>
                            <input id="Email" type="text" class="form-control" name="Email" value="{{ $user->email }}" autocomplete="email"
                                autofocus disabled>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <p>Created Time</p>
                            <input id="CreatedTime" type="text" class="form-control" name="CreatedTime" value="{{date('d-m-Y', strtotime($user->created_at))}}"
                                autocomplete="email" autofocus disabled>
                        </div>
                    </div>
                </div>
            </div>
        <div class="d-flex mt-3">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-">
                            <p>Role</p>
                            <select name="role" class="form-select mt-1 border border-2 border-secondary" aria-label="Default select example">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }} "{{@@$user->roles->pluck('id')[0] == $role->id ? 'selected':''}}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            <div class="container text-center">
                <div class="row">
                    <div class="col-">
                        <p>Department</p>
                        <select name="department" class="form-select mt-1 border border-2 border-secondary" aria-label="Default select example">
                            @foreach ($departments as $department)
                                <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
            <div class="container text-center mt-4">
                <div class="row">
                    <div class="col-">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

@endsection