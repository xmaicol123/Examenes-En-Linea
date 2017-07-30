<?php
	session_start();
	$_SESSION['cod_estudiante'];
	$_SESSION['loggedin_estudiante'] = true;
	/*ENVIO DE VARIABLE COD_EXAMEN*/
	$_SESSION['cod_examen'];
	$decode=base64_decode($_SESSION['cod_examen']);

	if (isset($_SESSION['cod_estudiante']) && $_SESSION['loggedin_estudiante'] == true) 
	{

	} 
	else 
	{
   	echo "Esta pagina es solo para usuarios registrados.<br>";
   	echo "<br><a href='../index.php'>Login</a>";
	exit;
	}
	/*SOLUCIONADO CODIGO RELOJ*/
	/*CONEXION Y CONSULTA*//* CODIGO PARA VOLVER ATRAS
	date_default_timezone_set('America/New_York');
	include_once('../php/PhpregExamen.php');
	$obj = new Examen();
	$resultado=$obj->consultaReloj($decode);
	while ($row=mysqli_fetch_array($resultado)) {
		$duration=$row['duracion'];
	}
	/*CODIGO1*//* CODIGO PARA VOLVER ATRAS
	$_SESSION["duration"]=$duration;
	$_SESSION["start_time"]=date("Y-m-d H:i:s");
	$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));
	$_SESSION["end_time"]=$end_time;
	/*CODIGO1*/
	/*SOLUCIONADO CODIGO RELOJ*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Sistema De Examenes En Linea</title>
<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
<link rel="stylesheet" type="text/css" href="../css/demo.css" />
<link rel="stylesheet" type="text/css" href="../css/icons.css" />
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css">
<script src="../js/modernizr.custom.js"></script>
<!--CONTEO REGRESIVO JAVASCRIPT-->
<script type="text/javascript">
	setInterval(function()
	{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","regContadorRegresivoPhp.php",false);
	xmlhttp.send(null);
	document.getElementById("response").innerHTML=xmlhttp.responseText;
	},100);
</script>
<!--CONTEO REGRESIVO JAVASCRIPT-->
</head>
<body>
		<div class="containerMenu">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<a class="codrops-icon codrops-icon-prev" href=""><span>BIENVENID@ <?php echo $_SESSION['nombre_estudiante']; ?></span></a>
							<span class="right"><a class="codrops-icon codrops-icon-drop" href="LogoutEstudiante.php"><span>SALIR</span></a></span>
						</div>
						<header class="codrops-header">
							<h1>Sistema De Examenes En Linea<span>Universidad Autonoma Gabriel Rene Moreno</span></h1>
						</header>
						<!--CONTENIDO-->
						<!--CONTEO REGRESIVO-->
						<center>
						<div id="response" style="font-size: 50px; width: 80%; max-width: 400px;background: white; border: 2px solid black; margin: 5px 5px; color: black;font-weight: bold;">
	
						</div>
						</center>
						<!--CONTEO REGRESIVO-->
						<section> 
						<div class="divRespuesta">
						<form method="POST" action="regResponderPregunta.php">
						
						<?php
						include_once('../php/PhpregExamen.php');
						$obj = new Examen();
						$resultado=$obj->consultarExamenPreguntaEstudiante($decode);
						$contador=0;
						foreach ($resultado as $row) {

							if ($row['cod_tipo_pregunta_753']==001) 
							{?>
							<!--PREGUNTA-->
							<p class="pPregunta">
							<?php $contador++; echo $contador.".- ";?>
							<?php echo $row['pregunta'] ?>
							</p>
							<!--SELECCION MULTIPLE-->
							<label><input type="radio" name="<?php echo $row['cod_pregunta'] ?>" value="<?php echo $row['opcion1'] ?>"> <?php echo $row['opcion1'] ?></label><br>
							<label><input type="radio" name="<?php echo $row['cod_pregunta'] ?>" value="<?php echo $row['opcion2'] ?>"> <?php echo $row['opcion2'] ?></label><br>
							<label><input type="radio" name="<?php echo $row['cod_pregunta'] ?>" value="<?php echo $row['opcion3'] ?>"> <?php echo $row['opcion3'] ?></label><br>
							<label><input type="radio" name="<?php echo $row['cod_pregunta'] ?>" value="<?php echo $row['opcion4'] ?>"> <?php echo $row['opcion4'] ?></label><br>
							<!--TRAMPA PARA GUARDAR COD EXAMEN-->
							<input type="text" name="cod_examen" value="<?php echo $row['cod_examen'] ?>" hidden="">
							<?php
							}

							else if ($row['cod_tipo_pregunta_753']==002) 
							{?>
							<!--PREGUNTA-->
							<p class="pPregunta">
							<?php $contador++; echo $contador.".- ";?>
							<?php echo $row['pregunta'] ?>
							</p>
							<!--SELECCION FALSO Y VERDADERO-->
							<input type="text" name="cod_examen" value="<?php echo $row['cod_examen'] ?>" hidden="">
							<label><input type="radio" name="<?php echo $row['cod_pregunta'] ?>" value="<?php echo $row['opcion1'] ?>"> <?php echo $row['opcion1'] ?></label><br>
							<label><input type="radio" name="<?php echo $row['cod_pregunta'] ?>" value="<?php echo $row['opcion2'] ?>"> <?php echo $row['opcion2'] ?></label><br>
							<?php
							}
							else
							{
								echo "Este Examen No Tiene Preguntas";
							}
						}
						?>
						<input type="text" name="txt_estado" value="Contestado" hidden="">
						<center>
						<input type="submit" name="Registrar" value="Registrar" class="btnReg" style="">
						</center>
						</form>
						</div>
						</section>
						<!--CONTENIDO-->

						<!--CODIGO PHP-->
						<?php
						function registrarRespuestaExamen()
						{
						include_once('../php/PhpregExamen.php');
						$obj = new Examen();
						$resultado=$obj->consultarExamenPreguntaEstudiante($_POST['cod_examen']);

							foreach ($resultado as $row) {
								$cod_pregunta = $row['cod_pregunta'];
								/*CONTADOR PARA LAS NOTAS*/
								$nro_registro = mysqli_num_rows($resultado);
								$porcentaje=100;
								$nota=$porcentaje/$nro_registro;
								/*CONTADOR PARA LAS NOTAS*/
								/*CONSULTA DE RESPUESTA SI ES CORRECTA*/
								$string=htmlspecialchars_decode($row['correcta'], ENT_QUOTES);
								$correcta=htmlspecialchars_decode($row[$string], ENT_QUOTES);
								/*CONSULTA DE RESPUESTA SI ES CORRECTA*/
								if ($_POST[$cod_pregunta]==$correcta) {
									$estado_respuesta="Correcta";
									$nota_respuesta=$nota;
								}
								else
								{
									$estado_respuesta="Incorrecta";
									$nota_respuesta=0;
								}
								/*CONSULTA DE RESPUESTA SI ES CORRECTA*/
								/*CONTADOR DE NOTA TOTAL*/
								$nota_total += $nota_respuesta;
								/*CONTADOR DE NOTA TOTAL*/
								include_once('../php/PhpregResponderPregunta.php');
								$obj = new ResponderPregunta();
								$obj->setCodEstudiante($_SESSION['cod_estudiante']);
								$obj->setCodExamen($_POST['cod_examen']);
								$obj->setCodPregunta($cod_pregunta);
								$obj->setEstadoRespuesta($estado_respuesta);
								$obj->setEstudianteRespuesta($_POST[$cod_pregunta]);
								$obj->setNotaPregunta($nota_respuesta);
								if ($obj->guardar()) {
									include_once('../php/PhpregEstudianteExamen.php');
									$obj = new EstudianteExamen();
									$obj->setCodEstudiante($_SESSION['cod_estudiante']);
									$obj->setCodExamen($_POST['cod_examen']);
									$obj->setEstado($_POST['txt_estado']);
									$obj->setNotaExamen($nota_total);
									if ($obj->modificarEstadoEstudiante()) {
										echo '<script>
											alert ("Registrado Correctamente");
											location.href ="consultaExamenEstudiante.php";
											</script>';
									}
									else
									{
										echo '<script>
											alert ("Error al Registrar");
											location.href ="consultaExamenEstudiante.php";
											</script>';
									}
								}
								else
								{
									echo '<script>
										alert ("Error Al Registrar");
										location.href ="consultaExamenEstudiante.php";
										</script>';
								}
							}
						}

						/*VALIDACION*/
						if (isset($_POST['Registrar'])) {
							registrarRespuestaExamen();

						}
						?>
						<!--CODIGO PHP-->
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->
<!--CONTENIDO-->


<!--CONTENIDO-->
<script src="../js/classie.js"></script>
<script src="../js/mlpushmenu.js"></script>
<script>
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
</script>
</body>
</html>