@extends ('session')
@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
                    {{ Form::open(array('url'=>'/register','method'=>'post')) }}
                    {{ Form::submit('Register', array('class'=>'btn btn-primary')) }}
                    {{ Form::close()}}
		</div>
	</div>
@stop
