
<center>
	<h1>
		<i>
			Preinscripción
		</i>
	</h1>
</center>
<div class="form">
	<?php 
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); 
	?>
	<div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Inicia Sesion para Continuar</strong>
					</div>
					<br>
					<div class="panel-body">
						<form role="form" action="#" method="POST">
							<fieldset>
								<div class="row" align="center">
									<div class="center-block" align="center">
										<img class="profile-img" style="border-radius:50%;text-align:center;" src="images/photo.png" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">															
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span>
												<?php
													$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
														'name'=>'LoginForm[username]',
														'model'=>$model,
														//'value'=>$value,
														'sourceUrl'=>$this->createUrl('ListarUsuarios'),
														'options'=>array(
															'minLength'=>'1',   //minima longitud
															'showAmin'=>'fold',   //Tipo de animacion
															'select'=>'js:function(event,ui){
																$("#MUsuario_username").val(ui.item["username"]);
															}',  //cuando se seleccione una opcion      
														),
														'htmlOptions'=>array(
															'class'=>'form-control',
															'placeholder'=>'Usuario',
														),

													));
												?>															
											</div>
											<?php echo $form->error($model,'username',array('class' => 'validaciones')); ?>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<?php 
													echo $form->passwordField($model,'password',array('placeholder'=>'Contraseña',
														'class'=>'form-control', 'type'=>'password')); ?>
											</div>
											<?php echo $form->error($model,'password',array('class' => 'validaciones')); ?>
											<br>
										</div>		
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						<center>PREINS</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->
