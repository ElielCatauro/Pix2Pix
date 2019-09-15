<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php


$archivo = file_get_contents("transcripcion.txt"); //Guardamos archivo.txt en $archivo
$archivo = ucfirst($archivo); //Le damos un poco de formato
$archivo = nl2br($archivo); //Transforma todos los saltos de linea en tag <br/>
echo $archivo;



?>