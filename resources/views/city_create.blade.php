@extends('master')
@section('content')

<div style="display:none;" class="alert alert-danger"> 
<p></p>
</div>



{{Form::open(['route' => 'city.store','class'=>'validateform'])}}
<div class="form-group">
{{Form::label('name','Name')}}
{{Form::text('name', null,['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('status','Status')}}
{{Form::text('status',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
{{Form::label('state_id','State Id')}}
{{Form::select('state_id',$states,null,['class'=>'form-control'])}}
</div>
{{Form::submit('submit',['class'=>'submit'])}}

{{Form::close()}}

@stop

@section('dom')
@parent
<script>
 $(document).ready(function() {

 	$('.validateform').validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		rules: {
			name: { required: true }, 
			status: { required: true },              
            state_id: { required: true },              
        },

		messages: {
			name: { required: "Name is required." },
			status: { required: "Status is required." }, 
			state_id: { required: "State Id is required." },                
		},

		invalidHandler: function(event, validator) 
		{  
			$('.alert-danger', $('.login-form')).show();
		},

		highlight: function(element) 
		{ // hightlight error inputs
			$(element).closest('.form-group').addClass('has-error'); // set error class to the control group
		},

		success: function(label) {
			label.closest('.form-group').removeClass('has-error');
			label.remove();
		},

		submitHandler: function(form) {

			//form.submit();
			alert();

			/*$.ajax({
				url: '{{ route("city.store") }}',
				type: 'post',
				data: {
					 _token:'{{csrf_token()}}',
				   name:$('input[name=name]').val(),
				 status:$('input[name=status]').val(),
				 state_id:$('select[name=state_id]').val()
					  },
			 success:function(data, textStatus, jqXHR) {

					$('.alert-modal').find('.modal-title').text('Success');
					$('.alert-modal').find('.modal-body').text(data.message);
					$('.alert-modal').modal('show');
                      setTimeout(function() { 
                      	$('.alert-modal').modal('hide'); 

                      location.assign('{{route('city.index')}}');
                      },3000);
					

					
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


		});*/

			
		}
	});

   $('.submit').on('click',function(e) {
		   e.preventDefault();

		   


	   });
 });
</script>
@stop