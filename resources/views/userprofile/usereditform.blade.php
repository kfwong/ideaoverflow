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
{!! Form::model($user,array('route'=>array('users.update',$user->id),'method'=>'PATCH')) !!}

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

    {!! Form::submit('Update Profile', 
        array('class'=>'btn btn-primary')) !!}

    <a class="btn btn-primary" href="/users/{{$user->id}}">Cancel</a>


{!! Form::close() !!}

</div>
