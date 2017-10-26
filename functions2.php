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
	$stmt->fetch(); // SEE SIIN ON FETCH, MIS ON KURADI OLULINE! KASUTAME SELLEKS ET TÖÖDELDA ROHKEM KUI ÜHTE RIDA
	$nadalapaevad = [];
	array_push($nadalapaevad, $MLyks, $MLkaks, $MLkolm, $MLneli, $MLviis, $MLkuus, $MLseitse); // paigutab andmebaasist saadud andmed järjest listi lõppu 
	$stmt->close(); // sulgeb statementi
	return $nadalapaevad; // lõpetab funktsiooni ja tagastab funktsioonis nädalapäevad
	
	// bind_result on juhtnöör. Kui tehakse fetch (tõmmatakse read alla), siis bind_result paigutab muutujatesse väärtused
	//array_push vajab AINULT MUUTUJAID, ta ei taha juhtnöör nagu näiteks bind result
}

function VAIN(){
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]); //andmebaasi ühendus 
	$stmt = $mysqli->prepare("SELECT language FROM vpnadalapaevad"); //mida baasist tahame
	$stmt->execute(); //käivitab päringu, tõmbav read alla
	$stmt->bind_result($keel); //paneb keele muutujasse, et kõik keeled jõuaksid listi 
	$keeled = []; //tühi list
	while($stmt->fetch() == true){
	//$stmt->fetch(); Ebavajalik. See on juba while tingimuses (expect the unexcpected)
	array_push($keeled, $keel); //paneb elemendi listi $keeled lõppu 
	} //siin lõppeb while-funktsioon 
	$stmt->close(); //statement close 
	return $keeled; //tagastab keeled 
}
	
	//"SELECT sunday, monday, tuesday, wednesday, thursday, friday, saturday FROM vpnadalapaevad WHERE language = ?" 
?>