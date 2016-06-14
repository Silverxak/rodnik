@extends('app_admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">Список тестов</div>
				<div class="panel-body">
					<div class="col-md-6">
						<input type="file" class="filestyle" data-buttonName="btn-primary" id="importTestFile">
					</div>
					<button class="btn btn-primary" type="button" onclick="importTest(document.getElementById('importTestFile'), this);">Добавить тест</button>
					<hr>
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Название</th>
								<th>Кол-во вопросов</th>
								<th>5</th>
								<th>4</th>
								<th>3</th>
								<th>Время</th>
								<th>Дата создания</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($testlist as $test)
							<tr class="tr-test" style="cursor: pointer;">
								<td class="tr-test-title">{{ $test->title }}</td>
								<td>{{ $test->qcount }}</td>
								<td>{{ $test->excellent }}</td>
								<td>{{ $test->good }}</td>
								<td>{{ $test->satisfactory }}</td>
								<td>00:{{ $test->min }}:{{ $test->sec == '0' ? '00' : $test->sec}}</td>
								<td>{{ date('m.d.y', strtotime($test->created_at)) }}</td>
								<td><i class="glyphicon glyphicon-remove tr-test-remove"></i></td>
								<td class="tr-test-id" style="display: none;">{{ $test->id }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection