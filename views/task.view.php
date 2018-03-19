<p>
	Ниже расположено поле размером <?=WIDTH?> на <?=HEIGHT?> ячейки.
	В начале игры в случайную ячейку помещен маркер и сгенерировано <?=STEPS?> «ходов»
	(возможные варианты «вверх», «влево», «вниз», «вправо»).
	Вам необходимо в уме «пройти» по этим ходам по лабиринту и указать конечную точку маркера.
</p>
<div align="center">
<?php
$k = 0;
for ($y = 0; $y < HEIGHT; $y++): ?>
	<div>
		<?php for ($x = 0; $x < WIDTH; $x++):
			$k++;
			?>
			<button type="button" class="btn btn-outline-info <?php if ($startValue == $k) echo(" active "); ?>">
				<?= $k ?>
			</button>
		<?php endfor; ?>
	</div>
<?php endfor; ?>


<form method="POST">
	<div><b>Начальная клетка:</b>
		<?= $startValue ?>
		<input type="hidden" name="startValue" value="<?= $startValue ?>">
	</div>

	<div><b>Шаги:</b>
		<?php
		for ($i = 0; $i < count($go); $i++) {
			$selectDirection = $go[$i];
			?><input type="hidden" name="go[]" value="<?= $selectDirection ?>">
			<?= $directions[$selectDirection] ?><?= $i < count($go) - 1 ? "," : "" ?>
			<?php
		}
		?>
	</div>
	<div><b>Укажите конечную точку:</b> <input type="text" name="userValue"></div>
	<div>
		<button type="submit" class="btn btn-primary">Отправить ответ!</button>
	</div>
</form>
</div>
