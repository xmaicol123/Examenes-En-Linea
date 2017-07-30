<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{
	
	public function consulta($cod_grupo,$cod_semestre,$cod_materia,$cod_carrera,$cod_profesor)
	{
		$sql="SELECT DISTINCT cod_examen,nombre_examen FROM carrera,materia,carrera_materia,grupo,profesor,examen WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_grupo = cod_grupo_225 and cod_grupo = '$cod_grupo' and cod_carrera_materia = '$cod_semestre' and cod_materia = '$cod_materia' and cod_carrera = '$cod_carrera' and cod_profesor = '$cod_profesor'";
		return parent::ejecutar($sql);
	}

} 



//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$variable1=$_POST['cod_grupo'];
$variable2=$_POST['cod_semestre'];
$variable3=$_POST['cod_materia'];
$variable4=$_POST['cod_carrera'];
$variable5=$_POST['cod_profesor'];
$reg=$variable->consulta($variable1,$variable2,$variable3,$variable4,$variable5);
$html= "<option value='0'>Asignar Examen</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_examen']."'>".$row['nombre_examen']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/

?>