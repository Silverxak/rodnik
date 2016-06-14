@extends('app_student')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">Тест - Схемотехника</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<ul class="list-unstyled">
								<li>Для ответа на вопрос нажмите <code>Подтвердить</code></li>
								<li>Для перехода к следующему вопросу нажмите <code>Следующий</code></li>
								<li>Для возврата к предадущему вопросу нажмите <code>Предыдущий</code></li>
							</ul>
						</div>
						<div class="col-md-4 col-md-offset-4">
							<ul class="list-unstyled">
								<li>Осталось вопросов: <code>30</code></li>
								<li>Принято ответов: <code>0</code></li>
							</ul>
						</div>
					</div>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
							<span class="sr-only">10% Complete</span>
						</div>
					</div>
					<hr>
					<div class="row-fluid">
						<div class="well">
							<p class="lead text-info">
								<strong>
									К какой из операций эквивалентна булева функция "Штрих Шеффера" ?
								</strong>
							</p>
							<div>
								<ul class="list-unstyled">
									<li><input type="checkbox" value=""> И-НЕ</li>
									<li><input type="checkbox" value=""> ИЛИ-НЕ</li>
									<li><input type="checkbox" value=""> ИСКЛЮЧАЮЩЕЕ ИЛИ</li>
									<li><input type="checkbox" value=""> ИЛИ</li>
									<li><input type="checkbox" value=""> И</li>
									<li><input type="checkbox" value=""> НЕ</li>
								</ul>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<button class="btn btn-primary" type="button">Предыдущий</button>		
							<button class="btn btn-success" type="button">Подтвердить</button>		
							<button class="btn btn-primary" type="button">Следующий</button>							
						</div>
					</div>
		
				</div>
			</div>
		</div>
	</div>
</div>
@endsection