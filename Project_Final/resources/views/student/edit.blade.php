@extends('master')
@section('content')
<style>
  .table{
    width:50%;
    margin-left:27%;
    background-color:grey;
    margin-top:7%;
    border-radius:10%
  }
  #rows{
    margin-left:8%
  }
  .tit{
    text-align:center
  }
  .btn{
    margin-bottom:10%
  }
</style>


@if(count($errors)>0)
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
@if(\Session::has('success'))
  <div class="alert alert-success">
    <p>{{Session::get('success')}}</p>
  </div>

@endif

<div class="table">
<div class="row">
  <div class="col-md-10" id="rows">
    <br/>
      <h1 class="tit">Edit Recor</h1>
      <br/>
      <form method="post" action="{{route('update', $student->id)}}">  
        {{csrf_field()}}
        
        <div class="form-group">
          <input type="text" name="first_name" class="form-control" placeholder="Enter Your Firstname " value="{{old('first_name',$student->first_name)}}"/>
        </div>
        <div class="form-group">
          <input type="text" name="middle_name" class="form-control" placeholder="Enter Your Middlename " value="{{$student->middle_name}}"/>
        </div>
        <div class="form-group">
          <input type="text" name="last_name" class="form-control" placeholder="Enter Your Lastname " value="{{$student->last_name}}"/>
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Enter Your Email " value="{{$student->email}}"/>
        </div>
        <div class="form-group">
          <input type="number" min=0 name="age" class="form-control" placeholder="How old are you??"  value="{{$student->age}}"/>
        </div>
        <div class="form-group">
          <input type="number" name="gender" min=1 max=2 class="form-control" placeholder="Gender: 1 Male || 2 Female " value="{{$student->gender}}"/>
        </div>
        <div class="form-group">
          <input type="text" name="address" class="form-control" placeholder="Enter Your Address " value="{{$student->address}}"/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">EDIT</button> 
      <!-- <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" large>  
      </div> -->
        
  
</form>

  </div>
</div>
</div>


@endsection
