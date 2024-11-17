<?php

require('../fpdf/fpdf.php');
require('../../admin/conexion.php');
session_start();

$codigo = $_SESSION["Codigo"];
class PDF extends FPDF
{
	public  $conexion;
	public $NombreDocente;
function Header()
{


	$this->Image('../../imagenes/logoSIAD.png' , 10 ,10, 40 , 20,'PNG');
	$this->SetFont('Arial','B',20);
	$this->Cell(160);
	$this->Cell(50,20,'Tareas Orientadas por Docentes',0,0,'C');
	$this->Ln(15);
	$this->SetFont('Arial','B',10);
	$this->Cell(300);
	$this->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0, 'R');
	$this->Ln(5);

	$this->SetFont('Arial','B',12);
		    $this->Cell(160,20,'Asignaciones del Docente:',0,0,'R');
		    $codigo = $_SESSION["Codigo"];
            $asignaciones = mysqli_query($this->conexion,"SELECT concat(NombresDocente, ' ' ,ApellidosDocente) as Docente FROM docentes where idDocente = '$codigo'");
            while($row = mysqli_fetch_row($asignaciones)){
            $NombreDocente = $row[0];

            }
		     $this->Cell(55,20, $NombreDocente, 0,0,'R');
			$this->Ln(15);

		 // Colores de los bordes, fondo y texto
    $this->SetDrawColor(222,227,221);
     $this->SetFillColor(200,220,255);
   // $this->SetTextColor(220,50,50);
    // Ancho del borde (1 mm)
   // $this->SetLineWidth(1);
$this->SetFont('Arial','B',10);
	$this->Cell(10, 8, 'No.' ,1,0,'C');
	$this->Cell(30, 8, '# Asignado' ,1,0,'C');
	$this->Cell(40, 8, 'Asignatura' ,1,0,'C');
	$this->Cell(30, 8, 'Unidad' ,1,0,'C');
	$this->Cell(60, 8, 'Desc. Unidad' ,1,0,'C');
	$this->Cell(30, 8, 'Tarea' ,1,0,'C');
	$this->Cell(60, 8, 'Desc. Tarea' ,1,0,'C');
	$this->Cell(30, 8, 'Fecha Public.' ,1,0,'C');
	$this->Cell(30, 8, 'Fecha Present.' ,1,0,'C');
	$this->Cell(20, 8, 'Codigo' ,1,0,'C');
	$this->Ln(8);
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
//$pdf = new PDF();
$pdf = new PDF('L','mm','legal'); //Tamaño en forma Horizontal
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf = new FPDF('L','mm','legal'); //Tamaño en forma Horizontal
//$pdf = new FPDF('P','mm','letter'); //Tamaño Normal
//$pdf->AddPage();
//$title = 'Reporte de Productos';
//$pdf->SetTitle($title);
//$pdf->SetFont('Arial', '', 10);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$codigo = $_SESSION["Codigo"];
$tareas = mysqli_query($conexion, "SELECT planificacion_tareas.idPlanificacion as id, numeros_asignaciones.numeroAsignado as Numero, asignaturas.NombreAsignatura as Asignatura, planificacion_tareas.Unidad as Unidad, planificacion_tareas.DescripcionUnidad as UnidadD,  planificacion_tareas.Tarea as Tarea, planificacion_tareas.DescripcionTarea as TareaD, planificacion_tareas.FechaPublicacion as FechaPu, planificacion_tareas.FechaPresentacion as FechaPre,planificacion_tareas.CodigoTarea as Codigo 
from planificacion_tareas inner join numeros_asignaciones on planificacion_tareas.idNumeroAsignacion=numeros_asignaciones.idNumeroAsignacion 
                          inner join asignaturas on planificacion_tareas.idAsignatura = asignaturas.idAsignatura
  WHERE planificacion_tareas.idDocente = '$codigo'");
$item = 0;
while($tareas2 = mysqli_fetch_array($tareas)){
	$item = $item+1;
	$pdf->Cell(10, 8, $item, 0);
	$pdf->Cell(30, 8,$tareas2['Numero'], 0);
	$pdf->Cell(40, 8, $tareas2['Asignatura'], 0);
	$pdf->Cell(30, 8, $tareas2['Unidad'], 0);
	$pdf->Cell(60, 8, $tareas2['UnidadD'], 0);
    $pdf->Cell(30, 8, $tareas2['Tarea'], 0);
   	$pdf->Cell(60, 8, $tareas2['TareaD'], 0);
   	$pdf->Cell(30, 8, $tareas2['FechaPu'], 0);
   	$pdf->Cell(30, 8, $tareas2['FechaPre'], 0);
   	$pdf->Cell(20, 8, $tareas2['Codigo'], 0);
	$pdf->Ln(5);
}
$pdf->Ln(8);
//$pdf->Cell(0, 10, 'Pagina: '.$pdf->PageNo(),0,0,'C');
//$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
$pdf->Output(); //Esta opcion es para ver en linea el documento
?>