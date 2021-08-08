jQuery('input[type=file]').change(function(){
    // console.log('aqui');
    var filename = jQuery(this).val().split('\\').pop();
    var idname = jQuery(this).attr('id');
    console.log(jQuery(this));
    console.log(filename);
    console.log(idname);
    jQuery('div.field-'+idname+' label').html("<span class='text-success font-12'>CARGADA</span>");
    // jQuery('div.field-'+idname+' label').attr("style", 'padding-left:1rem !important;padding-right: 1rem !important');
});

function questionLimit(){
    swal({
        title: "Opps!",
        text: "You can't add more questions to this category. Limit reached.",
        icon: "error"
      });
}

function questionType(){
    let slcQuestionType = document.getElementById('QuestionTypeSelect');
    let questionsType = slcQuestionType.value;

    if(questionsType == 1) {
        $('#lblQuestionType').removeClass('d-none');
        $('#lblQuestionType2').addClass('d-none');
    }else if(questionsType == 2){
        $('#lblQuestionType').addClass('d-none');
        $('#lblQuestionType2').removeClass('d-none');
    }else{
        $('#lblQuestionType').addClass('d-none');
    }
}

function newAnswerComplete(valor){

    let txtNewAnswer = document.getElementById('txtArea');
    var input = document.createElement("input");
    var button = document.getElementById('btnNewAnswer');

    input.setAttribute('placeholder', 'Answer');
	input.setAttribute('name', 'CorrectAnswer['+valor+']');
    input.setAttribute('class', 'form-control mt-2');
    input.setAttribute("required", true);
	
	valor = valor + 1;
    $(button).attr('onclick', 'newAnswerComplete('+valor+');');

    txtNewAnswer.appendChild(input);
}

function newAnswerMultiple(valor){

    let txtNewAnswer = document.getElementById('txtArea2');
    var input = document.createElement("input");
    var input2 = document.createElement("input");

    // input2.setAttribute('name', 'multiple['+valor+']');
    input2.setAttribute('name', 'multiple');
    input2.setAttribute('value', valor);
    input2.setAttribute('class', 'form-check-input mt-2');
    input2.setAttribute('type', 'radio');

	input.setAttribute('name', 'CorrectAnswer['+valor+']');
    input.setAttribute('class', 'form-control mt-2');
    input.setAttribute("required", true);
    input.setAttribute("placeholder", 'Answer');
	
    valor = valor + 1;
    $("#btnNewAnswer2").attr('onclick', 'newAnswerMultiple('+valor+');');

    txtNewAnswer.appendChild(input2);
    txtNewAnswer.appendChild(input);

}

function showImg(url){
    swal({
        title: "",
        text: '',
        icon: url,
      });

}

function countdown( elementName, minutes, seconds){

    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "Time out";
            // document.getElementById("finishtime").value = "1"; 
            document.getElementById("form-test").submit();
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60 * minutes + seconds) + 500;
    updateTimer();
}


function checkAnswer(){

    limit = parseInt($("#total").val());
    current = parseInt($("#current").val());
    id = current + 1;
    $("#current").val(id);
    // console.log(current);
    // console.log(id);
    // console.log(limit);

    if (id == limit) {
        setTimeout(function(){
            $("#nextButton").val('Finish Test');
        },500)
    }

    getAnswerInfo(current);
    //$("#customRadio42").is(':checked')

}


function getAnswerInfo(question_pos){

    multiple = null;
    complete = null;
    question_id = $(".question_"+question_pos).val();
    question_type = $(".question_type_"+question_pos).val();

    if (question_type == 2) {
        if($("#content_"+question_pos+" .correct").is(':checked')) {
            multiple = 1;
            // swal('Correcto', 'Respuesta correcta', 'success');
        }else{
            multiple = 0;
            // swal('Incorrecto', 'Respuesta incorrecta', 'error');
        }
    }else{
        complete = $(".answer_" + question_pos).val();
    }

    saveAnswer(question_id, question_type, multiple, complete);
    // console.log(question_pos);
    // console.log(question_type);
    // console.log(multiple);
    // console.log(complete);
}


function saveAnswer(question_id, question_type, multiple, complete){
    $.ajax({
        url: "/frontend/web/exam/save-answer",
        type: 'get',
        dataType: 'json',
        data: {
            question_id: question_id,
            question_type: question_type,
            multiple: multiple,
            complete: complete,
            exam_id: $("#exam_id").val(),
            log_id: $("#log_id").val(),
            _csrf: "<?=Yii::$app->request->getCsrfToken()?>"
        },
        success: function (data) {

            console.log(data);

        }, error: function (xhr, ajaxOptions, thrownError){
            console.log(thrownError);
            console.log(xhr);
            console.log(ajaxOptions);
        }
    });
}

/* function deleteAnswer(){
    let txtNewAnswer = document.getElementById('txtArea');
    txtNewAnswer.setAttribute('class', 'd-none');
} */
