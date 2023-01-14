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

.case{
    background: #f7db1b;
    color: black;
    text-decoration:none;
    border:10px solid #f7db1b;
    border-radius: 10px;
    padding:10px 15px;
    float: right;
    font-weight:bold;
}

.case.btn-primary {
  background: #f7db1b;
  border: 1px solid #f7db1b;
  color: #000;
  font-weight: bold;
  box-shadow: 0 0 10px rgba(0,0,0,0.4);
}

.case.btn-primary:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.1);
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

.status{
    padding: 10px;
    font-weight:500;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.25);
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
                @role('student')
                    <div class="w-25">
                        <a href="{{route('helpdesk')}}"class="case btn-primary">Create Case</a>
                    </div>
                @endrole
            </div>
            <div class="row p-0 my-3 mx-0 w-100">
                <div class="col-1 d-flex"><h6 class="fw-bold">Case ID</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">Complaint Type</h6></div>
                <div class="col-3 d-flex"><h6 class="fw-bold">Complaint Desc</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">Date Create</h6></div>
                <div class="col-2 d-flex"><h6 class="fw-bold">Department</h6></div>
                <div class="col-1 d-flex"><h6 class="fw-bold">Status</h6></div>
                <div class="col-1 d-flex"><h6 class="fw-bold">Action</h6>
                
            </div>  
            @foreach($student_case as $case)
                <div class="row p-0 m-0 d-flex align-items-center w-100">
                    <div class="col-1 d-flex">{{$case->case_id}}</div>
                    <div class="col-2 d-flex">{{$case?->complaint?->complaint_name}}</div>
                    <div class="col-3 d-flex">{{$case->complaint_desc}}</div>
                    <div class="col-2 d-flex">{{date('d-m-Y', strtotime($case->created_at))}}</div>
                    <div class="col-2 d-flex">{{$case?->department?->department_name}}</div>
                    <div class="col-1 d-flex mb-3">
                        <div class="bg-success status">{{$case?->status?->status_name}}</div>
                    </div>
                    @if (auth()->user()->hasRole('staff'))
                        <div class="col-1 d-flex mb-3">
                            <a href="{{ route('editHelpdesk', @$case->case_id) }}" class="edit text-decoration-none text-dark">Edit</a>
                        </div>
                    @else
                        @if (@$case?->status_id != 3 && @$case->status_id != 4)
                            <div class="col-1 d-flex mb-3">
                                <a href="{{ route('editHelpdesk', @$case->case_id) }}" class="edit text-decoration-none text-dark">{{ auth()->user()->hasRole('student') ? 'View' : 'Edit' }}</a>
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>

@endsection
