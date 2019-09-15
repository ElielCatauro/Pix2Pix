<?php

$i = count(glob('C:\Users\javie\Documents\Drive\targetVoice\{*.*}',GLOB_BRACE));
$num = $i;

$num=$_POST["num"];

$direccion="C:/Users/javie/Documents/Drive/targetVoice";
$direccion2="C:/Users/javie/Documents/Drive/inputVoice";
$direccion3="C:/Users/javie/Documents/Drive/input";

$ini=$_POST["ini"];
$fin=$_POST["fin"];

$tiempoIni=$ini;
$tiempoFin=$fin;


function conversorSegundosHoras($tiempo_en_segundos) {
    $horas = floor($tiempo_en_segundos / 3600);
    $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
    $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

	if(strlen($horas)<2) $horas="0".$horas;
	if(strlen($minutos)<2) $minutos="0".$minutos;
	if(strlen($segundos)<2) $segundos="0".$segundos;

    return $horas . ':' . $minutos . ":" . $segundos;
}

function conversorHorasSegundos($tiempo_en_horas){
	//$horas=substr($tiempo_en_horas, 0, 2);
	//$horas=intval($horas*3600);
	$n = strpos($tiempo_en_horas, ":" );
	$minutos=substr($tiempo_en_horas, 0, $n);
	$minutos=intval($minutos*60);
	$segundos=substr($tiempo_en_horas, $n+1, 2);
	$segundosTotal=$minutos+$segundos;

	return $segundosTotal;
}



$tiempoFinSeg = conversorHorasSegundos($tiempoFin);
$tiempoIniSeg = conversorHorasSegundos($tiempoIni);

$tiempoTotalSeg=$tiempoFinSeg-$tiempoIniSeg;

$tiempoTotalHoras = conversorSegundosHoras($tiempoTotalSeg);
$tiempoIniHoras = conversorSegundosHoras($tiempoIniSeg);

//echo $tiempoIniHoras."<--tiempo Inicial en horas<br>";
//echo $tiempoTotalHoras."<--tiempo total en horas<br>";

$tiempoTotalHoras.=".500"; // añade 500 milisegundos al audio

echo $num."<br>";

$entrada="audio.mp3";
$salida="voice2voice_".$num.".wav";
//echo "ffmpeg -i $entrada -ss $tiempoIniHoras -t $tiempoTotalHoras -async 1 -strict -2 $direccion/$salida";

echo shell_exec("ffmpeg -c 1 -codec mp3 -i $entrada -ss $tiempoIniHoras -t $tiempoTotalHoras $direccion/$salida ");
echo shell_exec("ffmpeg -c 1 -codec mp3 -i $direccion3/$salida  $direccion2/$salida ");

?>


<a href="recortar.html"><b>Volver</b></a>