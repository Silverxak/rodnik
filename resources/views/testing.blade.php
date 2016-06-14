@extends('app_student')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">Выберите тест для прохождения</div>
				<div class="panel-body">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Название</th>
								<th>Кол-во вопросов</th>
								<th>5</th>
								<th>4</th>
								<th>3</th>
								<th>Время</th>
							</tr>
						</thead>
						<tbody>
							<tr style="cursor: pointer;">
								<td>МПС</td>
								<td>50</td>
								<td>80%</td>
								<td>60%</td>
								<td>45%</td>
								<td>00:30:00</td>
							</tr>
							<tr style="cursor: pointer;">
								<td>Схемотехника</td>
								<td>30</td>
								<td>80%</td>
								<td>60%</td>
								<td>45%</td>
								<td>00:20:00</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection