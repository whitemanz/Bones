<?php
class Bones{
// поля кубиков
                public $Bones1; // - кубик первый
                public $Bones2; // - кубик второй
                public $Sum; // - Комбинация из суммы двух кубиков
				public $Bones_arr = array(); // массив значений комбинаций
				public $Drobi_arr = array(); // массив значений из дробей (отношение суммы комбинаций к кол-ву бросков)
				public $Name_arr = array("Петров","Васечкин","Гусев","Вискарёва","Сыроежкин"); // имена экспериментаторов
				// методы для создания полей для базы данных
				
				public function Bones_calc() { // случайная генерация броска кубиков
					$this->Bones1 = rand(1,6);
					$this->Bones2 = rand(1,6);
					$this->Sum = $this->Bones1 + $this->Bones2;
					return $this->Sum;
    }
				public function Bones_mass() { // 
					$k2=0;$k3=0;$k4=0;$k5=0;$k6=0;$k7=0;$k8=0;$k9=0;$k10=0;$k11=0;$k12=0;
					
					for($i=0;$i<36000;$i++) {
						//$this->Bones_arr[$this->Bones_calc()]++;
						if($this->Bones_calc() == 2){$k2++; $this->Bones_arr[2]=$k2;}
						if($this->Bones_calc() == 3){$k3++; $this->Bones_arr[3]=$k3;}
						if($this->Bones_calc() == 4){$k4++; $this->Bones_arr[4]=$k4;}
						if($this->Bones_calc() == 5){$k5++; $this->Bones_arr[5]=$k5;}
						if($this->Bones_calc() == 6){$k6++; $this->Bones_arr[6]=$k6;}
						if($this->Bones_calc() == 7){$k7++; $this->Bones_arr[7]=$k7;}
						if($this->Bones_calc() == 8){$k8++; $this->Bones_arr[8]=$k8;}
						if($this->Bones_calc() == 9){$k9++; $this->Bones_arr[9]=$k9;}
						if($this->Bones_calc() == 10){$k10++; $this->Bones_arr[10]=$k10;}
						if($this->Bones_calc() == 11){$k11++; $this->Bones_arr[11]=$k11;}
						if($this->Bones_calc() == 12){$k12++; $this->Bones_arr[12]=$k12;}
						}
						ksort($this->Bones_arr);
						return $this->Bones_arr;
    }
	public function Drobki() { // формируем массив дробных отношений
					$kol =36000;
					for($i=2;$i<=12;$i++) {
						$this->Drobi_arr[$i] = round($this->Bones_arr[$i] / $kol, 4);
						}
						ksort($this->Drobi_arr);
						return $this->Drobi_arr;
    }
	public function Data() { // формируем поля дата
					$data ="";
					$data =rand(1,30)."."."09.15";
						return $data;
    }
	public function Times() { // формируем поля дата
					$time ="";
					$time =rand(0,24).":".rand(0,59);
						return $time;
    }
	public function __toString() {
		return '<div> Кубики выпали случайно:<br>
								кубик 1: '.$this->Bones1.'<br>
								кубик 2: '.$this->Bones2.'<br>
								<b>Сумма кубиков: '.$this->Bones_calc().'</b><br>
								</div>';
						}
                }
?>