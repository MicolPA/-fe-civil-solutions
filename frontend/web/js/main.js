function questionType(){
    let slcQuestionType = document.getElementById('QuestionTypeSelect');
    let questionsType = slcQuestionType.value;


    if(questionsType == 1) {
        $('#lblQuestionType').removeClass('d-none');
    }else{
        $('#lblQuestionType').addClass('d-none');
    }
}

