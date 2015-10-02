<?php
include "connect.php"; // подключение к базе данных в отдельном файле
// Значение переменной найдено
if (isset($_GET["name"])){$n=$_GET["name"];
echo "<h1>Запрос из базы данных по эксперименту № " . $_GET["name"] . "</h1>";

// Запрос на выборку данных из таблицы результатов
$result_table = $db->query("SELECT id_res, number, sum, drob, id_exp FROM kosti WHERE id_exp=$n ORDER BY id_res");
while($row = $result_table->fetch()) {
echo $row['id_res']." | ".$row['number']." | ".$row['sum']." | ".$row['drob']." | ".$row['id_exp']." | ".'<br>';
}	
	
}
?>