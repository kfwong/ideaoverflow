<div >
	
	<h3>edit {{$user->username}}'s profile</h3>

	<br>

</div>

<div>

{!! Form::open() !!}

<div>

{!! Form::label('Name') !!}
<br>
{!! Form::text('name',null) !!}

</div>

<div>

{!! Form::submit('Update Profile', 
	array('class'=>'btn btn-primary')) !!}

</div>

{!! Form::close() !!}

</div>
