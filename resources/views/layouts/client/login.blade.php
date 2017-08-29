@extends ('main')
@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		{{ Form::open(array('url'=>'/{instance}/client/login','method'=>'post')) }}
			<div class="form-group">
				{{ Form::label('name','Usuario') }}
				{{ Form::text('name',null,array('class'=>'form-control input-sm input-block-level')) }}
				@if ($errors->has('name'))
					{{ $errors->first('name') }}
				@endif

			</div>
			<div class="form-group">
				{{ Form::label('password','Password') }}
				{{ Form::password('password', array('class'=>'form-control input-sm input-block-level')) }}
				@if ($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>

			<div class="form-group">
				{{ Form::label('remember','Remember me') }}
				{{ Form::checkbox('remember') }}
			</div>
			{{ Form::submit('Log In', array('class'=>'btn btn-primary')) }}
                {{Form::close()}}
		</div>
	</div>
@stop
