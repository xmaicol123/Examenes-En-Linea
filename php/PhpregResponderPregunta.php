<?php 
include_once('Conection.php');
class ResponderPregunta extends Conexion
{
	//declarando variables
	private $cod_estudiante;
	private $cod_examen;
	private $cod_pregunta;
	private $estado_respuesta;
	private $estudiante_respuesta;
	private $nota_pregunta;

	//declarando constructor
	public function ResponderPregunta()
	{
		parent::conexion();
		$this->cod_estudiante=0;
		$this->cod_examen=0;
		$this->cod_pregunta=0;
		$this->estado_respuesta="";
		$this->estudiante_respuesta="";
		$this->nota_pregunta=0;
	}

	//DECLARANDO GET Y SETS
	public function setCodEstudiante($valor)
	{
		$this->cod_estudiante=$valor;
	}

	public function getCodEstudiante()
	{
		return $this->cod_estudiante;
	}
	//DECLARANDO GET Y SETS
	public function setCodExamen($valor)
	{
		$this->cod_examen=$valor;
	}

	public function getCodExamen()
	{
		return $this->cod_examen;
	}
	//DECLARANDO GET Y SETS
	public function setCodPregunta($valor)
	{
		$this->cod_pregunta=$valor;
	}

	public function getCodPregunta()
	{
		return $this->cod_pregunta;
	}
	//DECLARANDO GET Y SETS
	public function setEstadoRespuesta($valor)
	{
		$this->estado_respuesta=$valor;
	}

	public function getEstadoRespuesta()
	{
		return $this->estado_respuesta;
	}
	//DECLARANDO GET Y SETS
	public function setEstudianteRespuesta($valor)
	{
		$this->estudiante_respuesta=$valor;
	}

	public function getEstudianteRespuesta()
	{
		return $this->estudiante_respuesta;
	}
	//DECLARANDO GET Y SETS
	public function setNotaPregunta($valor)
	{
		$this->nota_pregunta=$valor;
	}

	public function getNotaPregunta()
	{
		return $this->nota_pregunta;
	}

	//SQL
	public function guardar()
	{
		$sql = "INSERT INTO estudiante_respuesta (cod_estudiante_917,cod_examen_917,cod_pregunta_917,estado,estudiante_respuesta,nota_pregunta) VALUES ('$this->cod_estudiante','$this->cod_examen','$this->cod_pregunta','$this->estado_respuesta','$this->estudiante_respuesta','$this->nota_pregunta')";
		if (parent::ejecutar($sql)) {
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>