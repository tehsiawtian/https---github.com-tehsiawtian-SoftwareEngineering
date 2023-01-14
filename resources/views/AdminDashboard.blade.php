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
</style>
<body>
    <!--Top Header-->
    <nav class="navbar navbar-expand-lg p-3 headerBG">
        <div class="container-fluid">
            <div class="w-25">
                <img src="neweraIcon.png" alt="" width="100%">
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
            <h1 class="mb-5">#Dashboard</h1>
        </div>
    </div>
    <!--Dashboard-->
    <div class="container-fluid d-flex justify-content-center">
        <div class="container d-flex flex-column w-100 bg-light mx-3 py-3 rounded-4">
            <div class="d-flex container-fluid justify-content-between border-bottom border-dark border-5 p-3">
                <div class="w-30">
                    <h3 class="w-100 fw-bolder">Dashboard</h3>
                </div>
            </div>
            <div class="row p-0 my-3 mx-0 w-100 mb-2">
                <div class="col-1 d-flex"><h6 class="fw-bold">ID</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">Username</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">Email</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">Created time</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">User role</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">Department</h6></div>
                <div class="col-1 d-flex"><h6 class="fw-bold">Action</h6></div>
            </div>
            @foreach ($users as $user)
                <div class="row p-0 m-0 d-flex align-items-center w-100 mb-2">
                    <div class="col-1 d-flex">{{ $user->id }}</div>
                    <div class="col-2 d-flex">{{ $user->name }}</div>
                    <div class="col-2 d-flex">{{ $user->email  }}</div>
                    <div class="col-2 d-flex">{{ date('d-m-Y', strtotime($user->created_at)) }}</div>
                    <div class="col-2 d-flex">{{ @$user->roles->pluck('name')[0] }}</div>
                    <div class="col-2 d-flex">{{ @$user->department->department_name }}</div>
                    <div class="col-1 d-flex mb-1">
                        <a href="{{ route('admin-edit', $user->id) }}" class="edit text-decoration-none text-dark">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</body>

@endsection