<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{
	
	public function consulta($cod_profesor,$cod_carrera)
	{
		$sql="SELECT DISTINCT cod_materia,nombre_materia FROM carrera,materia,carrera_materia,grupo,profesor WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_profesor = '$cod_profesor' and cod_carrera='$cod_carrera' ";
		return parent::ejecutar($sql);
	}

} 



//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$variable1 = $_POST['cod_profesor'];
$variable2 = $_POST['cod_carrera'];
$reg=$variable->consulta($variable1,$variable2);
$html= "<option value='0'>Seleccionar Materia</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_materia']."'>".$row['nombre_materia']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/

?>