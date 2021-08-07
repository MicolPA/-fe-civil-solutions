<?php 

use app\models\Answers;

$i = 0; 
?>

<style>
	.border {
    	border: 1px solid #50b5ff !important;
	}
	label{
		color: #444;
	}
</style>
<form action='results' id='form-test'>
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="font-weight-light h1">Exam <span class="float-right h5 mt-3"><i class="fas fa-stopwatch"></i> Time left: <span id="time"><?= $time ?> min.</span></span></h2>
		</div>
	</div>
	<div class="list-wrapper row">
		<?php foreach ($questions as $question_category): ?>
				<?php foreach ($question_category as $q): ?>
					<?php $i++ ?>
					<div class="col-md-12 list-item">
						<div class="card">
						    <div class="card-header" id="headingOne<?= $i ?>">
						      <h5 class="mb-0">
						        <p class="font-10 mb-0 mt-1">Question #<?= $i ?> <span class="float-right badge bg-info text-white font-10"><?= $q->idCategory->Name ?></span></p>
						        <p class="font-weight-bold h5 mt-3"><?= $q->Question ?></p>
						      </h5>
						    </div>

					      	<div class="card-body">
						        <?php if ($q['Image']): ?>
						            <img src="/frontend/web/<?= $q['Image'] ?>" class='mb-2' width='500px' style='max-width: 100%;'>
						        <?php endif ?>
							     <?php $answers = Answers::find()->where(['IdQuestion' => $q->IdQuestion])->orderBy([ 'rand()' => SORT_DESC])->all() ?>
						        <?php if ($q->IdQuestionType == 2): ?>

							        <?php foreach ($answers as $a): ?>
							       		<label class="w-100" for="customRadio<?= $a->IdAnswer ?>">
							       			<div class=" border rounded p-2 mb-2">
								       			<div class="custom-control custom-radio" id="content_<?= $i ?>">
												  <input type="radio" id="customRadio<?= $a->IdAnswer ?>" name="answer[<?= $a->IdQuestion ?>]" class="custom-control-input radio-answer <?= $a->CorrectAnswer ? 'correct' : 'wrong' ?>" value>
												  <label class="custom-control-label" for="customRadio<?= $a->IdAnswer ?>"><?= $a->Answer ?></label>
												</div>
								       		</div>
							       		</label>
							        <?php endforeach ?>
							    <?php else: ?>
							    	<input type="text" class='form-control answer_<?= $i ?>' name="answer[<?= $q->IdQuestion ?>]" placeholder='Answer here'>
							    	<?php foreach ($answers as $a): ?>
							       		<input type="hidden" name="answer[]" value="<?= $a->Answer ?>">
							        <?php endforeach ?>
						        <?php endif ?>

						        <input type="hidden" class='question_<?= $i ?>' name='Question[<?= $q->IdQuestion ?>' value="<?= $q->IdQuestion ?>">
						        <input type="hidden" class='question_type_<?= $i ?>' value="<?= $q->IdQuestionType ?>">
					      	</div>
						</div>
					</div>
							
				<?php endforeach ?>
			<?php endforeach ?>
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="pagination-container" class="pagination"></div>
		</div>
	</div>
</div>
<input type="hidden" name='total' id='total' value="<?= $i ?>">
<input type="hidden" id='current' value="1">
<input type="hidden" name='exam_id' id='exam_id' value="<?= $id ?>">
<input type="hidden" name='log_id' id='log_id' value="<?= $log->Id ?>">
</form>
<?= $this->render('_modal') ?>


<script>
	// jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

	function startExam(){
	    $('#staticBackdrop').modal('toggle');
  		countdown( "time", <?= $time ?>, 0 );
	  }

	setTimeout(function(){
		
		$('#staticBackdrop').modal();

		var items = $(".list-wrapper .list-item");
	    var numItems = items.length;
	    var perPage = 1;

	    items.slice(perPage).hide();

	    $('#pagination-container').pagination({
	        items: numItems,
	        itemsOnPage: perPage,
	        prevText: "&laquo;",
	        // nextText: "&raquo;",
	        nextText: "<input class='btn bg-success-2 btn-xs text-white pt-2 pb-2 pr-5 pl-5 font-14' id='nextButton' onClick='checkAnswer()' type='submit' value = 'Next'>",
	        onPageClick: function (pageNumber) {
	            var showFrom = perPage * (pageNumber - 1);
	            var showTo = showFrom + perPage;
	            items.hide().slice(showFrom, showTo).show();
	        }
    	});

    	
	},1000)



</script>