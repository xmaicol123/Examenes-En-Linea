<?php
include_once('Conection.php');
class Examen extends Conexion
{
	//atributos
	private $cod_examen;
	private $cod_grupo;
	private $cod_tipo_examen;
	private $nombre_examen;
	private $descripcion;
	private $fecha_inicio;
	private $fecha_final;
	private $duracion;
	private $estado_examen;
	private $estado_estudiante;

	//construtor
	public function Examen()
	{   parent::conexion();
		$this->cod_examen=0;
		$this->cod_grupo=0;
		$this->cod_tipo_examen=0;
		$this->nombre_examen="";
		$this->descripcion="";
		$this->fecha_inicio="";
		$this->fecha_final="";
		$this->duracion="";
		$this->estado_examen="";
		$this->estado_estudiante="";
	}
	//propiedades de acceso
	//DECLARANDO GET Y SETS
	public function setCodExamen($valor)
	{
		$this->cod_examen=$valor;
	}

	public function getCodExamen()
	{
		return $this->cod_examen;
	}
	////////
	public function setCodGrupo($valor)
	{
		$this->cod_grupo=$valor;
	}

	public function getCodGrupo()
	{
		return $this->cod_grupo;
	}
	//DECLARANDO GET Y SETS
	public function setCodTipoExamen($valor)
	{
		$this->cod_tipo_examen=$valor;
	}

	public function getCodTipoExamen()
	{
		return $this->cod_tipo_examen;
	}
	//DECLARANDO GET Y SETS
	public function setNombre($valor)
	{
		$this->nombre_examen=$valor;
	}

	public function getNombre()
	{
		return $this->nombre_examen;
	}
	//DECLARANDO GET Y SETS
	public function setDescripcion($valor)
	{
		$this->descripcion=$valor;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}
	//DECLARANDO GET Y SETS
	public function setFechaInicio($valor)
	{
		$this->fecha_inicio=$valor;
	}

	public function getFechaInicio()
	{
		return $this->fecha_inicio;
	}
	//DECLARANDO GET Y SETS
	public function setFechaFinal($valor)
	{
		$this->fecha_final=$valor;
	}

	public function getFechaFinal()
	{
		return $this->fecha_final;
	}
	//DECLARANDO GET Y SETS
	public function setDuracion($valor)
	{
		$this->duracion=$valor;
	}

	public function getDuracion()
	{
		return $this->duracion;
	}
	//DECLARANDO GET Y SETS
	public function setEstadoExamen($valor)
	{
		$this->estado_examen=$valor;
	}

	public function getEstadoExamen()
	{
		return $this->estado_examen;
	}
	//DECLARANDO GET Y SETS
	public function setEstadoEstudiante($valor)
	{
		$this->estado_estudiante=$valor;
	}

	public function getEstadoEstudiante()
	{
		return $this->estado_estudiante;
	}



