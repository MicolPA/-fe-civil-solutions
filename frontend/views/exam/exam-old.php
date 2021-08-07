<?php 

use app\models\Answers;


$i = 0; 


?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="font-weight-light h1">Exam <span class="float-right h5 mt-3 bg-warning pl-3 pr-3">Time left: <span id="time">05:02 min</span></span></h2>
		</div>
	</div>

	<div class="row">
		
	</div>

	<div class="row" id="accordion">
		<?php foreach ($questions as $question_category): ?>
			<?php foreach ($question_category as $q): ?>
				<?php $i++ ?>
				<div class="col-md-12">
					<div class="card">
					    <div class="card-header" id="headingOne<?= $i ?>">
					      <h5 class="mb-0">
					        <p class="font-10 mb-0">Question #<?= $i ?> <span class="float-right badge bg-info text-white font-10"><?= $q->idCategory->Name ?></span></p>
					        <hr class="mt-3 mb-1">
					        <p class="font-weight-bold h6"><?= $q->Question ?></p>
					      </h5>
					    </div>

				      	<div class="card-body">
					        <?php if ($q['Image']): ?>
					            <img src="/frontend/web/<?= $q['Image'] ?>" class='mb-2' width='500px' style='max-width: 100%;'>
					        <?php endif ?>
					        <?php if ($q->IdQuestionType == 2): ?>
						        <?php $answers = Answers::find()->where(['IdQuestion' => $q->IdQuestion])->all() ?>

						        <?php foreach ($answers as $a): ?>
						       		<label class="w-100" for="customRadio<?= $a->IdAnswer ?>">
						       			<div class=" border rounded p-2 mb-2">
							       			<div class="custom-control custom-radio">
											  <input type="radio" id="customRadio<?= $a->IdAnswer ?>" name="answer[<?= $a->IdQuestion ?>]" class="custom-control-input">
											  <label class="custom-control-label" for="customRadio<?= $a->IdAnswer ?>"><?= $a->Answer ?></label>
											</div>
							       		</div>
						       		</label>
						        <?php endforeach ?>
						    <?php else: ?>
						    	<input type="text" class='form-control' name="answer[<?= $q->IdQuestion ?>]" placeholder='Answer here'>
					        <?php endif ?>
				      	</div>
					</div>
				</div>
						
			<?php endforeach ?>
		<?php endforeach ?>
	</div>



</div>

<script>
   (function () {
      function countdown( elementName, minutes, seconds)
        {
            var element, endTime, hours, mins, msLeft, time;

            function twoDigits( n )
            {
                return (n <= 9 ? "0" + n : n);
            }

            function updateTimer()
            {
                msLeft = endTime - (+new Date);
                if ( msLeft < 1000 ) {
                    element.innerHTML = "Tiempo terminado";
                    document.getElementById("finishtime").value = "1"; 
                    document.getElementById("form-exam").submit();
                } else {
                    time = new Date( msLeft );
                    hours = time.getUTCHours();
                    mins = time.getUTCMinutes();
                    element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
                    setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
                }
            }

            element = document.getElementById( elementName );
            endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
            updateTimer();
        }

        countdown( "time", <?= $time ?>, 0 );

  }());
</script>