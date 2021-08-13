<?php $i = 0; ?>
<div class="col-md-12">
	<h2>FE CIVIL SOLUTIONS</h2>

	<p>Exam Generated</p>
</div>

<?php foreach ($model as $q): ?>
				
	<?php $i++ ?>
	<div class="col-md-12 list-item" style="margin-bottom:1rem">
		<div class="card">
		    <div class="card-header" id="headingOne<?= $i ?>">
		      <h5 class="mb-0">
		        <p class="font-10 mb-0 mt-1" style="color:#444;font-size: 10px;margin: 0px;">Question #<?= $i ?> <span class=" bg-info text-white font-10" style="float:left !important;width: fit-content;"><?= $q->idCategory->Name ?></span> </p>

		        <p class="font-weight-bold h5 mt-3"><?= $q->Question ?></p>
		      </h5>
		    </div>

	      	<div class="card-body">
		        <?php if ($q['Image']): ?>
		            <img src="/frontend/web/<?= $q['Image'] ?>" class='mb-2' width='500px' style='max-width: 100%;'>
		        <?php endif ?>
			     <?php $answers = \app\models\Answers::find()->where(['IdQuestion' => $q->IdQuestion])->orderBy([ 'rand()' => SORT_DESC])->all() ?>
		        <?php if ($q->IdQuestionType == 2): ?>

			        <ol>
			        	<?php foreach ($answers as $a): ?>
			       		<li><?= $a->Answer ?></li>
			        <?php endforeach ?>
			        </ol>
			    <?php else: ?>
			    	<div style="border:1px solid #ccc;height: 100px;"></div>
			    	
		        <?php endif ?>

		        <input type="hidden" class='question_<?= $i ?>' name='Question[<?= $q->IdQuestion ?>' value="<?= $q->IdQuestion ?>">
		        <input type="hidden" class='question_type_<?= $i ?>' value="<?= $q->IdQuestionType ?>">
	      	</div>
		</div>
	</div>
			
<?php endforeach ?>