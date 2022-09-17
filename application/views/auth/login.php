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
									<div class="login-signin animsition">
										<form action="<?= site_url('/auth/login') ?>" id="form_login" method="POST">
											<div class="mb-20">
												<h3>Acceder</h3> </div> <span id="infoMessage"> <b><?php echo $message;?></b></span>
											<form class="form">
												<div class="form-group mb-2">
													<?php echo form_input($identity);?>
												</div>
												<div class="form-group mb-2">
													<?php echo form_password($password);?>
												</div>
												<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
													<div class="checkbox-inline">
														<label class="checkbox m-0 text-muted">
															<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> <span></span>Recordarme</label>
													</div>
												</div> <a href="javascript:" id="sendInfoUser" class='btn btn-primary btn-block'>Ingresar</a> </form>
											<div class="mt-10"> <span class="opacity-70 mr-4">¿No tienes cuenta?</span> <a href="<?php echo site_url('register_user/register')?>" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Registrarse!</a> </div>
									</div>
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
	<script>
	$('#sendInfoUser').click(function() {
		$("#form_login").submit();
	});
	$(document).ready(function() {
		$("input:text:visible:first").focus();
	});
	</script>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>