<?php

$nimi="Projekt Jennifer";
$kuunimedET = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"]; //See on ennik!

//muutujad
$teadaanne = "";
$sisestusviga = "";


echo "Kell on ". date("H.i");
$tund = date("H");
$päeva_osa = "";
if($tund < 8){
	$päeva_osa = "uneaeg";
} if ($tund >= 8 and $tund < 16){
	$päeva_osa = "tööaeg";
} if ($tund >= 16 and $tund < 17){
	$päeva_osa = "heldeke! Lauluaeg!";
} if ($tund >= 17 and $tund < 22 ){
	$päeva_osa = "iseseisva töö aeg";
} if ($tund > 22){
	$päeva_osa = "uneaeg";
}
if (isset($_POST["submitButton"])){ //kas vajutati OK nuppu
    
    if (isset($_POST["birthYear"]) and ($_POST["birthYear"]) != 0){		//kui on sisestatud sünniaasta ja see pole tühi?
	    $Synniaasta = $_POST["birthYear"]; //See muutuja võrdub sisestusega 
        $Vanus = date("Y") - $_POST["birthYear"]; //lahutab aastast sünniaasta		
        $teadaanne = "<p>Sisestatu vanus on ligikaudu " .$Vanus ." aastat<p>"; //teatab sisestatu vanuse		
	} else {
	    $sisestusviga = "See on kohustuslik väli!"; //kuvab selle kui veateateks sobivad tingimused on täidetud
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title><?php echo $nimi?>  harjutusleht </title>
</head>
<body>
<h1>"<?php echo $nimi ?>"<br>Kui oled sellele lehele sattunud juhuslikult, siis lahku ja lihtsalt unusta kõik siin nähtu</h1>
<h3>Ma harjutan siin PHP kirjutamist.</h3> <!-- Pealkirjad --->

<?php
echo "Kui sisestada date väärtusteks D.m.Y annab see tulemuseks Thu.10.17 " .date("D.m.Y");
?><br><?php
echo "Kui sisestada date väärtusteks d.m.Y annab see tulemuseks 26.10.2017 " .date("d.m.Y");
?>
<br><?php
echo "Kui sisestada date väärtusteks d.m.y annab see tulemuseks 26.10.17 " .date("d.m.y");
?>
<br>
<?php
echo "Lehe avamise hetkel oli kell 16.01.40 " .date("H.i.s");
?>

<p> Päikesesüsteemi teke algas 4,6 miljardit aastat tagasi, kui hiiglasliku molekulaarpilve väike osa iseenda raskuse all<br> kokku langes. Suurem osa massist kogunes kokkulangenud piirkonna keskosasse, kus tekkis Päike; ülejäänud massist<br> moodustus protoplanetaarne ketas, millest arenesid planeedid, nende kaaslased, asteroidid ja teised väikesed<br> Päikesesüsteemi taevakehad.</p>

<p>Praegu on <?php echo $päeva_osa ?>.

<form method="POST">
    <label>Sünniaasta: </label>
    <input name="birthYear" id="birthYear" type="number" value="<?php echo $myBirthYear; ?> min="1900" max="2017">
	<span><?php echo $sisestusviga ?></span> 
	<br>
	<input name="submitButton" type="submit" value="OK">
	</form>
	<?php 
	    if(!empty($teadaanne)){echo $teadaanne;};
	?>

</body>
</html>