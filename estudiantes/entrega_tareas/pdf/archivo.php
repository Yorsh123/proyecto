<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select * from entrega_tareas where idEntregaTareas=".$_GET['id'];
            $query = $db->execute($sql);
            if($datos=$db->fetch_row($query)){
                if($datos['Archivo']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
                <div align="center">
        <iframe src="archivos/<?php echo $datos['Archivo']; ?>" width="100%" height="650"></iframe>
                </div>
                <?php } } ?>

    </body>

</html>
