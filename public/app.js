	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	var oldAdds = '';
	var oldMask = '';

//----Горячая проверка формы отправки адреса перед отправкой (подсветка)----

	$(function(){
    $('#mask').keyup(function(){
    	var pattern = /^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/
    	if(pattern.test($('#mask').val())){
			$('#divmask').attr('class', 'form-group has-success has-feedback');
			$('#spanmask').attr('class', 'glyphicon glyphicon-ok form-control-feedback');
    	}
    	else if(!(pattern.test($('#mask').val()))){
			$('#divmask').attr('class', 'form-group has-error has-feedback');
			$('#spanmask').attr('class', 'glyphicon glyphicon-remove form-control-feedback');
    	}
    	});
	});

	$(function(){
    $('#ip').keyup(function(){
    	var pattern = /^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?$)/;
    	if(pattern.test($('#ip').val())){
    		$('#divip').attr('class', 'form-group has-success has-feedback');
			$('#spanip').attr('class', 'glyphicon glyphicon-ok form-control-feedback');
    	}
    	else if(!(pattern.test($('#ip').val()))){
	 		$('#divip').attr('class', 'form-group has-error has-feedback');
			$('#spanip').attr('class', 'glyphicon glyphicon-remove form-control-feedback');   		
    	}
    	});
	});


//----Отправка нового адреса на сервер----

	function sendNewAddress(){
		var pattern = /^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
		if(pattern.test($('#ip').val()) && pattern.test($('#mask').val())) {
			$.ajax({
				url: 'iptable/addAddress',
				type: 'POST',
				data: {adds: $('#ip').val(), mask: $('#mask').val()},
			})
			.done(function() {
				$('#basicModal').hide();
				location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	}

//----Заполнение формы модального окна для для изменения адреса----

	$('.adress-edit').each(function(){
		$(this).click(function(){
			$('#ip').val($(this).parent().siblings('.tdip').text());
			$('#mask').val($(this).parent().siblings('.tdmask').text());
			oldAdds = $('#ip').val();
			oldMask = $('#mask').val();
			$('#sendAddr').attr('onclick', 'updateAddress()');
		});
	});

//----Отправка измененного адреса адреса----

	function updateAddress(){
		var pattern = /^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
		if(pattern.test($('#ip').val()) && pattern.test($('#mask').val())) {
			$.ajax({
				url: 'iptable/updateAddress',
				type: 'POST',
				data: {
					oldAdds: oldAdds, 
					oldMask: oldMask, 
					adds: $('#ip').val(), 
					mask: $('#mask').val()
				},
			})
			.done(function() {
				$('#basicModal').hide();
				location.reload();
				('#ip').val('');
				('#mask').val('');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}	
	}

//----Удаление адреса----

	function deleteAddress(ip, mask){
		$.ajax({
			url: 'iptable/deleteAddress',
			type: 'POST',
			data:{
				adds: ip,
				mask: mask
			}
		})
		.done(function() {
			location.reload();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$('.adress-remove').each(function(){
		$(this).click(function(){
			var ip = $(this).parent().siblings('.tdip').text();
			var mask = $(this).parent().siblings('.tdmask').text();
			if(confirm('Вы действительно хотите удалить ip:' + ip + ' mask:' + mask + ' ?')){
				deleteAddress(ip, mask);
			}
		})
	});

//----Отправка нового админа на сервер----

	function sendNewAdmin(){

    	var pattern = /.+/;

		!pattern.test($('#admin-name').val()) ? $('#admin-name-form-group').attr('class', 'form-group has-error') : $('#admin-name-form-group').attr('class', 'form-group');
		!pattern.test($('#admin-login').val()) ? $('#admin-login-form-group').attr('class', 'form-group has-error') : $('#admin-login-form-group').attr('class', 'form-group');
		!pattern.test($('#admin-pass').val()) ? $('#admin-pass-form-group').attr('class', 'form-group has-error') : $('#admin-pass-form-group').attr('class', 'form-group');

    	if(pattern.test($('#admin-name').val()) || pattern.test($('#admin-login').val()) || pattern.test($('#admin-name').val())){
			$.ajax({
				url: '/admin/administrators/add',
				type: 'POST',
				data: {
					name: $('#admin-name').val(), 
					login: $('#admin-login').val(),
					password: $('#admin-pass').val()
				},
			})
			.done(function() {
				$('#adminModal').hide();
				location.reload();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
    	};		
	}

//----Заполнение формы модального окна для для изменения админа----

	$('.admin-edit').each(function(){
		$(this).click(function(){
			$('#admin-name').val($(this).parent().siblings('.tdname').text());
			$('#admin-login').val($(this).parent().siblings('.tdlogin').text());
			$('#admin-id').val($(this).parent().siblings('.tdid').text());
			$('#sendAdm').attr('onclick', 'updateAdmin()');
		});
	});

//----Отправка измененного адреса админа----

	function updateAdmin(){

		$.ajax({
			url: '/admin/administrators/edit',
			type: 'POST',
			data: {
				name: $('#admin-name').val(), 
				login: $('#admin-login').val(),
				password: $('#admin-pass').val(),
				id: $('#admin-id').val()
			},
		})
		.done(function() {
			$('#adminModal').hide();
			location.reload();
			$('#admin-name').val(''), 
			$('#admin-login').val(''),
			$('#admin-pass').val(''),
			$('#admin-id').val('')
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

//----Удаление админа----

	function deleteAdmin(id){
		$.ajax({
			url: '/admin/administrators/delete',
			type: 'POST',
			data:{
				id: id
			}
		})
		.done(function() {
			location.reload();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	$('.admin-remove').each(function(){
		$(this).click(function(){
			var nameAdmin = $(this).parent().siblings('.tdname').text();
			var id = $(this).parent().siblings('.tdid').text();
			if(confirm('Вы действительно хотите удалить администратора - ' + nameAdmin + ' ?')){
				deleteAdmin(id);
			}
		})
	});

//----Импорт теста----

	function importTest(fileInput, button){
		if(!fileInput.files.length){
			alert('Выберите файл');
			return;
		}

		button.disabled = true;

		var form = new FormData();

		form.append('file', fileInput.files[0]);

		$.ajax({
			url: '/admin/test/import',
			method: 'post',
			data: form,
  			processData: false,
    		contentType: false
		}).then(function(response){
			if(response.success){
				location.reload();
				alert('Тест успешно импортирован');
			}else{
				alert(response.message);
			}

			button.disabled = false;
		});
	}

//----Формирование ссылки для переходя по тесту со списка тестов----

	$('.tr-test').on('click', function(){
		document.location.href =  'test/' + $(this).children('.tr-test-id').text();
	});

//----Кнопка удаления теста----

	$('.tr-test-remove').on('click', function(){
		event.stopPropagation();
		var title = $(this).parent().siblings('.tr-test-title').text();

		if(confirm('Вы действительно хотите удалить тест - ' + title + ' ?')){
			$.ajax({
				url: '/admin/test/remove',
				method: 'POST',
				data: {
					id: $(this).parent().siblings('.tr-test-id').text()
				},
			})
			.done(function() {
				location.reload();
				alert('Тест успешно удален !');
			});
			
		}

	});	

//----Импорт студентов----

	function importStudent(fileInput, button){
		if(!fileInput.files.length){
			alert('Выберите файл');
			return;
		}

		button.disabled = true;

		var form = new FormData();

		form.append('file', fileInput.files[0]);

		$.ajax({
			url: '/admin/student/import',
			method: 'post',
			data: form,
  			processData: false,
    		contentType: false
		}).then(function(response){
			if(response.success){
				//location.reload();
				alert('Студенты успешно добавлены');
			}else{
				alert(response.message);
			}

			button.disabled = false;
		});
	}

//----Удаление студента----

	$('.user-remove').on('click', function(){
		event.stopPropagation();
		var name = $(this).parent().siblings('.tr-student-name').text();

		if(confirm('Вы хотите удалить - ' + name + ' ?')){
			$.ajax({
				url: '/admin/student/remove',
				method: 'POST',
				data: {
					id: $(this).parent().siblings('.tr-student-id').text()
				},
			})
			.done(function() {
				location.reload();
			});
			
		}

	});

//----Изменение студента----

	$('.user-edit').on('click', function(){

		$('#student-fio').val($(this).parent().siblings('.tr-student-name').text());
		$('#student-login').val($(this).parent().siblings('.tr-student-login').text());
		$('#student-pass').val($(this).parent().siblings('.tr-student-visible_pass').text());
		$('#student-id').val($(this).parent().siblings('.tr-student-id').text());
	});


	function sendUpdateStudent(){

		$.ajax({
			url: '/admin/student/update',
			method: 'POST',
			data: {
				fio: $('#student-fio').val(),
				login: $('#student-login').val(),
				visible_pass: $('#student-pass').val(),
				id: $('#student-id').val()
			},
		})
		.done(function() {
			document.location.reload();
			console.log("success");
		});
		
	}


//----Рокировка главной картинки----

$(function(){
  $(document).click(function(event) {
    if ($(event.mustang).closest("#message").length) return;
    event.stopPropagation();
  });
});







