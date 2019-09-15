
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<body>

<?php

$message = $_POST["message"];
$message=str_replace('
', "", $message);
$message=str_replace(" ", "+", $message);


$url = "http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=32&client=tw-ob&q=".$message."&tl=es";

/**
$fileName = basename('voice2voice.mp4');
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");
**/

$i = count(glob('C:\Users\javie\Documents\Drive\input\{*.*}',GLOB_BRACE));

$i++;
$source = file_get_contents($url);
file_put_contents('C:\Users\javie\Documents\Drive\input\voice2voice_'.$i.'.wav', $source);


echo $i."<br>";
?>
<a href="index.html"><b>Volver</b></a>

<?php

/**
 $file='voices/voice2voice.mp4'; 
 header('Content-Type: video/mp4');
 header('Accept-Ranges: bytes'); 
 header('Content-Length:'.filesize($file)); 
 readfile($file);
 exit;
**/

/**
echo "<b>En 10 segundos se te redireccionará al siguiente paso...</b>";
header("Refresh: 10; URL= escuchar.php");
**/

?>

</body>
</html>