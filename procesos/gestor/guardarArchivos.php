<?php
    
    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();
    $idCategoria = $_POST['categoriasArchivos'];
    $idUsuario = $_SESSION['idUsuario'];

    if ($_FILES['archivos']['size'] > 0) {
        $totalArchivos = array($_FILES['archivos']['name']);
        for ($i=0; $i < $totalArchivos; $i++) { 
            
            $nombreArchivo = $_FILES['archivos']['name'][$i];
            $explode = explode('.', $nombreArchivo);
            $tipoArchivo = array_pop($explode);

            $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
            $carpeta = '../gestor/archivos/';
            $rutaFinal = $carpeta.$nombreArchivo;

            echo  move_uploaded_file($rutaAlmacenamiento, $rutaFinal);

        }
    
    }else{
        echo 0;
    }
?>