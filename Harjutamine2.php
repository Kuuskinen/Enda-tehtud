<?php
require("../../config.php");
require("functions2.php");
 
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
	
	//kas on keel sisestatud
			
	if (isset ($_POST["nadalapaevKeel"])){
        if (empty ($_POST["nadalapaevKeel"])){
            $nadalapaevKeelError =" Sisesta sobiv keel";
		} else {
            $nadalapaevKeel = $_POST["nadalapaevKeel"];
            $notice = MELU($nadalapaevKeel); // <--- MELU(sisend) ja $notice muutub nädalapäevade listiks
            echo $notice[date("w")];			
	    }
	}
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
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Keel: </label>
		<input name="nadalapaevKeel" type="text" value="<?php echo $nadalapaevKeel; ?>"><span><?php echo $nadalapaevKeelError; ?></span>
		<br><br>
		<input name="confirmButton" type="submit" value="Kinnita">
		<br><br>
	    <?php echo $notice[date("w")]; ?>
		<br><br>
		<?php echo date("w");?>
	</form>
		
</body>
</html>