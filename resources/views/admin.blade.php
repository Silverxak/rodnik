@extends('app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Админ панель</div>

				<div class="panel-body">
					Система тестирования Rodnik приветствует вас уважаемый {{ Auth::user()->name }} 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
