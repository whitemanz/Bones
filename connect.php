<?php
// ������� � 2
try
{
	$db = new PDO('mysql:host=localhost;dbname=Kubiki','root','');
}
catch(PDOException $e)
{ 	
	if ($e->GetCode() == 1049){
$db = new PDO('mysql:host=localhost;','root','');
	$db->exec('CREATE DATABASE $Kubiki'); //
	$db->exec('USE DATABASE $Kubiki'); //
	// ������ ������� �������������
	$db->exec('CREATE table $experiments( 
     id_exp INT( 10 ) AUTO_INCREMENT PRIMARY KEY,
     data VARCHAR(30),
	 time VARCHAR(30),
     name VARCHAR(30),
     trows INT( 10 ),
	 kol_bones INT( 10 );'); 
	 // ������ ������� �����������
	 $db->exec('CREATE table $kosti(
     id_res INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
     number INT( 11 ),
     sum INT( 11 ),
     drob float, 
     id_exp INT( 11 );');
	} else die("Error: ".$e->getMessage());
}
?>