<?php
include_once('Conection.php');
class TipoExamen extends Conexion
{
	//atributos
	private $nombre_examen;

	//construtor
	public function TipoExamen()
	{   parent::conexion();
		$this->nombre_examen="";	
	}
	//propiedades de acceso
	//NOMBRE DEL EXAMEN
	public function setNombre($valor)
	{
		$this->nombre_examen=$valor;
	}
	public function getNombre()
	{
		return $this->nombre_examen;
	}
	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO tipo_examen (nombre_tipo_examen) VALUES('$this->nombre_examen')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function buscar()
	{
		$sql="SELECT * FROM tipo_examen";
		return parent::ejecutar($sql);
	}
    
}    
?>