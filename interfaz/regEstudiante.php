<?php
	session_start();
	$_SESSION['nick_admin'];
	$_SESSION['cod_admin'];
	$_SESSION['loggedin_admin'] = true;

	if (isset($_SESSION['cod_admin']) && $_SESSION['loggedin_admin'] == true) 
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
							<!--CARRERAS-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-study" href="#">Carreras</a>
								<div class="mp-level">
									<h2 >Carreras</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regCarrera.php">Registrar Carrera</a>
										</li>
										<li>
											<a href="consultaCarrera.php">Consultar Carreras</a>
										</li>
										<li>
											<a href="regCarreraMateria.php">Asignar Carrera-Materia</a>
										</li>
										<li>
											<a href="consultaCarreraMateria.php">Consultar Por Semestre</a>
										</li>
									</ul>
								</div>
							</li>
							<!--MATERIAS-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-note" href="#">Materias</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Materias</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regMateria.php">Registrar Materia</a>
										</li>
										<li>
											<a href="consultaMateria.php">Consultar Materias</a>
										</li>
										<li>
											<a href="regGrupo.php">Registrar Grupo</a>
										</li>
										<li>
											<a href="consultaGrupo.php">Consultar Grupos</a>
										</li>
									</ul>
								</div>
							</li>
							<!--DOCENTES-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-user" href="#">Docentes</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Docentes</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regDocente.php">Registrar Docentes</a>
										</li>
										<li>
											<a href="consultaDocente.php">Consultar Docentes</a>
										</li>
									</ul>
								</div>
							</li>
							<!--ESTUDIANTES-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-user" href="#">Estudiantes</a>
								<div class="mp-level">
									<h2 class="icon icon-display">Estudiantes</h2>
									<a class="mp-back" href="#">Atras</a>
									<ul>
										<li>
											<a href="regEstudiante.php">Registrar Estudiante</a>
										</li>
										<li>
											<a href="consultaEstudiante.php">Consultar Estudiantes</a>
										</li>
										<li>
											<a href="regEstudianteGrupo.php">Asignar Grupo</a>
										</li>
										<li>
											<a href="consultaEstudianteGrupo.php">Consultar Por Grupos</a>
										</li>
									</ul>
								</div>
							</li>

							<li><a class="icon icon-pen" href="regTipoExamen.php">Tipo de Examen</a></li>
						</ul>	
					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<a class="codrops-icon codrops-icon-prev" href=""><span>BIENVENID@ <?php echo $_SESSION['nick_admin']; ?></span></a>
							<span class="right"><a class="codrops-icon codrops-icon-drop" href="LogoutAdmin.php"><span>SALIR</span></a></span>
						</div>
						<header class="codrops-header">
							<h1>Sistema De Examenes En Linea<span>Universidad Autonoma Gabriel Rene Moreno</span></h1>
						</header>
						<!--CONTENIDO-->
						<?php
						if ($_GET['setCodEstudiante']) {

						?>
						<section>
							<div class="centrado">
								<form method="POST" action="regEstudiante.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Estudiante</strong></h3>
									<div class="contenedor">
										<input type="text" name="txt_cod" value="<?php echo $_GET['setCodEstudiante'] ?>" hidden>
										<input type="text" name="txt_nombre" class="input-100" placeholder="Nombre" value="<?php echo $_GET['setNombre'] ?>">
										<input type="text" name="txt_nick" class="input-100" placeholder="Usuario Nick" value="<?php echo $_GET['setNick'] ?>">
										<input type="password" name="txt_password" class="input-100" placeholder="Password" value="<?php echo $_GET['setPassword'] ?>">
										<input type="email" name="txt_email" class="input-100" placeholder="Email" value="<?php echo $_GET['setEmail'] ?>">
										<input type="text" name="txt_celular" class="input-100" placeholder="Celular" value="<?php echo $_GET['setCelular'] ?>">
										<input type="date" name="txt_fecha" class="input-100" placeholder="Fecha De Nacimiento" value="<?php echo $_GET['setFecha'] ?>">
										<input type="text" name="txt_direccion" class="input-100" placeholder="Direccion" value="<?php echo $_GET['setDireccion'] ?>">
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
								<form method="POST" action="regEstudiante.php" class="formCarrera">
									<h3 class="titulo"><strong>Registrar Estudiante</strong></h3>
									<div class="contenedor">
										<input type="text" name="txt_nombre" class="input-100" placeholder="Nombre">
										<input type="text" name="txt_nick" class="input-100" placeholder="Usuario Nick">
										<input type="password" name="txt_password" class="input-100" placeholder="Password">
										<input type="email" name="txt_email" class="input-100" placeholder="Email">
										<input type="text" name="txt_celular" class="input-100" placeholder="Celular">
										<input type="date" name="txt_fecha" class="input-100" placeholder="Fecha De Nacimiento">
										<input type="text" name="txt_direccion" class="input-100" placeholder="Direccion">
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
							//incluendo la clase carrera para obtener constructores y metodos
							include_once('../php/PhpregEstudiante.php');
							//FUNCION GUARDAR
								function guardar()
								{
									if($_POST['txt_nombre'])
									{
										/*ENCRIPTADO DE PASSWORD MD5*/
										$encriptado=md5($_POST['txt_password']);
										/*ENCRIPTADO DE PASSWORD MD5*/
										$obj= new Estudiante();
										$obj->setNick($_POST['txt_nick']);
										$obj->setPassword($encriptado);
										$obj->setNombre($_POST['txt_nombre']);
										$obj->setEmail($_POST['txt_email']);
										$obj->setCelular($_POST['txt_celular']);
										$obj->setFecha($_POST['txt_fecha']);
										$obj->setDireccion($_POST['txt_direccion']);
										if ($obj->guardar())
											echo '<script>
													alert ("Registrado Exitosamente");
													</script>';
										else
											echo '<script>
													alert ("Error Al Registrar");
													</script>';
									}
									else
											echo '<script>
													alert ("Por Favor Introdusca Datos");
													</script>';
								}

								function modificar()
								{
									if (isset($_POST['txt_cod'])) {
										/*ENCRIPTADO DE PASSWORD MD5*/
										$encriptado=md5($_POST['txt_password']);
										/*ENCRIPTADO DE PASSWORD MD5*/
										$obj = new Estudiante();
										$obj->setCodEstudiante($_POST['txt_cod']);
										$obj->setNick($_POST['txt_nick']);
										$obj->setPassword($encriptado);
										$obj->setNombre($_POST['txt_nombre']);
										$obj->setEmail($_POST['txt_email']);
										$obj->setCelular($_POST['txt_celular']);
										$obj->setFecha($_POST['txt_fecha']);
										$obj->setDireccion($_POST['txt_direccion']);
										if ($obj->modificar()) {
											echo '<script>
													alert ("Modificado Exitosamente");
													</script>';
										}
										else
										{
											echo '<script>
													alert ("Error Al Eliminar");
													</script>';
										}

									}
									else
									{
										echo '<script>
												alert ("Datos Vacios");
												</script>';
									}
								}

								function eliminar()
								{
									if ($_POST['txt_cod']) {
										$obj = new Estudiante();
										$obj->setCodEstudiante($_POST['txt_cod']);
										if ($obj->eliminar()) {
											echo '<script>
												alert ("Eliminado Exitosamente");
												</script>';
										}
										else
										{
											echo '<script>
												alert ("Error Al Eliminar");
												</script>';
										}
									}
									else
									{
										echo '<script>
												alert ("Datos Vacios");
												</script>';
									}
								}
							//FUNCION PARA LOS BOTONES
							if (isset($_POST['Registrar'])) {
								guardar();
							}
							else if (isset($_POST['Nuevo'])) {
								
							}
							else if (isset($_POST['Modificar'])) {
								modificar();
							}
							else if (isset($_POST['Eliminar'])) {
								eliminar();
							}
						?>
						<!--CODIGO PHP-->
						<!--MENU DESPEGABLE-->
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="" id="trigger" class="menu-trigger"></a></p>
							</div>
						</div>
						<!--MENU DESPEGABLE-->
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->

<script src="../js/classie.js"></script>
<script src="../js/mlpushmenu.js"></script>
<script>
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
</script>
</body>
</html>