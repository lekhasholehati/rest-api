<?php 
// $mahasiswa = [
// 	[
// 		"nama" => "lekha sholehati",
// 		"umur" => 22
// 	],
// 	[
// 		"nama" => "lekha sholehati",
// 		"umur" => 22
// 	]


// ];

// untuk ambil data dari data base dan diubah menjadi json
$dbh = new PDO('mysql:host=localhost;dbname=phpmvc','root','');
$db= $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
?>