<?php
$database = "if17_lutsmeel";
//alustame sessiooni
session_start();

    $MLyks = "";
	$MLkaks = "";
	$MLkolm = "";
	$MLneli = "";
	$MLviis = "";
	$MLkuus = "";
	$MLseitse = "";
	
	$eesti = "";
	$soome = "";
	$prantsuse = "";
	$norra = "";
	$baski = "";

function MELU($nadalapaevKeel){
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]); //andmebaasi ühendus 
	$stmt = $mysqli->prepare("SELECT sunday, monday, tuesday, wednesday, thursday, friday, saturday FROM vpnadalapaevad WHERE language = ?");//mida baasist tahame
	$stmt->bind_param("s", $nadalapaevKeel); // see paneb muutujad andmebaasi käsku
	$stmt->execute(); // annab käsu korraldus täita
	$stmt->bind_result($MLyks, $MLkaks, $MLkolm, $MLneli, $MLviis, $MLkuus, $MLseitse); // paneb muutujatesse väärtused
	$stmt->fetch(); // SEE SIIN ON FETCH, MIS ON KURADI OLULINE!
	$nadalapaevad = [];
	array_push($nadalapaevad, $MLyks, $MLkaks, $MLkolm, $MLneli, $MLviis, $MLkuus, $MLseitse); // paigutab andmebaasist saadud andmed järjest listi lõppu 
	$stmt->close(); // sulgeb statementi
	return $nadalapaevad; // lõpetab funktsiooni ja tagastab funktsioonis nädalapäevad
	
	// bind_result on juhtnöör. Kui tehakse fetch (tõmmatakse read alla), siis bind_result paigutab muutujatesse väärtused
	//array_push vajab AINULT MUUTUJAID, ta ei taha juhtnöör nagu näiteks bind result
}
	//"SELECT sunday, monday, tuesday, wednesday, thursday, friday, saturday FROM vpnadalapaevad WHERE language = ?" 
?>