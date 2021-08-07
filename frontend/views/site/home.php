<?php

use app\models\Category;
use app\models\QuestionType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Questions */
/* @var $model2 app\models\Answers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
		<!-- div practice -->
	
	<div class="col-md-6">
		<?php $form = ActiveForm::begin(['enableClientScript' => false, 'action' => '/frontend/web/exam/generate-exam']); ?>
		    <div class="card p-4">
		    	<div class="row">
			    	<div class="col-md-12">
			    		<h4 class="mb-0">Exam</h4>
			    		<hr class="mt-3">
			    	</div>

			    	<div class="col-md-12">
			    		
				        <div class="card p-3">
				        	<div class="row" id="heading-2-3" data-toggle="collapse" role="button" data-target="#collapse-2-3" aria-expanded="false" aria-controls="collapse-2-3">
				        		<div class="col-md-10">
					        		<div class="">
									    <h6 class="mb-0"><i data-feather="unlock" class="mr-3"></i>See Categories</h6>
									</div>
					        	</div>
					        	<div class="col-md-2">
					        		<div class="">
									    <i class="fas fa-chevron-down"></i>
									</div>
					        	</div>
				            	
				        	</div>
				        </div>
				        <div id="collapse-2-3" class="collapse p-3" aria-labelledby="heading-2-3" data-parent="#accordion-2">
				        	<div class="row">
				        		<div class="col-md-12">
				        			<p class=" font-weight-bold small">Categories <span class="float-right small font-weight-bold">Amount of questions</span></p>
				        		</div>
				        	</div>
				            <?php foreach ($categories as $cat): ?>
					        <div class="row">	
					        	<div class="col-md-9">
					        		<div class="custom-control custom-checkbox">
									    <input type="checkbox" class="custom-control-input" name="category[<?= $cat->IdCategory ?>]" id="exam-cat<?= $cat->IdCategory ?>">
									    <label class="custom-control-label" for="exam-cat<?= $cat->IdCategory ?>"><?= $cat->Name ?></label>
									</div>
					        	</div>
					        	<div class="col-md-3">
					        		<div class="form-group">
									    <input type="number" name='count[<?= $cat->IdCategory ?>]' class="form-control form-control-sm input-question-count" placeholder="Questions" min='0' value='0'>
									</div>
					        	</div>
					        </div>
					        <?php endforeach ?>
				        </div>
			    	</div>
	        		<div class="col-md-9">
		        		<div class="p-3">
						    <p>Question total:</p>
						</div>
		        	</div>
		        	<div class="col-md-3">
		        		<div class="form-group">
						    <input type="number" class="form-control form-control-sm input-question-total" placeholder="Total" readonly required>
						</div>
		        	</div>
		        	<div class="col-md-9">
		        		<div class="p-3">
						    <p>Time (minutes):</p>
						</div>
		        	</div>
		        	<div class="col-md-3">
		        		<div class="form-group">
						    <input type="number" class="form-control form-control-sm" placeholder="Total" name="time" required>
						</div>
		        	</div>
			        <div class="col-md-12">
			        	<div class="form-group">
				        	<?= Html::submitButton('Generate exam', ['class' => 'btn btn-primary btn-sm btn-block']) ?>
				    	</div>
			        </div>
			    </div>
		    </div>
		    <input type="hidden" name="type" value="1">
		<!-- end of div exam -->
		<?php ActiveForm::end(); ?>
	</div>	
	<div class="col-md-6">
		<?php $form = ActiveForm::begin(['enableClientScript' => false, 'action' => '/frontend/web/exam/generate-exam']); ?>
		    <div class="card p-4">
		    	<div class="row">
			    	<div class="col-md-12">
			    		<h4 class="mb-0">Practice</h4>
			    		<hr class="mt-3">
			    	</div>

			    	<div class="col-md-12">
			    		
				        <div class="card p-3">
				        	<div class="row" id="heading-2-2" data-toggle="collapse" role="button" data-target="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
				        		<div class="col-md-10">
					        		<div class="">
									    <h6 class="mb-0"><i data-feather="unlock" class="mr-3"></i>See Categories</h6>
									</div>
					        	</div>
					        	<div class="col-md-2">
					        		<div class="">
									    <i class="fas fa-chevron-down"></i>
									</div>
					        	</div>
				            	
				        	</div>
				        </div>
				        <div id="collapse-2-2" class="collapse p-3" aria-labelledby="heading-2-2" data-parent="#accordion-2">
				        	<div class="row">
				        		<div class="col-md-12">
				        			<p class=" font-weight-bold small">Categories <span class="float-right small font-weight-bold">Amount of questions</span></p>
				        		</div>
				        	</div>
				            <?php foreach ($categories as $cat): ?>
					        <div class="row">	
					        	<div class="col-md-9">
					        		<div class="custom-control custom-checkbox">
									    <input type="checkbox" class="custom-control-input" name="category[<?= $cat->IdCategory ?>]" id="cat<?= $cat->IdCategory ?>">
									    <label class="custom-control-label" for="cat<?= $cat->IdCategory ?>"><?= $cat->Name ?></label>
									</div>
					        	</div>
					        	<div class="col-md-3">
					        		<div class="form-group">
									    <input type="number" name='count[<?= $cat->IdCategory ?>]' class="form-control form-control-sm input-question-count" placeholder="Questions" min='0' value='0'>
									</div>
					        	</div>
					        </div>
					        <?php endforeach ?>
				        </div>
			    	</div>
	        		<div class="col-md-9">
		        		<div class="p-3">
						    <p>Question total:</p>
						</div>
		        	</div>
		        	<div class="col-md-3">
		        		<div class="form-group">
						    <input type="number" class="form-control form-control-sm input-question-total" placeholder="Total" required readonly>
						</div>
		        	</div>
		        	<div class="col-md-9">
		        		<div class="p-3">
						    <p>Time (minutes):</p>
						</div>
		        	</div>
		        	<div class="col-md-3">
		        		<div class="form-group">
						    <input type="number" class="form-control form-control-sm" placeholder="Total" name="time" required>
						</div>
		        	</div>
		        	<input type="hidden" name="type" value="0">
			        <div class="col-md-12">
			        	<div class="form-group">
				        	<?= Html::submitButton('Generate exam', ['class' => 'btn btn-warning btn-sm btn-block']) ?>
				    	</div>
			        </div>
			    </div>
		    </div>
		<!-- end of div practice -->
		<?php ActiveForm::end(); ?>
	</div>
</div>

    


<script>
	setTimeout(function(){
		$(".input-question-count").bind('keyup', function(){
			count();
		});
		$(".input-question-count").on('change', function(){
			count();
		});


		function count(){
			suma = 0;
			$('.input-question-count').each(function(){
				n = $(this).val();
				console.log(n);
				if (! n > 0) {
					n = 0;
				}
				console.log(n);
		        suma += parseFloat(n);
		        console.log(suma);
		        // if (Number.isNaN(suma)) {
		        // 	suma = 0;
		        // }
				$(".input-question-total").val(suma);
			});
		}
	},500);


</script>
