@extends('master')
@section('content')
@if(Session::has('flash_message') )
<div class="alert alert-success"> {{ Session::get('flash_message') }} </div>
@endif
{{Form::open()}}
<a href="{{route('city.create')}}" class="btn btn-info">Add City</a><br><br>
<table class="table table-hover table-striped table-bordered">
<thead>
<tr>
<th>City Name</th>
<th>status</th>
<th>State Id</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($cities as $city)
<tr>
	<td>{{$city->name}} </td>
	<td> {{$city->status}}</td>
	<td>{{$city->state_id}}</td>
	<td> <a href="{{(route('city.edit', $city->id))}}" class="btn btn-primary">edit</a>
&nbsp;
		  <a id="{{$city->id}}" class="btn btn-danger delete">Delete</a>

	<!-- {!! Form::open(['method'=>'DELETE','route'=>['city.destroy',$city->id]]) !!}
			{{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
			{!! Form::close() !!} -->
	 </td>

</tr>
@endforeach
</tr> 
</tbody> 
</table> 
{{Form::close()}}

@stop

@section('dom')
@parent
<script>
$(document).ready(function() {

   $('.delete').on('click',function(e) {
		e.preventDefault();
			var url = '{{ url("city")}}/' + $(this).attr('id');
            $('.delete-modal').modal('show');
            $('.delete_modal_btn').on('click',function(e) {
				e.preventDefault();
            	$.ajax({
					url: url,
					type: 'post',
					data: {
						_token: '{{csrf_token()}}',
						_method:'DELETE',
					},
					success:function(data, textStatus, jqXHR) {
						$('.delete-modal').modal('hide'); 
					}

				});
            });
	});
});
</script>
@stop
