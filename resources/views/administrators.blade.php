@extends('app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">Список пользователей-студентов</div>
				<div class="panel-body">
					<table class="table table-hover table-condensed">
						<thead>
							<th>ФИО</th>
							<th>Логин</th>
							<th>Действие</th>
						</thead>
						<tbody>
							@foreach($admlist as $adm)
							<tr>
								<td class="tdname">{{ $adm->name }}</td>
								<td class="tdlogin">{{ $adm->login }}</td>
								<td><i class="glyphicon glyphicon-remove admin-remove" style="margin-right: 10px; cursor: pointer;" style="cursor: pointer;"></i><i data-toggle="modal" data-target="#adminModal" class="glyphicon glyphicon-pencil admin-edit" style="cursor: pointer;"></i></td>
								<td class="tdid" style="display: none;">{{ $adm->id }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#adminModal">Добавить админа</button>

					<!--Модальное окно добавления нового администратора -->
					<div class="modal" id="adminModal" tabindex="-1" role="dialog">
					     <div class="modal-dialog modal-lg">
					       <div class="modal-content col-md-11">
					          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
					            	<h4 class="modal-title" id="myModalLabel">Добавить админитратора</h4>
					          </div>
					        <div class="modal-body">
								<form role="form" class="form-inline">
									<div class="container-fluid">
										<div class="row-fluid">
											<div id="admin-name-form-group" class="form-group">
												<label for="name"><b>Имя</b></label>
												<input type="text" class="form-control" id="admin-name" placeholder="Введите фио">
											</div>											
											<div  id="admin-login-form-group" class="form-group">
												<label for="login"><b>Логин</b></label>
												<input type="text" class="form-control" id="admin-login" placeholder="Введите логин">
											</div>
											<div  id="admin-pass-form-group" class="form-group">
												<label for="pass"><b>Пароль</b></label>
												<input type="text" class="form-control" id="admin-pass" placeholder="Введите пароль">
											</div>
											<div class="form-group" style="display: none;">
												<input type="text" class="form-control" id="admin-id">
											</div>
										</div>						
									</div>
								</form>
					        </div>
					       <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button>
					        	<button id="sendAdm" class="btn btn-success" type="button" onclick="sendNewAdmin()">Ок</button></div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection