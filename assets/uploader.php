<?php
//echo "Hola Repuesta desde el servidor";

//var_dump($_FILES);

if (isset($_FILES["file"])) {
    $name = $_FILES["file"]["name"];
    $temp = $_FILES["file"]["tmp_name"];
    $err = $_FILES["file"]["error"];
    $destino = "../files/$name";

    $upload = move_uploaded_file($temp,$destino);

    if($upload){

        $res = array(
            
            "err" => false,
            "status" => http_response_code(200),
            "statusText" => "Archivo $temp subido con exito",
            "files" => $_FILES["file"]
        );
    }else{
        $res = array(
            
            "err" => true,
            "status" => http_response_code(400),
            "statusText" => "Error al subir $temp al servidor",
            "files" => $_FILES["file"]
        );
    };

    echo json_encode($res);

};

?>