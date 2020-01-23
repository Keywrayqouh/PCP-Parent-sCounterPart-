@extends('student.layout')
@section('title','Training')
@section('sidebar')
    Home(sidebar)
@endsection('sidebar')

@section('content')


<a href="student/create" id="add">Add Data</a>
<br><br>
<link rel="stylesheet" href="{{url('css/form.css')}}">

</form>
    <table border=1 id="customers">
        <tr>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Batch</th>
           
            <th>Action</th>
            
        </tr>
        @foreach($students as $student)
        <tr>

            <td>{{$student['first_name']}}</td>
            <td>{{$student['middle_name']}}</td>
            <td>{{$student['last_name']}}</td>
            <td>{{$student['email']}}</td>
            <td>{{$student['contact_number']}}</td>
            <td>
           {{$student['batch']}}
            </td>
            
            <td><a href=""><button>View Summary</button>
           </a><a href="{{url('pay',$student->id)}}"><button>Pay</button></a></td>
        </tr>
        @endforeach
    </table>
@endsection('content')
@section('footer','Facebook   Twitter    Instagram     Youtube')   

