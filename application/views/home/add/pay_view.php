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
								<h3>Informacion de pago</h3>
								<form class="form" action="<?php echo site_url('home/sendToken') ?>" method="post">
									<div class="form-group mb-5">
										<input type="number" name="ca_monto" id="ca_monto" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="25" placeholder="Monto" autofocus="autofocus" value=""> </div>
									<div class="form-group d-flex flex-wrap  mt-10">
										<button class="btn btn-primary btn-block font-weight-bold">Aceptar</button> <a href="<?php echo site_url('home/index')?>" class="btn btn-default btn-block">Cancelar</a> </div>
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