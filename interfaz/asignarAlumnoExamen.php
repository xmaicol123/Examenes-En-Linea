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
<!--ESTO ES PARA LA CONSULTA DE TABLAS-->
<script type="text/javascript" src="../js/js_tablas/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/js_tablas/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/js_tablas/dataTables.responsive.js"></script>
<link rel="stylesheet" type="text/css" href="../css/css_tablas/jquery.dataTables.css">
<!--BOTON DE IMPRESION-->
<script type="text/javascript" src="../js/js_reporte/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/js_reporte/jszip.min.js"></script>
<script type="text/javascript" src="../js/js_reporte/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/js_reporte/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/js_reporte/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/js_reporte/buttons.print.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/css_reporte/buttons.dataTables.min.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#tableConsulta').DataTable( {
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            //targets:   0
        } ],
        order: [ 1, 'asc' ],
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', //'print', 'copy', 'csv'
        ]
    } );
} );
</script>
<!--ESTO ES PARA LA CONSULTA DE TABLAS-->
<!--ESTO ES PARA EL BUTTON DROPBOW-->
<link rel="stylesheet" type="text/css" href="../css/buttonDrop.css">
<!--ESTO ES PARA EL BUTTON DROPBOW--> 
</script>
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
						<!--CONTENIDO DE LA CONSULTA DE TABLAS-->
						<section class="sectionConsulta">
						<form method="POST" action="asignarAlumnoExamen.php"> 
						<h2>ASIGNAR ALUMNOS</h2>
						<table id="tableConsulta" cellspacing="0" width="100%" class="display">
							<thead>
								<tr>
									<th>Asignar</th>
									<th>Nº</th>
									<th>Nombre Estudiante</th>
									<th>Examen</th>
									<th>Celular</th>
									<th>Direccion</th>
								</tr>
							</thead>
							<tbody>
									<?php 
									include_once('../php/PhpregExamen.php');
									?>
									<?php
									$obj=new Examen();
									$grupo=base64_decode($_GET['setCodGrupo']);
									$examen=base64_decode($_GET['setCodExamen']);
									$reg=$obj->asignarEstudianteExamen($grupo,$examen);     
									while ($row = mysqli_fetch_object($reg))
									{
									?>
									<tr>
										<td><input type="checkbox" name="cod_estudiante[]" value="<?php echo $row->cod_estudiante ?>"></td>
										<input type="text" name="txt_asignado" value="Asignado" hidden="">
										<input type="text" name="txt_estado" value="Sin Contestar" hidden="">
										<input type="text" name="txt_cod_examen" value="<?php echo $examen ?>" hidden="">
										<input type="text" name="txt_nota" value="0" hidden="">
										<td><?php echo $row->cod_estudiante ?></td>
										<td><?php echo $row->nombre_estudiante ?></td>
										<td><?php echo $row->nombre_examen ?></td>
										<td><?php echo $row->celular ?></td>
										<td><?php echo $row->direccion ?></td>
									</tr>
									<?php
									}
									?>
							</tbody>
							<input type="submit" name="Registrar" value="Registrar">
						</table>
						</form> 
						</section>
						<!--CONTENIDO DE LA CONSULTA DE TABLAS-->
						<?php
						include_once('../php/PhpregEstudianteExamen.php'); 
						function asignarExamenEstudiante()
						{
							foreach ($_POST['cod_estudiante'] as $cod_estudiante) {
								$obj = new EstudianteExamen();
								$obj->setCodEstudiante($cod_estudiante);
								$obj->setCodExamen($_POST['txt_cod_examen']);
								$obj->setAsignado($_POST['txt_asignado']);
								$obj->setEstado($_POST['txt_estado']);
								$obj->setNotaExamen($_POST['txt_nota']);
								if ($obj->guardar()) {
										echo '<script>
											alert ("Registrado Exitosamente");
											window.history.go(-1);
											</script>';
								}
								else
								{
									echo '<script>
										alert ("Registrado Exitosamente");
										window.history.go(-1);
										</script>';
								}
							}
						}

						//isset de un botton
						if (isset($_POST['Registrar'])) {
							asignarExamenEstudiante();
						}

						?>
						<!--CONTENIDO-->
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="" id="trigger" class="menu-trigger"></a></p>
							</div>
						</div>
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