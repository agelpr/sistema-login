<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: gray">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-success">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/AgelPR Design1.png" height="250">
					</div>
					<form id="frmRegistro" action="index.html" method="post">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellido" name="">
						<label>Usuario</label>
						<input type="text" class="form-control input-sm" id="usuario" name="">
						<label>Password</label>
						<input type="password" class="form-control input-sm" id="password" name="">
						<p></p>
						<span class="btn btn-success" id="registrarNuevo">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-primary">Login</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#apellido').val()==""){
				alertify.alert("Debes agregar el apellido");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&apellido=" + $('#apellido').val() +
					"&usuario=" + $('#usuario').val() +
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){
							if(r==1){
								$('#frmRegistro')[0].reset();//borar los datos del registro una vez pulsado el boton de enviar

								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>
