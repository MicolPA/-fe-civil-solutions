<?php 

use app\models\Category;

$question_total = 0;
$count = explode(',', $infoExam['exam']['Count']);
foreach ($count as $c) {
	$question_total+=$c;
}

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="mb-1">Results</h2>
			<hr class="mt-0">
		</div>

		<div class="col-md-12">
			<p class="display-2"><?= $grade['correct'] . '/' . $question_total ?></p>
		</div>

		<div class="col-md-12">
			<?php for ($i = 0; $i < count($infoExam['categories']); $i++): ?>
				<?php if (isset($infoExam['categories'][$i])): ?>
					<?php $cat = Category::findOne($infoExam['categories'][$i]) ?>
					<p class="text-dark mb-1"><span class="font-weight-bold h5"><i class="fas fa-angle-right"></i> <?= $cat['Name'] ?>: </span> <?= $infoExam['count'][$i] . " questions" ?></p>
				<?php endif ?>
			<?php endFor ?>
		</div>

		<div class="col-md-12 mt-5">
            <a href="/frontend/web/site/home" class="btn btn-neutral btn-icon d-none d-lg-inline-block">Generate another test</a>
            <a href="/frontend/web/exam/history" class="btn btn-primary btn-icon">See all my grades</a>
		</div>
	</div>

</div>