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
									<h3>Consultar Saldo</h3> </div>
								<form class="form" id="form_consult" method="post" action="<?php echo site_url('home/sendConsult') ?>">
									<div class="form-group mb-2">
										<input type="text" name="nu_documento" id="nu_documento" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="25" placeholder="Documento" autofocus="autofocus" value=""> </div>
									<div class="form-group mb-2">
										<input type="text" name="nu_celular" id="nu_celular" maxlength="25" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" placeholder="NRo celular" value=""> </div>
									<div class="form-group d-flex flex-wrap mt-10"> <a id="sendInfo" class="btn btn-primary btn-block font-weight-bold">Aceptar</a> <a id="kt_login_signup_cancel" href="<?php echo site_url('home/index')?>" class="btn btn-primary btn-block font-weight-bold">Cancelar</a> </div>
								</form>
								<div class="p-6" id="resultResp"> </div>
							</div>
							<!--end::Text-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 p-0 p-lg-0"> </div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		jQuery('#ajax_remote').on('hidden.bs.modal', function(e) {
			jQuery(this).removeData('bs.modal');
			jQuery(this).find('.modal-content').html('Cargando...');
		})
	}); // Fin ready
	$('#sendInfo').click(function() {
		var nu_documento = $('#nu_documento').val();
		var nu_celular = $('#nu_celular').val();
		if(nu_documento == '') {
			alert('Ingrese el numero de documento')
			$('#nu_documento').focus();
			return;
		};
		if(nu_celular == '') {
			alert('Ingrese el numero de celular')
			$('#nu_celular').focus();
			return;
		};
		$.ajax({
			method: "POST",
			data: {
				'nu_celular': nu_celular,
				'nu_documento': nu_documento
			},
			url: "<?php echo site_url('home/sendConsult') ?>",
			beforeSend: function() {
				$('#sendInfo').html('Enviando');
				$('#sendInfo').attr("disabled", true);
			},
		}).done(function(data) {
			var obj = JSON.parse(data);
			if(obj.error == 0) {
				$('#resultResp').html('<p class="text-center"> El saldo disponible es ' + obj.ca_saldo + '</p>');
				$('#sendInfo').html('Enviar');
				$('#sendInfo').attr("disabled", false);
			} else {
				alert(obj.message)
				$('#sendInfo').html('Enviar');
				$('#sendInfo').attr("disabled", false);
				return;
			}
		}).fail(function() {
			alert(obj.message)
			$('#sendInfo').html('Aceptar');
			$('#sendInfo').attr("disabled", false);
			return;
		});
	});
	</script>