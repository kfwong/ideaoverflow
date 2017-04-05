<div>

    <h3>edit {{$user->username}}'s profile</h3>

    <br>

</div>

@if($errors->any())

@foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <p>{{ $error }}</p>
    </div>
@endforeach

@endif

<div>
{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'files' => true]) !!}

<div class="form-group">

{!! Form::label('name','Name') !!}
{!! Form::text('name',null,array('class'=>'form-control')) !!}

</div>

<div class="form-group">

    {!! Form::label('email','Email') !!}
    {!! Form::text('email',null,array('class'=>'form-control')) !!}

</div>

<div class="form-group">

    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',null,array('class'=>'form-control')) !!}

</div>
	

<div class="form-group">

    {!! Form::label('gender','Gender') !!}
    {!! Form::select('gender',[
            'Not specified' => 'Not specified',
            'Male' => 'Male',
            'Female' => 'Female',
            ], null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('avatar', 'Avatar (jpeg/png)') !!}
    {!! Form::file('avatar') !!}
    {!! Form::reset('Clear', array('class' => 'pull-right')) !!}
</div>

    {!! Form::submit('Update Profile', 
        array('class'=>'btn btn-primary')) !!}

    <a class="btn btn-primary" href="/users/{{$user->id}}">Cancel</a>


{!! Form::close() !!}

</div>
