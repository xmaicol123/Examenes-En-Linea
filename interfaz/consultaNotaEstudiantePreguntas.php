<?php
	session_start();
	$_SESSION['cod_estudiante'];
	$_SESSION['nick_estudiante'];
	$_SESSION['nombre_estudiante'];
	$_SESSION['loggedin_estudiante'] = true;

	if (isset($_SESSION['cod_estudiante']) && $_SESSION['loggedin_estudiante'] == true) 
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
        order: [ 0, 'asc' ],
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
							<li><a class="icon icon-pen" href="consultaExamenEstudiante.php">Examenes</a></li>
							<li><a class="icon icon-pen" href="consultaNotaEstudiante.php">Mis Notas</a></li>
						</ul>	
					</div>
				</nav>
				<!-- /mp-menu -->

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
						<!--CONTENIDO DE LA CONSULTA DE TABLAS-->
						<section class="sectionConsulta">
						<form method="POST" action="detalleAlumnoExamen.php"> 
						<h2>DETALLE DE RESPUESTA DE ALUMNO</h2>
						<table id="tableConsulta" cellspacing="0" width="100%" class="display">
							<thead>
								<tr>
									<th>Examen</th>
									<th>Pregunta</th>
									<th>Estado Respuesta</th>
									<th>Estudiante Respuesta</th>
									<th>Correcta</th>
									<th>Nota</th>
								</tr>
							</thead>
							<tbody>
									<?php 
									include_once('../php/PhpregExamen.php');
									?>
									<?php
									$obj=new Examen();
									$examen=base64_decode($_GET['setCodExamen']);
									$estudiante=$_SESSION['cod_estudiante'];
									$reg=$obj->detalleRespuestaEstudiante($examen,$estudiante);     
									while ($row = mysqli_fetch_array($reg))
									{
									?>
									<tr>
										<td><?php echo $row['nombre_examen'] ?></td>
										<td><?php echo $row['pregunta'] ?></td>
										<td><?php echo $row['estado'] ?></td>
										<td><?php echo $row['estudiante_respuesta'] ?></td>
										<td><?php 
										$string=htmlspecialchars_decode($row['correcta'], ENT_QUOTES);
										$mostrar=htmlspecialchars_decode($row[$string], ENT_QUOTES);
										echo $mostrar;
										?></td>
										<td><?php echo $row['nota_pregunta'] ?></td>
									</tr>
									<?php
									}
									?>
							</tbody>
							<h3>Tu Nota  
							<?php
							include_once('../php/PhpregExamen.php');
							$obj=new Examen();
							$examen=base64_decode($_GET['setCodExamen']);
							$estudiante=$_SESSION['cod_estudiante'];
							$reg=$obj->sumaRespuestaEstudiante($examen,$estudiante);
							$row=mysqli_fetch_assoc($reg);
							echo $row['nombre_estudiante'];
							echo " es: ";
							echo $row['nota_examen'];
							?></h3>
						</table>
						</form> 
						</section>
						<?php

						include_once('../php/PhpregEstudianteExamen.php');
						function eliminar()
						{
							foreach ($_POST['cod_estudiante'] as $cod_estudiante) {
								$obj = new EstudianteExamen();
								$obj->setCodEstudiante($cod_estudiante);
								$obj->setCodExamen($_POST['txt_cod_examen']);
								if ($obj->eliminarDeExamen()) {
										echo '<script>
											alert ("Eliminado Exitosamente");
											window.history.go(-1);
											</script>';
								}
								else
								{
									echo '<script>
										alert ("Error Al Eliminar");
										window.history.go(-1);
										</script>';
								}
							}
						} 
						?>
						<!--CONTENIDO DE LA CONSULTA DE TABLAS-->
						<?php 
						if (isset($_POST['Eliminar'])) {
							eliminar();
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