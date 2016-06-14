@extends('app_admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">История прохождения тестирования</div>
				<div class="panel-body">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Студент</th>
								<th>Тест</th>
								<th>Дата и время</th>
								<th><i class="glyphicon glyphicon-ok"></i></th>
								<th>
									<i class="glyphicon glyphicon-chevron-left"></i>
									<i class="glyphicon glyphicon-chevron-right"></i>
								</th>
								<th><i class="glyphicon glyphicon-remove"></i></th>
								<th>Оценка</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Сидоров И.С</td>
								<td>МПС</td>
								<td>02.05.2016 19:47</td>
								<td>5</td>
								<td>5</td>
								<td>40</td>
								<td>2</td>
							</tr>
							<tr>
								<td>Петров А.В.</td>
								<td>Схемотехника</td>
								<td>17.05.2016 15:25</td>
								<td>28</td>
								<td>1</td>
								<td>1</td>
								<td>5</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection