<?php
define('STEPS', 10);
define('WIDTH', 3);
define('HEIGHT', 3);
define('TOP', 0);
define('RIGHT', 1);
define('BOTTOM', 2);
define('LEFT', 3);

if (!empty($_POST["startValue"]) && !empty($_POST["userValue"]) && !empty($_POST["go"])) {
	// Показываем страницу с результатом
	$x = ($_POST["startValue"] - 1) % WIDTH;
	$y = intval(($_POST["startValue"] - 1) / WIDTH);
	$cells = array();
	foreach($_POST["go"] as $go) {
		switch ($go) {
			case TOP:
				if ($y > 0) {
					$y--;
				}
				break;
			case BOTTOM :
				if ($y < (HEIGHT - 1)) {
					$y++;
				};
				break;
			case RIGHT:
				if ($x < (WIDTH - 1)) {
					$x++;
				};
				break;
			case LEFT:
				if ($x > 0) {
					$x--;
				};
				break;
		}
		$value = getValue($y, $x);
		$cells[]=$value;
	}

	$module="result.view.php";
	include("views/design.view.php");

} else {
	// Показываем страницу с заданием

	// Начальные координаты маркера
	$startX = rand(0, WIDTH - 1);
	$startY = rand(0, HEIGHT - 1);
	$startValue = getValue($startY, $startX);

	$directions = array(TOP => "Вверх", RIGHT => "Вправо", BOTTOM => "Вниз", LEFT => "Влево");
	$x=$startX; $y=$startY;
	$go = array();
	$cells = array();
	for ($i = 0; $i < STEPS; $i++) {
		$selectDirection = rand(0, 3);
		$value = getValue($y, $x);
		if ($selectDirection==BOTTOM && $value >= 7) {
			$i--;
		}
		elseif($selectDirection==TOP && $value <= 3){
			$i--;
		}
		elseif($selectDirection==RIGHT && $value%3==0){
			$i--;
		}
		elseif($selectDirection==LEFT && $value%3==1){
			$i--;
		}
		else{
			$go[] = $selectDirection;
			$cells []= $value;
			switch ($selectDirection) {
				case TOP:
					if ($y > 0) {
						$y--;
					}
					break;
				case BOTTOM :
					if ($y < (HEIGHT - 1)) {
						$y++;
					};
					break;
				case RIGHT:
					if ($x < (WIDTH - 1)) {
						$x++;
					};
					break;
				case LEFT:
					if ($x > 0) {
						$x--;
					};
					break;
			}
		}
	}

	$module="task.view.php";
	include("views/design.view.php");
}


function getValue($y, $x) {
	return $y * WIDTH + $x + 1;
}