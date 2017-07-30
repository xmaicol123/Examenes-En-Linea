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
			//CONSULTA DE MATERIAS TIENE UN DOCENTE
			$(document).ready(function(){
				$("#txt_carrera").change(function () {
					//ESTO ES PARA REINICIAR EL TXT DE LA MATERIA
					$('#txt_materia').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_semestre').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_grupo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					//ESTO ES PARA REINICIAR EL TXT DEL DOCENTE
					$('#txt_examen').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

					$("#txt_carrera option:selected").each(function () {
						cod_carrera = $(this).val();
						cod_profesor = $(document.getElementById("txt_profesor")).val();
						$.post("../php/PhpAjaxMateriaDeDocente.php", { cod_carrera: cod_carrera,cod_profesor: cod_profesor }, function(data){
							$("#txt_materia").html(data);
						});            
					});
				})
			});
			//CONULTA DE SEMESTRE
			$(document).ready(function(){
				$("#txt_materia").change(function () {
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
			//CONSULTA DE GRUPOS
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
			//CONSULTA DE EXAMENES
			$(document).ready(function(){
				$("#txt_grupo").change(function () {
					$("#txt_grupo option:selected").each(function () {
						cod_grupo = $(this).val();
						cod_semestre = $(document.getElementById("txt_semestre")).val();
						cod_materia = $(document.getElementById("txt_materia")).val();
						cod_carrera = $(document.getElementById("txt_carrera")).val();
						cod_profesor = $(document.getElementById("txt_profesor")).val();
						$.post("../php/PhpAjaxExamenDeDocente.php", { cod_grupo: cod_grupo, cod_semestre: cod_semestre, cod_materia: cod_materia, cod_carrera: cod_carrera, cod_profesor: cod_profesor}, 
							function(data){
							$("#txt_examen").html(data);
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
						<?php
						if ($_GET['setCodPregunta']) {

						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regPreguntaOpcionMultiple.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Pregunta</strong></h3>
									<div class="contenedor">
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
									<input type="text" name="txt_tipo_pregunta" value="0001" hidden="">
									<input type="text" name="txt_examen" value="<?php echo $_GET['setCodExamen'] ?>" hidden="">
									<input type="text" name="txt_cod" value="<?php echo $_GET['setCodPregunta'] ?>" hidden="">
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
									<!--SELECIONANDO EXAMEN-->
									<?php 
									include_once('../php/PhpregExamen.php');
									?>
									<?php
									$obj=new Examen();
									$reg=$obj->buscar();
									?>
									<h3 class='textSelect'>Asignar A Examen</h3>     
									<select name="" class="optionBD" disabled="">
									<option value='0'>Asignar Examen</option>
									<?php
									while ($row = mysqli_fetch_object($reg))
									{?>
									<option <?php if($_GET['setCodExamen']==$row->cod_examen) echo "selected";  else ?>  value="<?php echo $row->cod_examen ?>"><?php echo $row->nombre_examen ?></option>
									<?php
									}
									echo "</select>"; 
									?>
									<!--SELECIONANDO EXAMEN-->	
									<h3 class="textSelect">Pregunta de Examen</h3>
									<input type="text" name="txt_pregunta" placeholder="Nombre Examen" class="input-100" value="<?php echo $_GET['setPregunta'] ?>">
									<h3 class="textSelect">Opcion 1</h3>
									<input type="text" name="txt_opcion1" placeholder="Descripcion" class="input-100" value="<?php echo $_GET['setOpcion1'] ?>">
									<h3 class="textSelect">Opcion 2</h3>
									<input type="text" name="txt_opcion2" placeholder="Descripcion" class="input-100" value="<?php echo $_GET['setOpcion2'] ?>">
									<h3 class="textSelect">Opcion 3</h3>
									<input type="text" name="txt_opcion3" placeholder="Descripcion" class="input-100" value="<?php echo $_GET['setOpcion3'] ?>">
									<h3 class="textSelect">Opcion 4</h3>
									<input type="text" name="txt_opcion4" placeholder="Descripcion" class="input-100" value="<?php echo $_GET['setOpcion4'] ?>">
									<h3 class="textSelect">Respuesta Correcta</h3>
									<select name="txt_correcta" class="optionBD">
										<option <?php if($_GET['setCorrecta']=="opcion1") echo "selected";  else ?> value="opcion1">Opcion 1</option>
										<option <?php if($_GET['setCorrecta']=="opcion2") echo "selected";  else ?> value="opcion2">Opcion 2</option>
										<option <?php if($_GET['setCorrecta']=="opcion3") echo "selected";  else ?> value="opcion3">Opcion 3</option>
										<option <?php if($_GET['setCorrecta']=="opcion4") echo "selected";  else ?> value="opcion4">Opcion 4</option>
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
								<form method="POST" action="regPreguntaOpcionMultiple.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Pregunta</strong></h3>
									<div class="contenedor">
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
									<input type="text" name="txt_profesor" id="txt_profesor" value="<?php echo $_SESSION['cod_profesor'] ?>" hidden>
									<input type="text" name="txt_tipo_pregunta" value="0001" hidden="">
									<!--HACIENDO TRAMPARA PARA AGARAR CODIGO DOCENTE-->
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

									<h3 class='textSelect'>Asignar A Examen</h3>
									<select name="txt_examen" id="txt_examen" class="optionBD"></select>
									<!--AJAX PARA MOSTRAR EL SEMESTRE Y LUEGO GRUPO-->	
									<h3 class="textSelect">Pregunta de Examen</h3>
									<input type="text" name="txt_pregunta" placeholder="Nombre Examen" class="input-100">
									<h3 class="textSelect">Opcion 1</h3>
									<input type="text" name="txt_opcion1" placeholder="Descripcion" class="input-100">
									<h3 class="textSelect">Opcion 2</h3>
									<input type="text" name="txt_opcion2" placeholder="Descripcion" class="input-100">
									<h3 class="textSelect">Opcion 3</h3>
									<input type="text" name="txt_opcion3" placeholder="Descripcion" class="input-100">
									<h3 class="textSelect">Opcion 4</h3>
									<input type="text" name="txt_opcion4" placeholder="Descripcion" class="input-100">
									<h3 class="textSelect">Respuesta Correcta</h3>
									<select name="txt_correcta" class="optionBD">
										<option value="opcion1">Opcion 1</option>
										<option value="opcion2">Opcion 2</option>
										<option value="opcion3">Opcion 3</option>
										<option value="opcion4">Opcion 4</option>
									</select>
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
						include_once('../php/PhpregPregunta.php');
						function guardar()
						{
							if ((isset($_POST['txt_examen']))&&(isset($_POST['txt_pregunta']))) {
								$obj = new Pregunta();
								$obj->setCodExamen($_POST['txt_examen']);
								$obj->setCodTipoPregunta($_POST['txt_tipo_pregunta']);
								$obj->setPregunta($_POST['txt_pregunta']);
								$obj->setOpcion1($_POST['txt_opcion1']);
								$obj->setOpcion2($_POST['txt_opcion2']);
								$obj->setOpcion3($_POST['txt_opcion3']);
								$obj->setOpcion4($_POST['txt_opcion4']);
								$obj->setRespuesta($_POST['txt_correcta']);
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
								$obj = new Pregunta();
								$obj->setCodPregunta($_POST['txt_cod']);
								$obj->setCodExamen($_POST['txt_examen']);
								$obj->setCodTipoPregunta($_POST['txt_tipo_pregunta']);
								$obj->setPregunta($_POST['txt_pregunta']);
								$obj->setOpcion1($_POST['txt_opcion1']);
								$obj->setOpcion2($_POST['txt_opcion2']);
								$obj->setOpcion3($_POST['txt_opcion3']);
								$obj->setOpcion4($_POST['txt_opcion4']);
								$obj->setRespuesta($_POST['txt_correcta']);
								if ($obj->modificar()) {
									echo '<script>
										alert ("Modificado Exitosamente...!!!");
										window.history.go(-1);
										</script>';
								}
								else
								{
									echo '<script>
										alert ("Error al Modificar...!!!");
										window.history.go(-1);
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

						function eliminar()
						{
							if ($_POST['txt_cod']) {
								$obj = new Pregunta();
								$obj->setCodPregunta($_POST['txt_cod']);
								if ($obj->eliminar()) {
									echo '<script>
										alert ("Eliminado Exitosamente...!!!");
										window.history.go(-1);
										</script>';
								}
								else
								{
									echo '<script>
										alert ("Error al Eliminar...!!!");
										window.history.go(-1);
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