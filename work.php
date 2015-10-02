<?php
// удаляем таблицу Kosti перед созданием новой
$stmt = $db->prepare('DELETE FROM kosti');
$stmt->execute();

// заполняем таблицу результатов - 
$stmt = $db->prepare("INSERT INTO kosti(NUMBER, SUM, DROB, ID_EXP) values (:N, :S, :D, :X)");
for($j=1; $j<6; $j++){
for($i=2; $i<=12; $i++){
    $stmt->execute(array(':N' => $i, ':S' => $Kubiki->Bones_arr[$i], ':D' => $Kubiki->Drobi_arr[$i], ':X' => $j));
	}
}
// удаляем таблицу experiments перед созданием новой

$stmt = $db->prepare('DELETE FROM experiments');
$stmt->execute();

// заполняем таблицу экспериментов
$stmt = $db->prepare("INSERT INTO experiments (id_exp, data, time, name, trows, kol_bones) values (:ID, :DT, :TI, :NM, :TR, :KB)");
for($i=1; $i<=5; $i++){
    $stmt->execute(array(':ID' => $i, ':DT' => $Kubiki->Data(), ':TI' => $Kubiki->Times(), ':NM' => $Kubiki->Name_arr[$i-1], ':TR' => 36000, ':KB' => 2));
}
// создаём массив из таблицы Kubiki
$stmt = $db->query('SELECT * FROM kosti');
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

echo "<h3>Таблица результатов экспериментов</h3><br><table>"; // начало таблицы
echo "<tr><th>id_res</th><th>number</th><th>sum</th><th>drob</th><th>id_exp</th></tr>";
for ($i = 0; $i < count($result); $i++){
	//echo "<br>"; <a href="http://www.chip.ua/" target="_blank">Chip</a>
echo "<tr>"; // открыли строку таблицы Kubiki
foreach ($result[$i] as $key => $value) {
   echo "<td class='Kosti'>".$value."</td>";
}
echo "</tr>"; // закрыли строку таблицы Kubiki
  }
echo "</table>"; // конец таблицы Kubiki
//print_r($result);
//echo '<br>Кол-во элементов массива:'.count($result);

// создаём массив из таблицы experiments
$stmt = $db->query('SELECT * FROM experiments');
$eXp = $stmt->fetchall(PDO::FETCH_ASSOC);
echo "<h3>Таблица экспериментов</h3><br><table>"; // начало таблицы experiments
echo "<tr><th>id_exp</th><th>data</th><th>time</th><th>name</th><th>trows</th><th>kol_bones</th></tr>";
for ($i = 0; $i < count($eXp); $i++){
	//echo "<br>";
echo "<tr>"; // открыли строку таблицы
foreach ($eXp[$i] as $key => $value) {
	$res=$i+1;
   echo "<td class='eXp'><a href='vendor/Whitemanz/Bones/result.php?name=$res' target='_blank'>".$value."</a></td>";
}
echo "</tr></a>"; // закрыли строку таблицы
  }
echo "</table>"; // конец таблицы experiments
?>