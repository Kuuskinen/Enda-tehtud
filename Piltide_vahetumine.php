<?php
//muutujad
$piltide_kataloog = "../HarjutaminePics/"; //See on teejuht, kust fotod võtta
$piltide_list = []; //See on tühi list, kuhu tulevad fotod
$piltide_vormingud = ["jpeg", "jpg"]; //piltide vormingud

$kõikFailid = array_slice(scandir($piltide_kataloog), 2); //array_slice võtab listist lõigu ja scandir tagastab selles kataloogis olevate failide listi (kogu kupatuse)!
foreach ($kõikFailid as $file){ //<--- võtab elemendi, paneb elemendi muutujasse $file ja jooksutab tsükli. Iga elemendi kohta jookseb tsükkel ühe korra.
    $pilt = pathinfo($file, PATHINFO_EXTENSION); //tagastab info failinime kohta ja faili viimase osa (näiteks .pdf.jpg korral .jpg)
    if (in_array($pilt, $piltide_vormingud) == true){ //vaatab, kas soovitud vorming on listi sees
        array_push($piltide_list, $file); //lisab elemendi listi lõppu
    }	
} //tsükli lõpp on siin

$piltide_loendur = count($piltide_list); //loendab listis olevate fotode arvu
$kuvatava_foto_valimine = mt_rand(0, $piltide_loendur-1); //võtab suvalise numbri vahemikus 0 kuni 4
$kuvatav_foto = $piltide_list[$kuvatava_foto_valimine];	//ühendades listi ja indeksiks määratud suvalise numbri, kuvatakse foto 
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