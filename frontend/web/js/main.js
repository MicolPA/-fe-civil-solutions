function questionType(){
    let slcQuestionType = document.getElementById('QuestionTypeSelect');
    let questionsType = slcQuestionType.value;


    if(questionsType == 1) {
        $('#lblQuestionType').removeClass('d-none');
    }else{
        $('#lblQuestionType').addClass('d-none');
    }
}
/* function newAnswer(){
    let txtNewAnswer = document.getElementById('lblQuestionType');

    if(txtNewAnswer == 1) {
        var input = document.createElement("textarea");
        txtNewAnswer.appendChild(input);
    }else{

    }
}

function deleteAnswer(){
    let txtNewAnswer = document.getElementById('lblQuestionType');

    if(txtNewAnswer == 1) {
        $('#lblQuestionType').removeClass('d-none');
    }else{
        
    }
} */
