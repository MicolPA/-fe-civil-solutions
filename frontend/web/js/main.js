function questionType(){
    let slcQuestionType = document.getElementById('QuestionTypeSelect');
    let questionsType = slcQuestionType.value;


    if(questionsType == 1) {
        $('#lblQuestionType').removeClass('d-none');
    }else if(questionsType == 2){
        $('#lblQuestionType2').removeClass('d-none');
    }else{
        $('#lblQuestionType').addClass('d-none');
    }
}

function newAnswer(valor){

    let txtNewAnswer = document.getElementById('txtArea');
    var input = document.createElement("textarea");
    var button = document.getElementById('btnAgregarImagen');

    input.setAttribute('rows', 6);
	input.setAttribute('name', 'CorrectAnswer['+valor+']');
    input.setAttribute('class', 'form-control');
    input.setAttribute("required", true);
	
	valor = valor + 1;
    $(button).attr('onclick', 'newAnswer('+valor+');');

    txtNewAnswer.appendChild(input);
}

/* function deleteAnswer(){
    let txtNewAnswer = document.getElementById('txtArea');
    txtNewAnswer.setAttribute('class', 'd-none');
} */
