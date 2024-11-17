<?php

require('../admin/fpdf/fpdf.php');
require('../admin/conexion.php');
//$codigo = $_POST['asignatura'];
//$Asignatura = $_POST['asignatura'];
$id = $_GET['id'];

class PDF extends FPDF
{
	public $conexion;
	public $NombreAsignatura;
		function Header()
		{
			$this->Image('../imagenes/logoSIAD.png' , 10 ,10, 40 , 20,'PNG');
			$this->SetFont('Arial','B',18);
			$this->Cell(80);
			$this->Cell(50,20,'Reporte de Estudiantes por Asignaturas',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(160);
			$this->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0, 'R');
			$this->Ln(10);
			$this->SetFont('Arial','B',13);
             $this->Cell(30,10,'Asignatura:',0,0,'L');
             $id = $_GET['id'];
              $asignaciones = mysqli_query($this->conexion,"SELECT NombreAsignatura FROM asignaturas where idAsignatura = '$id'");
            while($row = mysqli_fetch_row($asignaciones)){
            $this->NombreAsignatura = $row[0];
        }
			 $this->Cell(50,10, $this->NombreAsignatura, 0,0,'R');
			  // $this->Cell(95,20, $NombreAsignatura, 0,0,'R');
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
		     	$this->Ln(10);
            $this->SetFont('Arial','B',10);
			$this->Cell(10, 8, '#' ,1,0,'C');
			$this->Cell(60, 8, 'Estudiante' ,1,0,'C');
			$this->Cell(50, 8, 'Fecha de Inscripcion' ,1,0,'C');
			$this->Cell(70, 8, 'Observaciones' ,1,0,'C');
			$this->Ln(3);
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
		//Consulta a la base de Datos
		$asignaciones = mysqli_query($conexion,"SELECT asignaturas.NombreAsignatura as Asignatura, concat(estudiantes.NombresEstudiante,' ' ,estudiantes.ApellidosEstudiante) as Estudiante, inscripciones_asignaturas.fechaInscripcion as Fecha, inscripciones_Asignaturas.observaciones as Observaciones
                       FROM asignaturas INNER JOIN inscripciones_Asignaturas ON  asignaturas.idAsignatura =  inscripciones_Asignaturas.idAsignatura 
                          INNER JOIN estudiantes ON  inscripciones_Asignaturas.idEstudiante =  estudiantes.idEstudiante
                       WHERE asignaturas.idAsignatura = '$id' group by estudiantes.idEstudiante");
        
        $item = 0;
			while($asignaciones2 = mysqli_fetch_array($asignaciones)){
				$item = $item+1;
				$pdf->Cell(10, 8, $item, 0,'C');
				$pdf->Cell(60, 8, utf8_decode($asignaciones2['Estudiante']), 0,'C');
				$pdf->Cell(50, 8, $asignaciones2['Fecha'], 0, 'C');
				$pdf->Cell(70, 8, utf8_decode($asignaciones2['Observaciones']), 0,'C');
				$pdf->Ln(5);
			}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>