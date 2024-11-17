<?php

require('../fpdf/fpdf.php');
require('../conexion.php');

$Turno = $_POST['turno'];

class PDF extends FPDF

{
	public $conexion;
	public $NombreTurno;
		function Header()
		{
			$this->Image('../../imagenes/politecnico.jpg' , 10 ,10, 30 , 25,'JPG');
			$this->SetFont('Arial','B',20);
			$this->Cell(80);
			$this->Cell(60,20,'Reporte de Asignaciones por Turnos',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(160);
			$this->Cell(20, 10, 'Fecha: '.date('d-m-Y').'', 0, 'C');
			$this->Ln(5);
			$this->SetFont('Arial','B',12);
		    $this->Cell(20,20,'Asignaciones del Turno:',0,0,'L');
		   $Turno = $_POST['turno'];
            $asignaciones = mysqli_query($this->conexion, "SELECT NombreTurno FROM turnos where idTurno = '$Turno'");
            while($row = mysqli_fetch_row($asignaciones)){
            $NombreTurno = $row[0];

            }
		     $this->Cell(90,20, $NombreTurno, 0,0,'C');
			$this->Ln(15);
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
		     $this->SetFont('Arial','B',10);
			$this->Cell(10, 8, '#' ,1,0,'C');
			$this->Cell(30, 8, 'Asignacion' ,1,0,'C');
			$this->Cell(15, 8, 'Numero' ,1,0,'C');
			$this->Cell(40, 8, 'Docente' ,1,0,'C');
			$this->Cell(35, 8, 'Asignatura' ,1,0,'C');
			$this->Cell(15, 8, 'Grupo' ,1,0,'C');
			$this->Cell(30, 8, 'Horario' ,1,0,'C');
			$this->Cell(15, 8, 'Estado' ,1,0,'C');
			$this->Ln(5);
		}
		function Footer()
		{
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().' / {nb}',0,0,'C');
		}
}
		// Creación del objeto de la clase heredada
		$pdf = new PDF();
		$pdf->conexion=$conexion;
		//$pdf = new FPDF('L','mm','legal'); //Tamaño en forma Horizontal
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(70, 8, '', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);

		if ($Turno < 0) {
			 echo '<script> alert("Por Favor selecciona un Grupo para brindarte el Reporte correspondiente.");</script>';
            echo '<script> window.location="../ReportesAsignaciones.php"; </script>';
		}
	     else{
		//Consulta a la base de Datos
		$asignaciones = mysqli_query($conexion,"SELECT asignaciones.Descripcion AS Asignacion, concat(docentes.NombresDocente,' ',docentes.ApellidosDocente) as Docente, asignaturas.NombreAsignatura AS Asignatura, grupos.NumeroGrupo AS Grupo, turnos.NombreTurno AS Turno, horarios.NombreHorario AS Horario, asignaciones.NumeroAsignacion AS NumeroA, asignaciones.Estado AS Estado FROM asignaciones INNER JOIN docentes ON asignaciones.idDocente = docentes.idDocente 
		INNER JOIN asignaturas ON asignaciones.idAsignatura = asignaturas.idAsignatura 
		INNER JOIN grupos ON asignaciones.idGrupo = grupos.idGrupo 
		INNER JOIN turnos ON asignaciones.idTurno = turnos.idTurno  
		INNER JOIN horarios ON asignaciones.idHorario = horarios.idHorario
       where turnos.idTurno  = '$Turno' ");
        
        $item = 0;
		while ($estudiantes2 = mysqli_fetch_array($estudiantes)) {
			$item = $item + 1;
			$pdf->Cell(10, 8, $item, 0);
			$pdf->Cell(20, 8, $estudiantes2['CarnetEstudiante'], 0);
			$pdf->Cell(30, 8, mb_convert_encoding($estudiantes2['NombresEstudiante'], 'ISO-8859-1', 'UTF-8'), 0);
			$pdf->Cell(30, 8, mb_convert_encoding($estudiantes2['ApellidosEstudiante'], 'ISO-8859-1', 'UTF-8'), 0);
			$pdf->Cell(30, 8, $estudiantes2['CedulaEstudiante'], 0);
			$pdf->Cell(50, 8, $estudiantes2['CorreoEstudiante'], 0);
			$pdf->Cell(20, 8, $estudiantes2['CelularEstudiante'], 0);
			$pdf->Ln(5);
		}
		

		}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>