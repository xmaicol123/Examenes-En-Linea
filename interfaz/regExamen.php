<?php
	session_start();
	$_SESSION['nick_profesor'];
	$_SESSION['cod_profesor'];
	$_SESSION['nombre_profesor'];
	$_SESSION['loggedin_profesor'] = true;

	if (isset($_SESSION['cod_profesor']) && $_SESSION['loggedin_profesor'] == true) 
	{

	} 
	else 
	{
   	echo "Esta pagina es solo para usuarios registrados.<br>";
   	echo "<br><a href='../index.php'>Login</a>";
	exit;
	}
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
<!--SCRIPT PARA EL SELECTOR INDEPENDIENTE-->
<script src="../js/jquery-3.1.1.min.js"></script>
<script language="javascript">
			//para pedir las CARRERAS
			$(document).ready(function(){
				$("#txt_carrera").change(function () {
					//ESTO ES PARA REINICIAR EL TXT DE LA MATERIA
					$('#txt_materia').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_semestre').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_grupo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

					$("#txt_carrera option:selected").each(function () {
						cod_carrera = $(this).val();
						cod_profesor = $(document.getElementById("txt_profesor")).val();
						$.post("../php/PhpAjaxMateriaDeDocente.php", { cod_carrera: cod_carrera,cod_profesor: cod_profesor }, function(data){
							$("#txt_materia").html(data);
						});            
					});
				})
			});
			//OBTENIENDO EL VALUE DE DOS VALORES CARRERA Y MATERIA A LA VEZ AJAX SOLUCIONADO
			$(document).ready(function(){
				$("#txt_materia").change(function () {
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_semestre').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_grupo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$("#txt_materia option:selected").each(function () {
						cod_materia = $(this).val();
						cod_carrera = $(document.getElementById("txt_carrera")).val();
						cod_profesor = $(document.getElementById("txt_profesor")).val();
						$.post("../php/PhpAjaxSemestreDeDocente.php", { cod_materia: cod_materia, cod_carrera: cod_carrera, cod_profesor: cod_profesor }, function(data){
							$("#txt_semestre").html(data);
						});            
					});
				})
			});
			//OBTENIENDO EL VALUE DE TXT SEMESTRE PARA CONSULTAR LOS GRUPOS
			$(document).ready(function(){
				$("#txt_semestre").change(function () {
					$("#txt_semestre option:selected").each(function () {
						cod_semestre = $(this).val();
						cod_carrera = $(document.getElementById("txt_carrera")).val();
						cod_materia = $(document.getElementById("txt_materia")).val();
						cod_profesor = $(document.getElementById("txt_profesor")).val();
						$.post("../php/PhpAjaxGrupoDeDocente.php", { cod_semestre: cod_semestre, cod_carrera: cod_carrera, cod_materia: cod_materia, cod_profesor: cod_profesor}, 
							function(data){
							$("#txt_grupo").html(data);
						});            
					});
				})
			});
