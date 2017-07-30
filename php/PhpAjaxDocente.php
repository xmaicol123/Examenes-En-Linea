<?php
include_once('Conection.php');

class PhpAjax extends Conexion
{
	
	public function docente($cod_carrera)
	{
	$sql = "SELECT * FROM carrera,carrera_profesor,profesor 
	WHERE cod_carrera = cod_carrera_1133 
	and cod_profesor_1133 = cod_profesor 
	and cod_carrera = '$cod_carrera'";
	return parent::ejecutar($sql);
	}

} 



//CONSULTAS

/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
$variable = new PhpAjax();
$reg=$variable->docente($_POST['cod_carrera']);
$html= "<option value='0'>Seleccionar Docente</option>";
while ($row = $reg->fetch_assoc())
{
	$html.= "<option value='".$row['cod_profesor']."'>".$row['nombre_profesor']."</option>";
	
}
echo $html;
/*-------------CONSULTA PARA CUANTAS CARRERAS TIENE UN ESTUDIANTE------------------------*/
?>