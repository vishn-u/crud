@extends('master')
@section('content')

<div style="display:none;" class="alert alert-danger"> 
<p></p>
</div>


{{Form::model($city, ['method'=>'patch', 'route'=>['city.update',$city->id]])}}
{{Form::label('name','Name:')}}
{{Form::text('name')}}<br>
{{Form::label('status','Status:')}}
{{Form::text('status')}}<br>
{{Form::label('state_id','State Id:')}}
{{Form::select('state_id',$states)}}<br>
{{Form::submit('submit',['class'=>'submit'])}}
{{Form::close()}}
@stop

@section('dom')
@parent
   <script>
 $(document).ready(function() {

   $('.submit').on('click',function(e) {
           e.preventDefault();
           $.ajax({
                   url: '{{ route("city.update",$city->id)}}',
                    type: 'post',
                    data: {
                          _token: '{{csrf_token()}}',
                          _method:'PATCH',
                          name:$('input[name=name]').val(),
	                      status:$('input[name=status]').val(),
	                      state_id:$('select[name=state_id]').val()

                    },
	         success:function(data, textStatus, jqXHR) {
                     alert(data.message);    
                 
                    
	          },
	          error: function(jqXHR, textStatus, errorThrown) {



                        $('.alert-danger').show();
                  if(jqXHR.status==422)
                  {
					var errors= jqXHR.responseJSON.errors;
					                 

		          	for(var i in errors) 
		          	{
		          		$('.alert-danger').append(`<div><p>`+errors[i][0]+`</p></div>`)
		          	}
                  }
                  else if(jqXHR.status==500){

                  	$('.alert-danger').append(jqXHR.responseJSON.message);
                  }
	          	

	          	//console.log(jqXHR.responseJSON.errors);


	          }


        });
       });
 });
</script>
@stop