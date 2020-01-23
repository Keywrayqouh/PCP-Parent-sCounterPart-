@extends ('master')
@section ('content')

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
      <h1 class="tit">Add Data</h1>
      <br/>
      <form method="post" action="{{route('store',$student->id)}}">  
        {{csrf_field()}}
        <div class="form-group">
          <input type="hidden" name="id" class="form-control" placeholder="" value="{{$student->id}}"/>
        </div>
        <div class="form-group">
          <input type="text" name="month" class="form-control" placeholder="Month " value=""/>
        </div>
        <div class="form-group">
          <input type="number" name="year" class="form-control" placeholder="Year " value=""/>
        </div>
        <div class="form-group">
          <input type="number" name="amount" class="form-control" placeholder="Amount" value=""/>
        </div>
        <div class="form-group">
          <input type="date" name="dateofpayment" class="form-control" placeholder="Date  " value=""/>
        </div>
       
       
        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button> 
      <!-- <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" large>  
      </div> -->
        
  
</form>

  </div>
</div>
</div>

@endsection