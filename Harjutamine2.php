<?php
require("../../config.php");
require("functions2.php");
 
 if (date("w") == 0){ //see komplekt küsib serverilt numbrina nädalapäeva (nädala algus on pühapäev, mis on 0) ja kuvab selle
	echo ("pühapäev");
 } if (date("w") == 1){
    echo ("esmaspäev");
 } if (date("w") == 2){
    echo ("teisipäev");
 } if (date("w") == 3){
    echo ("kolmapäev");
 } if (date("w") == 4){
    echo ("neljapäev");
 } if (date("w") == 5){
    echo ("reede");
 } if (date("w") == 6){
    echo("laupäev");
 }	
 
    //muutujad
	$notice = ""; //kõigile kasutatavatele muutujatele on esialgu antud väärtuseks null
	$teade = "";
	$teadaanne = "";
	$nadalapaevad = "";
	$nadalapaevKeel = "";
	$nadalapaevKeelError = "";
	
	$MLyks = "";
	$MLkaks = "";
	$MLkolm = "";
	$MLneli = "";
	$MLviis = "";
	$MLkuus = "";
	$MLseitse = "";
	
//kas klõpsati kinnitamise nuppu
	if(isset($_POST["confirmButton"])){
	
	//kas on keel sisestatud
			
	if (isset ($_POST["nadalapaevKeel"])){
        if (empty ($_POST["nadalapaevKeel"])){ //kui nädalapäev on sisestamata
            $nadalapaevKeelError =" Sisesta sobiv keel"; //veateade
		} else {
            $nadalapaevKeel = $_POST["nadalapaevKeel"]; //Posti päringu andmetest nädalapäeva keele 
            $notice = MELU($nadalapaevKeel); // <--- MELU(sisend) ja $notice muutub nädalapäevade listiks
            //echo $notice[date("w")];			
	    }
	}
	}
	if(isset($_POST["fiaskoButton"])){
	    $teade = VAIN(); //päring VAIN funktsioonile, mis küsib keeled
		$loendur = count($teade); //loendab, mitu keelt on 
		$loto = mt_rand(0, $loendur-1); // valib saadud vahemikust suvalise keele  
		$valitud_keel = $teade[$loto]; //valitud keel 
		// echo $valitud_keel;
		$teadaanne = MELU($valitud_keel); //teeb saadud keelega päringu MELU funktsioonile, mis annab praeguse nädalapäeva antud keeles
		//echo $teadaanne[$loto];
	}	
	
?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>Kontrolltöö</title>
</head>
<body>
	<h1>Nädalapäevade valik</h1>
	<p>Sobivad keeled on: eesti, soome, prantsuse, norra ja baski.</p>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><!---HTMLspecialchars muudab erimärgid HTMLi sisestuseks.--->
		<label>Keel: </label>
		<input name="nadalapaevKeel" type="text" value="<?php echo $nadalapaevKeel; ?>"><span><?php echo $nadalapaevKeelError; ?></span>
		<br><br>
		<input name="confirmButton" type="submit" value="Kinnita"><!---tavalise valiku nupp--->
		<br><br>
		<input name="fiaskoButton" type="submit" value="Fiasko"><!--suvalise valiku nupp--->
		<br><br>
	    <?php if (!empty($notice)){ echo $notice[date("w")];} ?> <!--kuvab nädalapäeva valitud keeles ainult siis kui notice saab väärtuse-->
		<br><br>
		<?php if (!empty($teadaanne)){echo $teadaanne[date("w")];} ?><!--kuvab suvalise keele ainult siis, kui teadaanne saab väärtuse---> 
		<br>
		<?php echo date("w");?>
	</form>
		
</body>
</html> 