<?php
include "connect.php"; // ����������� � ���� ������ � ��������� �����
// �������� ���������� �������
	echo "<h1>������ �� ���� ������ �� ������������ � " . $_GET["name"] . "</h1>";
if (isset($_GET["name"])){$n=$_GET["name"];}	
// ������ �� ������� ������ �� ������� �����������
$result_table = $db->query("SELECT id_res, number, sum, drob, id_exp FROM kosti WHERE id_exp=$n ORDER BY id_res");
while($row = $result_table->fetch()) {
echo $row['id_res']." | ".$row['number']." | ".$row['sum']." | ".$row['drob']." | ".$row['id_exp']." | ".'<br>';
}
?>