	//metodos para el contructor
	public function guardar()
	{
     $sql="INSERT INTO examen (cod_grupo_225,cod_tipo_examen_225,nombre_examen,descripcion_examen,fecha_inicio,fecha_final,duracion,estado_examen) VALUES('$this->cod_grupo','$this->cod_tipo_examen','$this->nombre_examen','$this->descripcion','$this->fecha_inicio','$this->fecha_final','$this->duracion','$this->estado_examen')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	public function modificar()
	{
		$sql="UPDATE examen SET cod_grupo_225='$this->cod_grupo', cod_tipo_examen_225='$this->cod_tipo_examen', nombre_examen='$this->nombre_examen', descripcion_examen='$this->descripcion', fecha_inicio='$this->fecha_inicio', fecha_final='$this->fecha_final', duracion='$this->duracion', estado_examen='$this->estado_examen' WHERE cod_examen=$this->cod_examen ";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function eliminar()
	{
		$sql="DELETE FROM examen WHERE cod_examen=$this->cod_examen";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function buscar()
	{
		$sql="SELECT * FROM examen";
		return parent::ejecutar($sql);
	}

	public function consultaExamenEstudiante($cod_estudiante)
	{
		$sql="SELECT DISTINCT * FROM carrera,materia,carrera_materia,grupo,profesor,examen,tipo_examen,estudiante,estudiante_grupo,estudiante_examen WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_grupo = cod_grupo_225 and cod_tipo_examen_225 = cod_tipo_examen and cod_grupo = cod_grupo_546 and cod_estudiante_546 = cod_estudiante and cod_estudiante = cod_estudiante_716 and cod_examen = cod_examen_716 and cod_estudiante = '$cod_estudiante' and estado_examen='Enviado' and estado = 'Sin Contestar' ";
		return parent::ejecutar($sql);
	}

	public function consultaExamenDocente($cod_profesor)
	{
		$sql="SELECT DISTINCT * FROM carrera,materia,carrera_materia,grupo,profesor,examen,tipo_examen WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_grupo = cod_grupo_225 and cod_tipo_examen_225 = cod_tipo_examen and cod_profesor_99 = '$cod_profesor'";
		return parent::ejecutar($sql);
	}

	/*consulta para asignar a un estudiante de un grupo un examen*/
	public function asignarEstudianteExamen($grupo,$examen)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo,examen WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_grupo = cod_grupo_225 and cod_grupo='$grupo' and cod_examen = '$examen'";
		return parent::ejecutar($sql);
	}
	/*consulta para asignar a un estudiante de un grupo un examen*/
	public function detalleEstudianteExamen($grupo,$examen)
	{
		$sql="SELECT * FROM estudiante,estudiante_grupo,grupo,examen,estudiante_examen WHERE cod_estudiante = cod_estudiante_546 and cod_grupo_546 = cod_grupo and cod_grupo = cod_grupo_225 and cod_estudiante = cod_estudiante_716 and cod_examen = cod_examen_716 and cod_grupo='$grupo' and cod_examen = '$examen'";
		return parent::ejecutar($sql);
	}

	public function consultarExamenPreguntaEstudiante($cod_examen)
	{
		$sql = "SELECT * FROM examen,pregunta WHERE cod_examen = cod_examen_753 and cod_examen='$cod_examen'";
		return parent::ejecutar($sql);
	}

	public function consultaGrupoModificar($cod_carrera,$cod_materia,$cod_semestre,$cod_profesor)
	{
		$sql="SELECT DISTINCT * FROM carrera,materia,carrera_materia,grupo,profesor WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_carrera = '$cod_carrera' and cod_materia = '$cod_materia' and cod_carrera_materia = '$cod_semestre' and cod_profesor = '$cod_profesor'";
		return parent::ejecutar($sql);
	}

	public function consultaReloj($cod_examen)
	{
		$sql = "SELECT * FROM examen WHERE cod_examen='$cod_examen'";
		return parent::ejecutar($sql);
	}

	public function detalleRespuestaEstudiante($cod_examen,$cod_estudiante)
	{
		$sql="SELECT * FROM estudiante,estudiante_examen,examen,pregunta,estudiante_respuesta WHERE cod_estudiante = cod_estudiante_716 and cod_examen_716 = cod_examen and cod_examen_753 = cod_examen and cod_estudiante = cod_estudiante_917 and cod_examen_917 = cod_examen and cod_pregunta_917 = cod_pregunta and cod_estudiante='$cod_estudiante' and cod_examen='$cod_examen' ";
		return parent::ejecutar($sql);
	}

	public function sumaRespuestaEstudiante($cod_examen,$cod_estudiante)
	{
		$sql="SELECT * FROM estudiante,estudiante_examen,examen WHERE cod_estudiante = cod_estudiante_716 AND cod_examen_716 = cod_examen AND cod_estudiante = '$cod_estudiante' AND cod_examen = '$cod_examen' ";
		return parent::ejecutar($sql);
	}

	public function consultaExamenEstudianteContestada($cod_estudiante)
	{
		$sql="SELECT DISTINCT * FROM carrera,materia,carrera_materia,grupo,profesor,examen,tipo_examen,estudiante,estudiante_grupo,estudiante_examen WHERE cod_carrera = cod_carrera_1122 and cod_materia_1122 = cod_materia and cod_carrera_materia = cod_carrera_materia_99 and cod_profesor_99 = cod_profesor and cod_grupo = cod_grupo_225 and cod_tipo_examen_225 = cod_tipo_examen and cod_grupo = cod_grupo_546 and cod_estudiante_546 = cod_estudiante and cod_estudiante = cod_estudiante_716 and cod_examen = cod_examen_716 and cod_estudiante = '$cod_estudiante' and estado = 'Contestado' ";
		return parent::ejecutar($sql);
	}

}    
?>
