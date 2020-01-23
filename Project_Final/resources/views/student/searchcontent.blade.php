@include('header')
<div class="container">
<div class="row">
@if(count($student)>0)
@foreach($student as $stud)
{{$stud->id}}
{{$stud->$first_name}}
{{$stud->$middle_name}}
{{$stud->$email}}
{{$stud->$age}}
{{$stud->$gender}}
{{$stud->$address}}
@endforeach
@endif

</div></div>