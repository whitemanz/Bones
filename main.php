<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "bones.php"; // подключение класса Bones

//создание объекта класса Bones
$Kubiki = new Bones();
echo "Массив из кол-ва віпадений сумм кубиков !!!<br>";
print_r($Kubiki->Bones_mass());
echo "<br>Массив из дробных значений сумм кубиков на 36000 !!!";
print_r($Kubiki->Drobki());

//echo $Kubiki;
// подключение к базам данных
// вариант № 1
/*
$dbhost = "localhost";  
$dbname = "Kubiki";  
$dbuser = "root";  
//$dbpass = "";  
$db = new PDO ( 'mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser );
*/
include "connect.php"; // подключение к базе данных в отдельном файле
include "work.php"; // подключаем обработку данных базы данных
$db = null; // закрываем базу
?>