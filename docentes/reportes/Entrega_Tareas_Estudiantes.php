<?php

require('../fpdf/fpdf.php');
require('../../admin/conexion.php');
session_start();
$Asignatura = $_POST['asignatura'];
$codigo = $_SESSION["Codigo"];

class PDF extends FPDF
{
		function Header()
		{
			$this->Image('../../imagenes/logoSIAD.png' , 10 ,10, 40 , 20,'PNG');
			$this->SetFont('Arial','B',20);
			$this->Cell(80);
			$this->Cell(60,20,'Reporte de Tareas por Estudiantes',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(160);
			$this->Cell(20, 10, 'Fecha: '.date('d-m-Y').'', 0, 'C');
			$this->Ln(5);
			$this->SetFont('Arial','B',12);
		    $this->Cell(20,20,'Tareas de la Asignatura:',0,0,'L');
		    $Asignatura = $_POST['asignatura'];
		     $this->Cell(85,20, $Asignatura, 0,0,'R');
			$this->Ln(15);
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
		     $this->SetFont('Arial','B',10);
			$this->Cell(10, 8, '#' ,1,0,'C');
			$this->Cell(40, 8, 'Estudiante' ,1,0,'C');
			$this->Cell(50, 8, 'Descripcion Tarea' ,1,0,'C');
			$this->Cell(50, 8, 'Archivo' ,1,0,'C');
			$this->Cell(40, 8, 'Fecha Entrega' ,1,0,'C');
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
		//$pdf = new FPDF('L','mm','legal'); //Tamaño en forma Horizontal
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(70, 8, '', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);

			//Consulta a la base de Datos
		$asignaciones = mysqli_query($conexion, "SELECT concat(estudiantes.NombresEstudiante,' ',estudiantes.ApellidosEstudiante) as Estudiante, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion, entrega_tareas.Archivo as Archivo, entrega_tareas.FechaEntrega as Fecha FROM asignaciones INNER JOIN asignaturas ON  asignaciones.idAsignatura =  asignaturas.idAsignatura 
                                         INNER JOIN entrega_tareas ON  asignaturas.idAsignatura =  entrega_tareas.idAsignatura 
										 INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
where asignaciones.idDocente = '$codigo' and asignaturas.NombreAsignatura = '$Asignatura' group by estudiantes.idEstudiante ");
        
		if(mysqli_num_rows($asignaciones) > 0) {
			$item = 0;
			while($asignaciones2 = mysqli_fetch_array($asignaciones)) {
				$item = $item + 1;
				$pdf->Cell(10, 8, $item, 0, 'C');
				$pdf->Cell(40, 8, mb_convert_encoding($asignaciones2['Estudiante'], 'ISO-8859-1', 'UTF-8'), 0, 'C');
				$pdf->Cell(50, 8, mb_convert_encoding($asignaciones2['Descripcion'], 'ISO-8859-1', 'UTF-8'), 0, 'C');
				$pdf->Cell(50, 8, $asignaciones2['Archivo'], 0, 'C');
				$pdf->Cell(40, 8, $asignaciones2['Fecha'], 0, 'C');
				$pdf->Ln(5);
			}
		
		
		
		
		}
	     else{
		
			 echo '<script> alert("No se han encontrado datos para esa asignatura.");</script>';
            echo '<script> window.location="../entrega_tareas_estudiantes.php"; </script>';
		}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>