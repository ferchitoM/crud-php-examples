<?php
    //Utilizamos una variable de sesión para indicarle al header.php qué archivo CSS debe abrir
    session_start();
    $_SESSION['css_folder'] = "suscripcion/style.css";

    //incluimos todo el encabezado html desde el archivo header.php
    include('includes/header.php');
?>
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap">
							<div class="row">
								<div class="col-sm-12">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="item-title text-center">	¡Suscribete! </h2>
										</div><!--End item-info -->
								   </div><!--End item-content -->
								</div><!--End col -->
								<div class="col-md-12">

								<!-- formulario suscripcion -->
								<form name="contactform" action="controllers/suscripcionController.php" method="POST" data-toggle="validator" class="popup-form">
			                        <div class="row">
			                          <div id="msgContactSubmit" class="hidden"></div>
			                          <div class="form-group col-sm-6">
			                            <div class="help-block with-errors"></div>
			                            <input name="nombreSus" id="nombreSus" placeholder="Nombre completo*" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}" class="form-control" type="text" required data-error="Por favor ingresa tu nombre">
			                            <div class="input-group-icon"><i class="fa fa-user"></i></div>
			                          </div><!-- end form-group -->
			                          <div class="form-group col-sm-6">
			                            <div class="help-block with-errors"></div>
			                            <input name="emailSus" id="emailSus" placeholder="Correo electronico*" pattern=".*@\w{2,}\.\w{2,}" class="form-control" type="email" required data-error="Por favor ingresa un correo electrónico válido">
			                            <div class="input-group-icon"><i class="fa fa-envelope"></i></div>
			                          </div><!-- end form-group -->
			                          <div class="form-group last col-sm-12">
										<button type="submit" id="submit" class="btn btn-custom"><i class='fa fa-envelope'></i> suscribirse</button>
									  </div><!-- end form-group -->
			                          <span class="sub-text">* Campos requeridos</span>
			                          <div class="clearfix"></div>
			                        </div><!-- end row -->
                      			</form><!-- end form -->

								<!-- fin formulario suscripcion -->

								</div>
							</div><!--End row -->
							<!-- Popup end -->
						</div><!-- end item-wrap -->
					</div><!--End col -->
				</div><!--End tab-content -->
			</div><!--End row -->
		</div><!--End container -->
	</section>

	<div class="colBottomMargin">
		&nbsp;<div class="colBottomMargin">&nbsp;</div>
	</div>	
	
<?php 
	//incluimos todo el pie de página html con el archivo footer.php
	include('includes/footer.php'); 
?>
