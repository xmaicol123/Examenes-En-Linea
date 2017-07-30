<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{
	
	public function carrera($cod_estudiante)
	{
	$sql = "SELECT * FROM carrera,estudiante WHERE cod_carrera = cod_carrera_4 and cod_estudiante = '$cod_estudiante' ";
	return parent::ejecutar($sql);
	}

} 



//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$reg=$variable->carrera($_POST['cod_estudiante']);
$html= "<option value='0'>Seleccionar Carrera</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_carrera']."'>".$row['nombre_carrera']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
?>