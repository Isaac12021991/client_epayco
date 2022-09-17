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
									<h3>Recargar billetera</h3> </div>
								<form class="form">
									<div class="form-group mb-2">
										<input type="text" name="nu_documento" id="nu_documento" class="form-control h-auto form-control-solid py-4 px-8" maxlength="30" autocomplete="off" placeholder="Documento" value=""> </div>
									<div class="form-group mb-2">
										<input type="text" name="nu_celular" id="nu_celular" maxlength="25" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" placeholder="NRo celular" value=""> </div>
									<div class="form-group mb-2">
										<input type="text" name="ca_monto" id="ca_monto" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="25" placeholder="Monto" autofocus="autofocus" value=""> </div>
									<div class="form-group mt-10"> <a id="sendInfo" class="btn btn-primary btn-block">Aceptar</a> <a href="<?php echo site_url('home/index')?>" class="btn btn-block">Cancelar</a> </div>
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
	<script type="text/javascript">
	$('#sendInfo').click(function() {
		var nu_documento = $('#nu_documento').val();
		var ca_monto = $('#ca_monto').val();
		var nu_celular = $('#nu_celular').val();
		if(nu_documento == '') {
			alert('Ingrese el numero de documento')
			$('#nu_documento').focus();
			return;
		};
		if(ca_monto == '') {
			alert('Ingrese el monto')
			$('#ca_monto').focus();
			return;
		};
		if(nu_celular == '') {
			alert('Ingrese un numero de celular valido');
			$('#nu_celular').focus();
			return;
		};
		if(ca_monto <= 0) {
			alert('Ingrese un monto valido');
			$('#ca_monto').focus();
			return false;
		}
		fetch('<?php echo site_url('
			home / rechargeWallet ') ?>', {
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					'nu_documento': nu_documento,
					'ca_monto': ca_monto,
					'nu_celular': nu_celular
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
				$('#sendInfo').html('Aceptar');
				$('#sendInfo').attr("disabled", false);
			} else {
				alert(obj.message);
				$('#sendInfo').html('Aceptar');
				$('#sendInfo').attr("disabled", false);
				return;
			}
		}).catch(function(err) {
			$('#sendInfo').html('Aceptar');
			$('#sendInfo').attr("disabled", false);
		});
	});
	</script>