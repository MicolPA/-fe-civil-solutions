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
    var input = document.createElement("textarea");
    var button = document.getElementById('btnNewAnswer');

    input.setAttribute('rows', 6);
	input.setAttribute('name', 'CorrectAnswer['+valor+']');
    input.setAttribute('class', 'form-control');
    input.setAttribute("required", true);
	
	valor = valor + 1;
    $(button).attr('onclick', 'newAnswerComplete('+valor+');');

    txtNewAnswer.appendChild(input);
}

function newAnswerMultiple(valor){

    let txtNewAnswer = document.getElementById('txtArea2');
    var input = document.createElement("input");
    var input2 = document.createElement("input");
    var button = document.getElementById('btnNewAnswer');

    input2.setAttribute('name', 'multiple');
    input2.setAttribute('class', 'form-check-input');
    input2.setAttribute('type', 'radio');
    input2.setAttribute('value', 'radio['+valor+']');

	input.setAttribute('name', 'CorrectAnswer['+valor+']');
    input.setAttribute('class', 'form-control');
    input.setAttribute("required", true);

    

	valor = valor + 1;
    $(button).attr('onclick', 'newAnswerMultiple('+valor+');');
    
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


/* function deleteAnswer(){
    let txtNewAnswer = document.getElementById('txtArea');
    txtNewAnswer.setAttribute('class', 'd-none');
} */