</script>
<!--SCRIPT PARA EL SELECTOR INDEPENDIENTE-->
</head>
<body>
		<div class="containerMenu">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2 class="icon icon-data">Administrador</h2>
						<ul>
							<!--EXAMENES-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-study" href="#">Examenes</a>
								<div class="mp-level">
									<h2 >Examenes</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regExamen.php">Registrar Examenes</a>
										</li>
										<li>
											<a href="consultaExamenDocente.php">Consultar Examenes</a>
										</li>
									</ul>
								</div>
							</li>
							<!--PREGUNTAS-->
							<li><a class="icon icon-pen" href="regPregunta.php">Preguntas</a></li>
							<!--reporte-->
							<li><a class="icon icon-note" href="reporteDocente.php">Reportes</a></li>	
						</ul>	
					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<a class="codrops-icon codrops-icon-prev" href=""><span>BIENVENID@ <?php echo $_SESSION['nombre_profesor']; ?></span></a>
							<span class="right"><a class="codrops-icon codrops-icon-drop" href="LogoutProfesor.php"><span>SALIR</span></a></span>
						</div>
						<header class="codrops-header">
							<h1>Sistema De Examenes En Linea<span>Universidad Autonoma Gabriel Rene Moreno</span></h1>
						</header>
						<!--CONTENIDO-->
						<!--CONTENIDO-->
						<?php
						if ($_GET['setCodExamen']) {

						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regExamen.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Examen</strong></h3>
									<div class="contenedor">
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
									<input type="text" name="txt_profesor" id="txt_profesor" value="<?php echo $_SESSION['cod_profesor'] ?>" hidden>
									<input type="text" name="txt_cod" value="<?php echo $_GET['setCodExamen'] ?>" hidden>
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
									<!--CODIGO PHP PARA MOSTRAR MATERIA DE UN DOCENTE-->
									<?php 
									include_once('../php/PhpregExamen.php');
									?>
									<?php
									$obj=new Examen();
									$cod_carrera = $_GET['setCodCarrera'];
									$cod_materia = $_GET['setCodMateria'];
									$cod_semestre = $_GET['setCodSemestre'];
									$cod_profesor = $_SESSION['cod_profesor'];
									$reg=$obj->consultaGrupoModificar($cod_carrera,$cod_materia,$cod_semestre,$cod_profesor);
									?>
									<h3 class='textSelect'>Asignar Grupo</h3>     
									<select name='txt_grupo' class='optionBD'/>
									<option value='0'>Seleccionar Grupo</option>
									<?php
									while ($row = mysqli_fetch_object($reg))
									{?>
									<option <?php if($_GET['setCodGrupo']==$row->cod_grupo) echo "selected";  else ?>  value="<?php echo $row->cod_grupo ?>"><?php echo $row->nombre_grupo ?></option>
									<?php
									}
									echo "</select>"; 
									?>
									<!--AJAX PARA MOSTRAR EL SEMESTRE Y LUEGO GRUPO-->	
									<!--CODIGO PHP PARA TIPO EXAMEN-->
									<?php
									include_once('../php/PhpregTipoExamen.php');
									$obj = new TipoExamen();
									$resultado=$obj->buscar();
									echo "<h3 class='textSelect'>Asignar Tipo De Examen</h3>";
									echo "<select name='txt_tipo_examen' class='optionBD'>";
									while ($row=mysqli_fetch_object($resultado)) 
									{?>
										<option <?php if($_GET['setTipoExamen']==$row->cod_tipo_examen) echo "selected";  else ?> value="<?php echo $row->cod_tipo_examen ?>"><?php echo $row->nombre_tipo_examen ?></option>
									<?php	
									}
									echo "</select>";
									?>
									<!--CODIGO PHP PARA TIPO EXAMEN-->
									<h3 class="textSelect">Nombre De Examen</h3>
									<input type="text" name="txt_nombre" placeholder="Nombre Examen" class="input-100" value="<?php echo $_GET['setNombre'] ?>">
									<h3 class="textSelect">Descripcion De Examen</h3>
									<input type="text" name="txt_descripcion" placeholder="Descripcion" class="input-100" value="<?php echo $_GET['setDescripcion'] ?>">
									<h3 class="textSelect">Duracion De Examen (Minutos)</h3>
									<input type="text" name="txt_duracion" placeholder="Duracion En Minutos" class="input-100" value="<?php echo $_GET['setDuracion'] ?>">
									<h3 class="textSelect">Fecha Inicio</h3>
									<input type="date" name="txt_inicio" class="input-100" value="<?php echo $_GET['setFechaInicio'] ?>">
									<h3 class="textSelect">Fecha Final</h3>
									<input type="date" name="txt_final" class="input-100" value="<?php echo $_GET['setFechaFinal'] ?>">
									<select name="txt_estado_examen" class="optionBD">
										<option <?php if($_GET['setEstado']=="Enviado") echo "selected" ?> value="Enviado">Enviado</option>
										<option <?php if($_GET['setEstado']=="Sin Enviar") echo "selected" ?> value="Sin Enviar">Sin Enviar</option>
										<option <?php if($_GET['setEstado']=="Terminado") echo "selected" ?> value="Terminado">Terminado</option>
									</select>
									<input type="submit" name="Nuevo" value="Nuevo" class="btn">
									<input type="submit" name="Modificar" value="Modificar" class="btn"> 
									<input type="submit" name="Eliminar" value="Eliminar" class="btn">
									</div>
								</form>
							</div>
						</section>
						<?php
						}
						else
						{
						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regExamen.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Examen</strong></h3>
									<div class="contenedor">
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
									<input type="text" name="txt_profesor" id="txt_profesor" value="<?php echo $_SESSION['cod_profesor'] ?>" hidden>
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
									<!--HACIENDO TRAMPA PARA AGREGAR EL ESTADO DE EXAMEN-->
									<input type="text" name="txt_estado_examen" value="Sin Enviar" hidden>
									<input type="text" name="txt_estado_estudiante" value="Sin Contestar" hidden>
									<!--HACIENDO TRAMPA PARA AGREGAR EL ESTADO DE EXAMEN-->
									<!--CODIGO PHP PARA MOSTRAR MATERIA DE UN DOCENTE-->
									<?php
									include_once('../php/PhpregCarrera.php');
									$obj = new Carrera();
									$resultado=$obj->carreraDocente($_SESSION['cod_profesor']);
									echo "<h3 class='textSelect'>Seleccionar Carrera</h3>";
									echo "<select name='txt_carrera' id='txt_carrera' class='optionBD'>";
									echo "<option>Seleccionar Carrera</option>";
									while ($row=mysqli_fetch_assoc($resultado)) 
									{?>
										<option value="<?php echo $row['cod_carrera'] ?>"><?php echo $row['nombre_carrera'] ?></option>
									<?php 	
									}
									echo "</select>"; 
									?>
									<!--CODIGO PHP PARA MOSTRAR MATERIA DE UN DOCENTE-->
									<!--AJAX PARA MOSTRAR EL SEMESTRE Y LUEGO GRUPO-->
									<h3 class='textSelect'>Seleccionar Materia</h3>
									<select name="txt_materia" id="txt_materia" class="optionBD"></select>

									<h3 class='textSelect'>Seleccionar Semestre</h3>
									<select name="txt_semestre" id="txt_semestre" class="optionBD"></select>

									<h3 class='textSelect'>Seleccionar Grupo</h3>
									<select name="txt_grupo" id="txt_grupo" class="optionBD"></select>
									<!--AJAX PARA MOSTRAR EL SEMESTRE Y LUEGO GRUPO-->	
									<!--CODIGO PHP PARA TIPO EXAMEN-->
									<?php
									include_once('../php/PhpregTipoExamen.php');
									$obj = new TipoExamen();
									$resultado=$obj->buscar();
									echo "<h3 class='textSelect'>Asignar Tipo De Examen</h3>";
									echo "<select name='txt_tipo_examen' class='optionBD'>";
									while ($row=mysqli_fetch_assoc($resultado)) 
									{?>
										<option value="<?php echo $row['cod_tipo_examen'] ?>"><?php echo $row['nombre_tipo_examen'] ?></option>
									<?php	
									}
									echo "</select>";
									?>
									<!--CODIGO PHP PARA TIPO EXAMEN-->
									<h3 class="textSelect">Nombre De Examen</h3>
									<input type="text" name="txt_nombre" placeholder="Nombre Examen" class="input-100">
									<h3 class="textSelect">Descripcion De Examen</h3>
									<input type="text" name="txt_descripcion" placeholder="Descripcion" class="input-100">
									<h3 class="textSelect">Duracion De Examen (Minutos)</h3>
									<input type="text" name="txt_duracion" placeholder="Duracion En Minutos" class="input-100">
									<h3 class="textSelect">Fecha Inicio</h3>
									<input type="date" name="txt_inicio" class="input-100">
									<h3 class="textSelect">Fecha Final</h3>
									<input type="date" name="txt_final" class="input-100">
									<input type="submit" name="Nuevo" value="Nuevo" class="btn">
									<input type="submit" name="Registrar" value="Registrar" class="btn"> 
									</div>
								</form>
							</div>
						</section>
						<?php
						}
						?>
						<!--CONTENIDO-->
						<!--CODIGO PHP-->
						<?php
						include_once('../php/PhpregExamen.php');
						function guardar()
						{
							if ((isset($_POST['txt_grupo']))) {
								$obj = new Examen();
								$obj->setCodGrupo($_POST['txt_grupo']);
								$obj->setCodTipoExamen($_POST['txt_tipo_examen']);
								$obj->setNombre($_POST['txt_nombre']);
								$obj->setDescripcion($_POST['txt_descripcion']);
								$obj->setDuracion($_POST['txt_duracion']);
								$obj->setFechaInicio($_POST['txt_inicio']);
								$obj->setFechaFinal($_POST['txt_final']);
								$obj->setEstadoExamen($_POST['txt_estado_examen']);
								if ($obj->guardar()) {
										echo '<script>
												alert ("Registrado Exitosamente...!");
												</script>';
								}
								else
								{
										echo '<script>
												alert ("Error al Registrar...!!!");
												</script>';
								}

							}
							else
							{
								echo '<script>
									alert ("Datos Vacios...!!!");
									</script>';
							}
						}

						function modificar()
						{
							if ($_POST['txt_cod']) {
								$obj = new Examen();
								$obj->setCodExamen($_POST['txt_cod']);
								$obj->setCodGrupo($_POST['txt_grupo']);
								$obj->setCodTipoExamen($_POST['txt_tipo_examen']);
								$obj->setNombre($_POST['txt_nombre']);
								$obj->setDescripcion($_POST['txt_descripcion']);
								$obj->setDuracion($_POST['txt_duracion']);
								$obj->setFechaInicio($_POST['txt_inicio']);
								$obj->setFechaFinal($_POST['txt_final']);
								$obj->setEstadoExamen($_POST['txt_estado_examen']);
								if ($obj->modificar()) {
									echo '<script>
										alert ("Modificado Exitosamente...!");
										location.href ="consultaExamenDocente.php";
										</script>';
								}
								else
								{
									echo '<script>
										alert ("Error Al Eliminar...!");
										location.href ="consultaExamenDocente.php";
										</script>';
								}
							}
							else
							{
								echo '<script>
									alert ("Datos Vacios...!");
									location.href ="consultaExamenDocente.php";
									</script>';
							}
						}

						function eliminar()
						{
							if ($_POST['txt_cod']) {
								$obj = new Examen();
								$obj->setCodExamen($_POST['txt_cod']);
								if ($obj->eliminar()) {
									echo '<script>
										alert ("Eliminado Exitosamente...!");
										</script>';
								}
								else
								{
									echo '<script>
										alert ("Error Al Modificar...!");
										</script>';
								}
							}
							else
							{
								echo '<script>
									alert ("Datos Vacios...!");
									</script>';
							}
						}
						/*COMANDO PARA GUARDAR*/
						if (isset($_POST['Registrar'])) {
						 	guardar();
						}
						else if (isset($_POST['Nuevo'])) {
							# code...
						} 
						else if (isset($_POST['Modificar'])) {
							modificar();
						}
						else if (isset($_POST['Eliminar'])) {
							eliminar();
						}
						/*COMANDO PARA GUARDAR*/
						?>
						<!--CODIGO PHP-->
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="" id="trigger" class="menu-trigger"></a></p>
							</div>
						</div>
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