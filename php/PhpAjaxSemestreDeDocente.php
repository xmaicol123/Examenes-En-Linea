<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{
	
	public function consulta($cod_materia,$cod_carrera,$cod_profesor)
	{
		$sql="SELECT DISTINCT cod_carrera_materia,semestre FROM carrera,materia,carrera_materia,grupo,profesor WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_materia = '$cod_materia' and cod_carrera='$cod_carrera' and cod_profesor='$cod_profesor'";
		return parent::ejecutar($sql);
	}

} 



//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$variable1=$_POST['cod_materia'];
$variable2=$_POST['cod_carrera'];
$variable3=$_POST['cod_profesor'];
$reg=$variable->consulta($variable1,$variable2,$variable3);
$html= "<option value='0'>Seleccionar Semestre</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_carrera_materia']."'>".$row['semestre']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/

?>