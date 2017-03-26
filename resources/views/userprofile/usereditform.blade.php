<div >
	
	<h3>edit {{$user->username}}'s profile</h3>

	<br>

</div>

<div>

{!! Form::model($user,array('route'=>array('users.update',$user->id),'method'=>'PUT')) !!}

<div class="form-group">

{!! Form::label('name','Name') !!}
<br>
{!! Form::text('name',null,array('class'=>'form-control')) !!}

</div>

<div class="form-group">
	
	{!! Form::label('username','Username') !!}
	<br>
	{!! Form::text('username',null,array('class'=>'form-control')) !!}

</div>

<div class="form-group">
	
	{!! Form::label('email','Email') !!}
	<br>
	{!! Form::text('email',null,array('class'=>'form-control')) !!}

</div>

<div class="form-group">
	
	{!! Form::label('description','Description') !!}
	<br>
	{!! Form::textarea('description',null,array('class'=>'form-control')) !!}
	
</div>

<div class="form-group">

	<br>
	{!! Form::submit('Update Profile', 
		array('class'=>'btn btn-primary')) !!}

</div>

{!! Form::close() !!}

</div>
