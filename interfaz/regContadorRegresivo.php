<?php 

	session_start();
	$_SESSION['cod_estudiante'];
	$_SESSION['loggedin_estudiante'] = true;
	/*GUARDANDO EN UN SESSION LA VARIABLE COD EXAMEN*/
	$_SESSION['cod_examen']=$_GET['setCodExamen'];
	/*GUARDANDO EN UN SESSION LA VARIABLE COD EXAMEN*/
	
	$decode=base64_decode($_GET['setCodExamen']);
	/*SOLUCIONADO CODIGO RELOJ*/
	/*CONEXION Y CONSULTA*/
	date_default_timezone_set('America/New_York');
	include_once('../php/PhpregExamen.php');
	$obj = new Examen();
	$resultado=$obj->consultaReloj($decode);
	while ($row=mysqli_fetch_array($resultado)) {
		$duration=$row['duracion'];
	}
	/*CODIGO1*/
	$_SESSION["duration"]=$duration;
	$_SESSION["start_time"]=date("Y-m-d H:i:s");
	$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));
	$_SESSION["end_time"]=$end_time;
	/*CODIGO1*/
	/*SOLUCIONADO CODIGO RELOJ*/

?>
<script type="text/javascript">
	window.location="regResponderPregunta.php";
</script>