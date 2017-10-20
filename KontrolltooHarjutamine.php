<?php
require("../../config.php");
require("functions.php");
 
 //echo date("w");
 if (date("w") == 0){
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
	$MLnadalapaev = "";
	$MLnadalapaevNAME = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"]; 
	$MLnadalapaevError = "";
	$notice = "";
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
	
	//kas on nädalapäev sisestatud
	if (isset ($_POST["MLnadalapaev"])){
		if (empty ($_POST["MLnadalapaev"])){
			$MLnadalapaevError =" Nädalapäev on puudu!";
		} else {
			$MLnadalapaev = $_POST["MLnadalapaev"];
		}
	}
		
		if(!empty($MLnadalapaev and !empty("MLnadalapaev"))){ 
			$notice = MELU($MLnadalapaev, $_POST["MLnadalapaev"]);
			if((date("w")) == $nadalapaevad){
                echo($nadalapaevad);				
	} 
		}
		//SIIT ALATES ON MINU HILJEM KIRJUTATUD KOOD. EELNEV ON TESTITUD JA TOIMIV KOOD.
	if(isset($_POST["nadalapaevKeel"])){
        if (empty ($_POST["nadalapaevKeel"])){
              $nadalapaevKeelError=" Ebasobiv keel";
        } else {
            $nadalapaevKeel = $_POST["nadalapaevKeel"];			
	    }
	}
		/*if(!empty($nadalapaevKeel and !empty("nadalapaevKeel"))){
			$notice = VAIN($nadalapaevKeel, $_POST["nadalapaevKeel"];*/
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
	
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Nädalapäev: </label>
		<input name="MLnadalapaev" type="text" value="<?php echo $MLnadalapaev; ?>"><span><?php echo $MLnadalapaevError; ?></span>
		<br><br>
		<label>Keel: </label>
		<input name="nadalapaevKeel" type="text" value="<?php echo $nadalapaevKeel; ?>"><span><?php echo $nadalapaevKeelError; ?></span>
		<br><br>
		<input name="confirmButton" type="submit" value="Kinnita">
	</form>
		
</body>
</html>