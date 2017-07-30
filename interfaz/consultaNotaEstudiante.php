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
						<h2>RESULTADO DE EXAMENES</h2>
						<table id="tableConsulta" cellspacing="0" width="100%" class="display">
							<thead>
								<tr>
									<th>Nº</th>
									<th>Materia</th>
									<th>Semestre</th>
									<th>Grupo</th>
									<th>Profesor</th>
									<th>Tipo De Examen</th>
									<th>Nombre De Examen</th>
									<th>Estado</th>
									<th>Opcion</th>
								</tr>
							</thead>
							<tbody>
									<?php 
									include_once('../php/PhpregExamen.php');
									?>
									<?php
									$obj=new Examen();
									$reg=$obj->consultaExamenEstudianteContestada($_SESSION['cod_estudiante']);     
									while ($row = mysqli_fetch_object($reg))
									{
									?>
									<tr>
										<td><?php echo $row->cod_examen ?></td>
										<td><?php echo $row->nombre_materia ?></td>
										<td><?php echo $row->semestre ?></td>
										<td><?php echo $row->nombre_grupo ?></td>
										<td><?php echo $row->nombre_profesor ?></td>
										<td><?php echo $row->nombre_tipo_examen ?></td>
										<td><?php echo $row->nombre_examen ?></td>
										<td><?php echo $row->estado ?></td>
										<td>
											<div class="dropdown">
  											<a class="dropbtn" href="consultaNotaEstudiantePreguntas.php?setCodExamen=<?php echo base64_encode($row->cod_examen) ?>">Nota</a>
											</div> 
										</td>
									</tr>
									<?php
									}
									?>
							</tbody>
						</table>
						</section>
						<!--CONTENIDO DE LA CONSULTA DE TABLAS-->
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
<!--CONTENIDO-->


<!--CONTENIDO-->
<script src="../js/classie.js"></script>
<script src="../js/mlpushmenu.js"></script>
<script>
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
</script>
</body>
</html>