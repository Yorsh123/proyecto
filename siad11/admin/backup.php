<?php

include('conexion.php');

$tables = array();
$query = mysqli_query($conexion, 'SHOW TABLES');
while ($row = mysqli_fetch_row($query)) {
    $tables[] = $row[0];
}

$result = "";
foreach ($tables as $table) {
    $query = mysqli_query($conexion, 'SELECT * FROM ' . $table);
    $num_fields = mysqli_num_fields($query);

    $result .= 'DROP TABLE IF EXISTS ' . $table . ';';
    $row2 = mysqli_fetch_row(mysqli_query($conexion, 'SHOW CREATE TABLE ' . $table));
    $result .= "\n\n" . $row2[1] . ";\n\n";

    while ($row = mysqli_fetch_row($query)) {
        $result .= 'INSERT INTO ' . $table . ' VALUES(';
        for ($j = 0; $j < $num_fields; $j++) {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = str_replace("\n", "\\n", $row[$j]);
            if (isset($row[$j])) {
                $result .= '"' . $row[$j] . '"';
            } else {
                $result .= '""';
            }
            if ($j < ($num_fields - 1)) {
                $result .= ',';
            }
        }
        $result .= ");\n";
    }
    $result .="\n\n";
}

//Create Folder
$folder = 'Backups/';
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
    chmod($folder, 0777);
}

$date = date('d-m-Y_h-i-s');
$filename = $folder . "SIAD_backup_" . $date;

$handle = fopen($filename . '.sql', 'w+');
fwrite($handle, $result);
fclose($handle);
echo '<script> alert("Backup Realizado con Éxito.");</script>';
echo '<script> window.location="copias_seguridad.php"; </script>';
?>
