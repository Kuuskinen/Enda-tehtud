<?php
//muutujad
$piltide_kataloog = "../HarjutaminePics/";
$piltide_list = []; //See on tühi list, kuhu tulevad fotod
$piltide_vormingud = ["jpeg", "jpg"]; //piltide vormingud

$kõikFailid = array_slice(scandir($piltide_kataloog), 2);
foreach ($kõikFailid as $file){
    $pilt = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array($pilt, $piltide_vormingud) == true){
        array_push($piltide_list, $file);
    }	
} //tsükli lõpp on siin

$piltide_loendur = count($piltide_list);
$kuvatava_foto_valimine = mt_rand(0, $piltide_loendur);
$kuvatav_foto = $piltide_list[$kuvatava_foto_valimine];	
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset ="utf8" />
    <title>Pildid</title>
<body>
<h1>NASA fotod</h1>
<p>Siin vahetuvad koos lehekülje refreshimisega kasutajale kuvatavad fotod.<br> NB! Kõik kasutatavad fotod on avaldatud public domain'is ning need on teinud ja avaldanud NASA. Pilte tohib taaskasutada, kuid sel juhul peab viitama NASAle kui nende tootjale.</p>
<img src="<?php echo $piltide_kataloog .$kuvatav_foto?>" alt="NASA foto" style="width:500px;height:600px;"> 	