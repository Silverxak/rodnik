@extends('app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">Список пользователей-студентов</div>
				<div class="panel-body">
					<div class="col-md-6">
						<input type="file" class="filestyle" data-buttonName="btn-primary" id="importStudentFile">
					</div>
					<button class="btn btn-primary" type="button" onclick="importStudent(document.getElementById('importStudentFile'), this);">Добавить группу</button>
					<button class="btn btn-info" type="button">Обновить пароли</button>
					<hr>
					<table class="table table-hover table-condensed">
						<thead>
							<th>ФИО</th>
							<th>Логин</th>
							<th>Пароль</th>
							<th>Группа</th>
							<th></th>
						</thead>
						<tbody>
							@foreach( $users as $user )
							<tr>
								<td class="tr-student-name">{{ $user->name }}</td>
								<td class="tr-student-login">{{ $user->login }}</td>
								<td class="tr-student-visible_pass">{{ $user->visible_pass }}</td>

								@foreach( $groups as $group )
								@if( $user->group_id == $group->id )
								<td>{{ $group->label }}</td>
								@endif
								@endforeach
								<td>
									<i class="glyphicon glyphicon-remove user-remove" style="margin-right: 10px; cursor: pointer;" style="cursor: pointer;"></i>
									<i data-toggle="modal" data-target="#studModal" class="glyphicon glyphicon-pencil user-edit" style="cursor: pointer;"></i>
								</td>
								<td class="tr-student-id" style="display: none;">{{ $user->id }}</td>
							@endforeach
						</tbody>
					</table>
					<!--Модальное окно изменения студента -->
					<div class="modal" id="studModal" tabindex="-1" role="dialog">
					     <div class="modal-dialog modal-lg">
					       <div class="modal-content col-md-11">
					          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
					            	<h4 class="modal-title" id="myModalLabel">Добавить админитратора</h4>
					          </div>
					        <div class="modal-body">
								<form role="form" class="form-inline">
									<div class="container-fluid">
										<div class="row-fluid">
											<div id="student-fio-form-group" class="form-group">
												<label for="fio"><b>ФИО</b></label>
												<input type="text" class="form-control" id="student-fio" placeholder="Введите фио">
											</div>											
											<div  id="student-login-form-group" class="form-group">
												<label for="login"><b>Логин</b></label>
												<input type="text" class="form-control" id="student-login" placeholder="Введите логин">
											</div>
											<div  id="student-pass-form-group" class="form-group">
												<label for="pass"><b>Пароль</b></label>
												<input type="text" class="form-control" id="student-pass" placeholder="Введите пароль">
											</div>
											<div style="display: none;" id="student-id-form-group" class="form-group">
												<label for="id"><b></b></label>
												<input type="text" class="form-control" id="student-id">
											</div>
										</div>						
									</div>
								</form>
					        </div>
					       <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button>
					        	<button id="sendStudent" class="btn btn-success" type="button" onclick="sendUpdateStudent()">Ок</button></div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection