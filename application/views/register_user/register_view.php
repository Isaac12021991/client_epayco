<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Epayco</title>
	<script src="<?php echo base_url('assets/plugins/jquery/jquery-3.3.1.min.js'); ?>"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" /> </head>

<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
		<h5 class="my-0 mr-md-auto font-weight-normal"><b>Epayco</b> - Cliente</h5>
		<nav class="my-2 my-md-0 mr-md-3"> </nav>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 p-0 p-lg-0"> </div>
			<div class="col-lg-6 p-0 p-lg-0">
				<div class="card">
					<!--begin::Body-->
					<div class="card-body p-10">
						<div class="mb-6">
							<!--begin::Section-->
							<div class="row p-10">
								<div class="col-12">
									<div class="mb-10">
										<h3>Registrarse</h3> </div>
									<form class="form">
										<p class="hint"> Datos Personales</p>
										<div class="form-group">
											<input type="text" name="first_name" id="first_name" class="form-control h-auto" autocomplete="off" maxlength="25" placeholder="Nombre" autofocus="autofocus" value=""> </div>
										<div class="form-group">
											<input type="text" name="last_name" id="last_name" maxlength="25" autocomplete="off" class="form-control h-auto" placeholder="Apellido" value=""> </div>
										<div class="form-group">
											<input type="text" name="nu_documento" id="nu_documento" class="form-control h-auto" maxlength="30" autocomplete="off" placeholder="Documento" value=""> </div>
										<div class="form-group">
											<input type="number" name="nu_celular" id="nu_celular" class="form-control h-auto" maxlength="15" autocomplete="off" placeholder="Celular" value=""> </div>
										<div class="form-group">
											<input type="text" name="email" id="email" class="form-control h-auto" autocomplete="off" placeholder="Email" maxlength="50" value=""> </div>
										<div class="form-group">
											<input type="password" name="password" id="password" class="form-control h-auto" autocomplete="off" placeholder="Clave" maxlength="15" value=""> </div>
										<div class="form-group">
											<input type="password" name="password_repeat" id="password_repeat" autocomplete="off" class="form-control h-auto" maxlength="15" placeholder="Confirme la clave"> </div>
										<div class="form-group d-flex mt-10"> <a id="sendInfoUser" class="btn btn-primary">Aceptar</a> <a id="kt_login_signup_cancel" href="<?php echo site_url('auth/login')?>" class="btn btn-default">Cancelar</a> </div>
									</form>
								</div>
								<!--end::Text-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 p-0 p-lg-0"> </div>
		</div>
		<footer class="pt-4 my-md-5 pt-md-5">
			<div class="row">
				<div class="col-12 col-md"> </div>
			</div>
		</footer>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		$("input:text:visible:first").focus();
	});
	$('#sendInfoUser').click(function() {
		var email = $('#email').val();
		var nu_documento = $('#nu_documento').val();
		var nu_celular = $('#nu_celular').val();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var password_repeat = $('#password_repeat').val();
		var password = $('#password').val();
		if(nu_documento == '') {
			alert('Ingrese el numero de documento');
			$('#email').focus();
			return;
		};
		if(email == '') {
			alert('Ingrese el email');
			$('#email').focus();
			return;
		};
		if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
			alert('Ingrese un email válido');
			$('#email').focus();
			return;
		}
		if(first_name == '') {
			alert('Ingrese el nombre');
			$('#first_name').focus();
			return;
		};
		if(last_name == '') {
			alert('Ingrese el apellido');
			$('#last_name').focus();
			return;
		};
		if(password.length <= 4) {
			alert('Ingrese un minimo de 6 caracateres en su contraseña');
			$('#password').focus();
			return false;
		}
		if($('#password').val() != $('#password_repeat').val()) {
			alert('Las contraseña no son iguales por favor verifique');
			$('#password').focus();
			return;
		}
		if($('#password').val() == '') {
			alert('Ingrese una contraseña');
			$('#password').focus();
			return;
		}
		fetch('<?php echo site_url('
			register_user / add_user ') ?>', {
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					'email': email,
					'nu_celular': nu_celular,
					'first_name': first_name,
					'last_name': last_name,
					'password': password,
					'nu_documento': nu_documento
				})
			}).then(function(response) {
			if(response.ok) {
				return response.text()
			} else {
				throw "Error en la llamada Ajax";
			}
		}).then(function(resp) {
			var obj = JSON.parse(resp);
			if(obj.error == 0) {
				alert(obj.message);
				$('#sendInfoUser').html('Crear usuario');
				$('#sendInfoUser').attr("disabled", false);
				$(location).attr('href', "<?php echo site_url('home/index') ?>");
			} else {
				alert(obj.message);
				$('#sendInfoUser').html('Crear usuario');
				$('#sendInfoUser').attr("disabled", false);
				return;
			}
		}).catch(function(err) {});
	});
	</script>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>