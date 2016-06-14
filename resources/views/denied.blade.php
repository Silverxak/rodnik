@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="jumbotron alert-danger text-center">
					<h4>Добро пожаловть {{ Auth::user()->name }}!</h4>
					<h4>Доступ предоставляется только из-под локальной сети НИЯУ "МИФИ"</h4>
			</div>
		</div>
	</div>
</div>
@endsection
