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
									<h3>Token <small>Se ha enviado a tu correo electronico un codigo de 6 digitos</small></h3> </div>
								<form class="form">
									<div class="form-group mb-5">
										<input type="text" name="tx_token" id="tx_token" maxlength="6" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Token" value=""> </div>
									<div class="form-group d-flex flex-wrap mt-10"> <a id="sendInfo" class="btn btn-primary font-weight-bold btn-block">Aceptar</a> <a href="<?php echo site_url('home/index')?>" class="btn btn-default font-weight-bold btn-block">Cancelar</a> </div>
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
		var tx_token = $('#tx_token').val();
		var ca_monto = '<?php echo $ca_monto; ?>'
		fetch('<?php echo site_url('
			home / sendPay ') ?>', {
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					'ca_monto': ca_monto,
					'tx_token': tx_token
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