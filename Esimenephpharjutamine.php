<?php

$nimi="Projekt Jennifer";
$kuunimedET = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"]; //See on ennik!

echo date("H");
$tund = date("H");
$päeva_osa = "";
if($tund < 8){
	$päeva_osa = "Uneaeg";
} if ($tund >= 8 and $tund < 16){
	$päeva_osa = "Tööaeg";
} if ($tund >= 16 and $tund < 17){
	$päeva_osa = "Heldeke! Lauluaeg!";
} if ($tund >= 17 and $tund < 22 ){
	$päeva_osa = "Iseseisva töö aeg";
} if ($tund > 22){
	$päeva_osa = "Uneaeg";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title><?php echo $nimi?>  harjutusleht </title>
</head>
<body>
<h1>Kui oled sellele lehele sattunud juhuslikult, siis lahku ja lihtsalt unusta kõik siin nähtu</h1>
<h3>Ma harjutan siin PHP kirjutamist.</h3> 

<p> Päikesesüsteemi teke algas 4,6 miljardit aastat tagasi, kui hiiglasliku molekulaarpilve väike osa iseenda raskuse all kokku langes. Suurem osa massist kogunes kokkulangenud piirkonna keskosasse, kus tekkis Päike; ülejäänud massist moodustus protoplanetaarne ketas, millest arenesid planeedid, nende kaaslased, asteroidid ja teised väikesed Päikesesüsteemi taevakehad.</p>

<p>Praegu on <?php echo $päeva_osa ?>.
</body>
</html>