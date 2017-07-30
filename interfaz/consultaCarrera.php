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
						<!--CONTENIDO DE LA CONSULTA DE TABLAS-->
						<section class="sectionConsulta"> 
						<h2>CARRERAS REGISTRADAS</h2>
						<table id="tableConsulta" cellspacing="0" width="100%" class="display">
							<thead>
								<tr>
									<th>Nº</th>
									<th>Sigla</th>
									<th>Carrera</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
									<?php 
									include_once('../php/PhpregCarrera.php');
									?>
									<?php
									$obj=new Carrera();
									$reg=$obj->buscar();     
									while ($row = mysqli_fetch_object($reg))
									{
									?>
									<tr>
										<td><?php echo $row->cod_carrera ?></td>
										<td><?php echo $row->sigla_carrera ?></td>
										<td><?php echo $row->nombre_carrera ?></td>
										<td>
											<div class="dropdown">
  											<button class="dropbtn">Opcion</button>
  											<div class="dropdown-content">
    											<a href="regCarrera.php?setCode=<?php echo $row->cod_carrera?>&setSigla=<?php echo $row->sigla_carrera?>&setNombre=<?php echo $row->nombre_carrera?>">Editar</a>
    											<a href="regCarreraMateria.php?setCodCarrera=<?php echo $row->cod_carrera ?>">Asignar Materia</a>
  											</div>
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