@extends('master')
@section('content')
@if($errors->any())
<div class="alert alert-danger"> 
@foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach </div>
@endif
{{Form::open(['route' => 'city.store'])}}
{{Form::label('name','Name:')}}
{{Form::text('name')}}<br>
{{Form::label('status','Status:')}}
{{Form::text('status')}}<br>
{{Form::label('state_id','State Id:')}}
{{Form::select('state_id',$states)}}<br>
{{Form::submit('submit')}}
{{Form::close()}}

@stop