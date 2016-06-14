@extends('app_student')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">Тест - Схемотехника</div>
				<div class="panel-body">
					<div class="row-fluid">
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<h2 class="text-center">Ваша оценка:</h2>
								<h1 class="text-center text-success">5</h1>
								<h5 class="text-center">Количество верно отвеченных вопросов: 30</h5>
								<h5 class="text-center">Количество неверно отвеченных вопросов: 0</h5>
								<h5 class="text-center">Количество частично верно отвеченных вопросов: 0</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection