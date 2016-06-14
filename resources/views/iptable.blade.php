@extends('app_admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<div class="alert alert-success" id="addmesg" style="display: none;"></div>
			<div class="panel panel-default">
				<div class="panel-heading">Список разрешенных адресов</div>

				<div class="panel-body">
					<table class="table table-hover table-condensed">
					<thead>
						<tr>
							<th>ip</th>
							<th>mask</th>
							<th>action</th>
						</tr>						
					</thead>
					<tbody>
					@foreach($iplist as $ips)
					<tr>
						<td class="tdip">{{ $ips->adds }}</td>
						<td class="tdmask">{{ $ips->mask }}</td>
						<td>
							<i class="glyphicon glyphicon-remove adress-remove" style="margin-right: 10px; cursor: pointer;" style="cursor: pointer;"></i>
							<i data-toggle="modal" data-target="#basicModal" class="glyphicon glyphicon-pencil adress-edit" style="cursor: pointer;"></i>
						</td>
					</tr>
					@endforeach					
					</tbody>
					</table>
					<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#basicModal">Добавить адресс</button>

					<!--Модальное окно добавления нового адреса -->
					<div class="modal" id="basicModal" tabindex="-1" role="dialog">
					     <div class="modal-dialog">
					       <div class="modal-content">
					          <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
					            	<h4 class="modal-title" id="myModalLabel">Добавить ip-адрес</h4>
					          </div>
					        <div class="modal-body">
					        	<div class="form-inline">
					        		<div id="divip" class="form-group has-feedback">
					        			<div class="input-group">
		  									<span class="input-group-addon" id="basic-addon1">ip</span>
		  									<input id="ip" type="text" class="form-control" placeholder="ip адресс" aria-describedby="basic-addon1">
					        			</div>	
				        			    <span id="spanip" class="glyphicon form-control-feedback" aria-hidden="true"></span>
										<span id="inputGroupSuccess3Status" class="sr-only">(success)</span>			        			
					        		</div>
					        		<div id="divmask" class="form-group has-feedback">
					        			<div class="input-group">
		  									<span class="input-group-addon" id="basic-addon2">mask</span>
		  									<input id="mask" type="text" class="form-control" placeholder="маска сети" aria-describedby="basic-addon2">
					        			</div>	
				        			    <span id="spanmask" class="glyphicon form-control-feedback" aria-hidden="true"></span>
										<span id="inputGroupSuccess3Status" class="sr-only">(success)</span>			      
					        		</div>
					        	</div>
					        </div>
					       <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button>
					        	<button id="sendAddr" class="btn btn-success" type="button" onclick="sendNewAddress()">Ок</button></div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection