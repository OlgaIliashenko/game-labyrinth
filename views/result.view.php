<?php $finishValue = getValue($y, $x); ?>

<div><b>Начальная ячейка : </b> <?= $_POST["startValue"] ?></div>
<div><b>Последовательность шагов:</b>
	<?php for ($i = 0; $i < count($cells); $i++) : ?>
		<?= $cells[$i] ?><?= $i < count($cells) - 1 ? "->" : "" ?>
	<?php endfor; ?>
</div>

<div><b>Правильный ответ : </b> <?= $finishValue ?></div>

<div><b> Ваш ответ : </b> <input type="hidden" name="userValue"><?= $_POST["userValue"] ?></div>

<div align="center">
	<?php
	if ($finishValue == $_POST["userValue"]): ?>
		<div class="alert alert-success result-info" role="alert">"Вы выиграли"</div>
	<?php else: ?>
		<div class="alert alert-danger result-info" role="alert">"Вы проиграли"</div>
	<?php endif; ?>

	<button type="button" class="btn btn-primary" onclick="document.location.href='/'">Попробовать еще раз</button>
</div>

