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
                    <h1>{{ Str::title(auth()->user()->roles->first()->name) }} Case Feedback</h1>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('helpdesk') }}" enctype="multipart/form-data">
            @csrf
            <!--Dropdown button-->
            @hasrole(['staff', 'student'])
                @if(@$edit)
                    <div class="container text-center">
                        <div class="row mb-3">
                            <div class="col-5"></div>
                            <div class="col-5"></div>
                            <div class="col">
                                @if (auth()->user()->hasRole('staff'))
                                    <select name="status" class="form-select border border-2 border-secondary" aria-label="Default select example">
                                        <option selected disabled>Please select your status</option>
                                        @foreach ($status as $s)
                                            <option value="{{ $s->status_id }}" {{@$case->status_id == $s->status_id ? 'selected':''}}>{{ $s->status_name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" class="form-control border border-2 border-secondary" value="{{@$case->status->status_name}}" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endhasrole

            <!--Assign and Complaint type-->
            <div class="container text-center">
                <div class="row">
                    @role('helpdesk')
                        <input type="hidden" name="helpdesk_caseid" value="{{@$case->case_id}}">
                        <div class="col">
                            <p>Assign to</p>
                            <select name="department" class="form-select mt-1 border border-2 border-secondary" aria-label="Default select example">
                                <option selected disabled>Please select your department</option>
                                @foreach ($department as $d)
                                    <option value="{{ $d->department_id }}" {{@$case->department_id == $d->department_id ? 'selected':''}}>{{ $d->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endrole

                    <div class="col">
                        <p>Complaint Type</p>
                        @if (@$edit)
                            <input type="text" class="form-control border border-2 border-secondary" value="{{@$case->complaint->complaint_name}}" disabled>
                        @else
                            <select name="complaint" class="form-select mt-1 border border-2 border-secondary" aria-label="Default select example">
                                <option selected disabled>Please select your complaint</option>
                                @foreach ($complaint as $c)
                                    <option value="{{ $c->complaint_id }}" {{@$case->complaint_id == $c->complaint_id ? 'selected':''}}>{{ $c->complaint_name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>

            <!--Description-->
            <div class="container text-center">
                <div class="row mt-3">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label bold">Description</label>
                            <textarea name="complaint_desc" class="form-control border border-2 border-secondary" id="exampleFormControlTextarea1" rows="12" value="" {{@$edit ? 'disabled':''}}>{{@$case->complaint_desc}}</textarea>
                        </div>
                    </div>
                <div>
            </div>

            <!--Video and Photo-->
            @if(@!$edit)
                <div class="container text-center">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label bold">Relevant Photo and Video</label>
                                <input type="file" name="student_file" class="form-control border border-2 border-secondary" id="formFileMultiple">
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            @endif

            <!--Comment and Review-->
            @if(@$edit)
                @hasrole(['staff', 'student'])
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label bold">Comment/Review</label>
                                    <textarea name="staff_comment" class="form-control border border-2 border-secondary"
                                        id="exampleFormControlTextarea1" rows="12" {{auth()->user()->hasRole('student') ? 'disabled':''}}>{{@$case->complaint_comment}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endhasrole
            @endif
            <!--supporting docs-->
            @hasrole('staff')
                <input type="hidden" name="staff_caseid" value="{{@$case->case_id}}">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label bold">Supporting Docs (If any)</label>
                                <input name="staff_file" class="form-control border border-2 border-secondary" type="file"id="formFileMultiple" multiple>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            @endrole

            <!--Remark-->
            @if(@$edit)
                @hasrole(['staff', 'student'])
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label bold">Remark for Internal</label>
                                    <textarea name="remark" class="form-control border border-2 border-secondary"
                                        id="exampleFormControlTextarea1" rows="12" {{auth()->user()->hasRole('student') ? 'disabled':''}}>{{@$case->complaint_remark}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endhasrole
            @endif

            <!--Submit-->
            <div class="container text-center mt-4">
                <div class="row mb-5">
                    <div class="col-5"></div>
                    <div class="col-2">
                        @if (@$edit)
                            @if (auth()->user()->hasRole('student'))
                                <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                            @else
                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            @endif
                        @else
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        @endif
                    </div>
                    <div class="col-5"></div>
                </div>
            </div>
        </form>
    </div>
</body>


@endsection