<?php
include_once('Conection.php');
class Pregunta extends Conexion
{
	//declarando atributos
	private $cod_pregunta;
	private $cod_examen;
	private $cod_tipo_pregunta;
	private $pregunta;
	private $opcion1;
	private $opcion2;
	private $opcion3;
	private $opcion4;
	private $respuesta;

	//declarando constructor

	public function Pregunta()
	{
		parent::conexion();
		$this->cod_pregunta=0;
		$this->cod_examen=0;
		$this->cod_tipo_pregunta=0;
		$this->pregunta="";
		$this->opcion1="";
		$this->opcion2="";
		$this->opcion3="";
		$this->opcion4="";
		$this->respuesta="";

	}


	//METODOS GET Y SETS
	public function setCodPregunta($valor)
	{
		$this->cod_pregunta=$valor;
	}

	public function getCodPregunta()
	{
		return $this->cod_pregunta;
	}
	//METODOS GET Y SETS
	public function setCodExamen($valor)
	{
		$this->cod_examen=$valor;
	}

	public function getCodExamen()
	{
		return $this->cod_examen;
	}
	//METODOS GET Y SETS
	public function setCodTipoPregunta($valor)
	{
		$this->cod_tipo_pregunta=$valor;
	}

	public function getCodTipoPregunta()
	{
		return $this->cod_tipo_pregunta;
	}
	//METODOS GET Y SETS
	public function setPregunta($valor)
	{
		$this->pregunta=$valor;
	}

	public function getPregunta()
	{
		return $this->pregunta;
	}
		//METODOS GET Y SETS
	public function setOpcion1($valor)
	{
		$this->opcion1=$valor;
	}

	public function getOpcion1()
	{
		return $this->opcion1;
	}
		//METODOS GET Y SETS
	public function setOpcion2($valor)
	{
		$this->opcion2=$valor;
	}

	public function getOpcion2()
	{
		return $this->opcion2;
	}
		//METODOS GET Y SETS
	public function setOpcion3($valor)
	{
		$this->opcion3=$valor;
	}

	public function getOpcion3()
	{
		return $this->opcion3;
	}
		//METODOS GET Y SETS
	public function setOpcion4($valor)
	{
		$this->opcion4=$valor;
	}

	public function getOpcion4()
	{
		return $this->opcion4;
	}
		//METODOS GET Y SETS
	public function setRespuesta($valor)
	{
		$this->respuesta=$valor;
	}

	public function getRespuesta()
	{
		return $this->respuesta;
	}

	public function guardar()
	{
		$sql="INSERT INTO pregunta (cod_examen_753,cod_tipo_pregunta_753,pregunta,opcion1,opcion2,opcion3,opcion4,correcta) VALUES ('$this->cod_examen','$this->cod_tipo_pregunta','$this->pregunta','$this->opcion1','$this->opcion2','$this->opcion3','$this->opcion4','$this->respuesta')";
		if (parent::ejecutar($sql)) {
			return true;
		}
		else
		{
			return false;
		}
	}

	public function modificar()
	{
		$sql="UPDATE pregunta SET cod_examen_753='$this->cod_examen', cod_tipo_pregunta_753='$this->cod_tipo_pregunta', pregunta='$this->pregunta', opcion1='$this->opcion1', opcion2='$this->opcion2', opcion3='$this->opcion3', opcion4='$this->opcion4', correcta='$this->respuesta' WHERE cod_pregunta=$this->cod_pregunta ";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function eliminar()
	{
		$sql="DELETE FROM pregunta WHERE cod_pregunta=$this->cod_pregunta";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function consultaPregunta($cod_examen)
	{
		$sql="SELECT * FROM examen,pregunta WHERE cod_examen = cod_examen_753 and cod_examen = '$cod_examen'";
		return parent::ejecutar($sql);
	}
} 
?>