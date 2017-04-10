<div>

    <h3>Edit {{$user->username}}'s profile</h3>

    <br>

</div>

@if($errors->any())

@foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <p>{{ $error }}</p>
    </div>
@endforeach

@endif

<div class="container-fluid">
    <div class="row">
        
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'files' => true]) !!}
        
        <div class="form-group col-xs-12">  
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,array('class'=>'form-control', 'required' => 'required')) !!}
        </div>

        <div class="form-group col-xs-12">
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',null,array('class'=>'form-control', 'required' => 'required')) !!}
        </div>
		
		<div class="form-group col-xs-12">
            {!! Form::label('hide_email', 'Hide_email') !!}
            <div id="hide_email">
                <label class="radio-inline">
                    {!! Form::radio('hide_email', 'true', null, array('required' => 'required')) !!} True
                </label>
                <label class="radio-inline">
                    {!! Form::radio('hide_email', 'false', null, array('required' => 'required')) !!} False
                </label>               
            </div>
        </div>

        <div class="form-group col-xs-12">
            {!! Form::label('description','Description') !!}
            {!! Form::textarea('description',null,array('class'=>'form-control')) !!}
        </div>
	
        <div class="form-group col-xs-12">
            {!! Form::label('gender', 'Gender') !!}
            <div id="gender">
                <label class="radio-inline">
                    {!! Form::radio('gender', 'male', null, array('required' => 'required')) !!} Male
                </label>
                <label class="radio-inline">
                    {!! Form::radio('gender', 'female', null, array('required' => 'required')) !!} Female
                </label>
                <label class="radio-inline">
                    {!! Form::radio('gender', 'unspecified', null, array('required' => 'required')) !!} Unspecified
                </label>               
            </div>
        </div>

        <div class="form-group col-xs-12">
            {!! Form::label('avatar', 'Avatar (jpeg/png)') !!}
            {!! Form::file('avatar') !!}
        </div>

        <div class="form-group col-xs-12">
            {!! Form::reset('Reset form') !!}
        </div>

        <div class="col-xs-12">
            <br>
            {!! Form::submit('Update Profile', array('class'=>'btn btn-primary')) !!}
            <a class="btn btn-primary" href="/users/{{$user->id}}">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
