<?php
include_once('Conection.php');
class EstudianteExamen extends Conexion
{
	//declarando atributos
	private $cod_estudiante;
	private $cod_examen;
	private $asignado;
	private $estado;
	private $nota_examen;

	//metodo
	public function EstudianteExamen()
	{
		parent::conexion();
		$this->cod_estudiante=0;
		$this->cod_examen=0;
		$this->asignado="";
		$this->estado="";
		$this->nota_examen=0;
	}

	//GET Y SETS
	public function setCodEstudiante($valor)
	{
		$this->cod_estudiante=$valor;
	}

	public function getCodEstudiante()
	{
		return $this->cod_estudiante;
	}
	//GET Y SETS
	public function setCodExamen($valor)
	{
		$this->cod_examen=$valor;
	}

	public function getCodExamen()
	{
		return $this->cod_examen;
	}
	//GET Y SETS
	public function setAsignado($valor)
	{
		$this->asignado=$valor;
	}

	public function getAsignado()
	{
		return $this->asignado;
	}
	//GET Y SETS
	public function setEstado($valor)
	{
		$this->estado=$valor;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	/*NUEVO DATO*/
	public function setNotaExamen($valor)
	{
		$this->nota_examen=$valor;
	}

	public function getNotaExamen()
	{
		return $this->nota_examen;
	}

	//function sql para guardar
	public function guardar()
	{
		$sql="INSERT INTO estudiante_examen (cod_estudiante_716,cod_examen_716,asignado,estado,nota_examen) VALUES ('$this->cod_estudiante','$this->cod_examen','$this->asignado','$this->estado','$this->nota_examen')";

		if (parent::ejecutar($sql)) {
			return true;
		}
		else
		{
			return false;
		}
	}

	public function modificarEstadoEstudiante()
	{
		$sql="UPDATE estudiante_examen SET estado='$this->estado', nota_examen='$this->nota_examen' WHERE cod_estudiante_716=$this->cod_estudiante AND cod_examen_716=$this->cod_examen ";	

		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function eliminarDeExamen()
	{
		$sql="DELETE FROM estudiante_examen WHERE cod_examen_716=$this->cod_examen and cod_estudiante_716=$this->cod_estudiante ";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}


} 
?>