@extends('app_student')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Добро пожаловать!</div>

				<div class="panel-body">
					Система тестирования Rodnik приветствует вас уважаемый {{ Auth::user()->name }} 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
