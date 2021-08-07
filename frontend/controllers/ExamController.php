<?php

namespace frontend\controllers;

use Yii;
use app\models\Category;
use app\models\Answers;
use app\models\Questions;
use frontend\models\ExamGenerated;
use frontend\models\ExamResults;

class ExamController extends \yii\web\Controller
{
    

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionGenerateExam(){

        $categories = Category::find()->all();
        $post = Yii::$app->request->post();
        $cat_array['categories_id'] = array();
        $cat_array['categories_count'] = array();

        foreach ($categories as $cat) {

            if (isset($post['category'][$cat->IdCategory]) and $post['count'][$cat->IdCategory]) {
                
                $cat_array['categories_id'][] = $cat->IdCategory;
                $cat_array['categories_count'][] = $post['count'][$cat->IdCategory];

            }
        }

        $result = $this->saveExamGenerated($cat_array, $post['time'], 1);
        if ($result) {
            $this->redirect(['start', 'id' => $result]);
        }else{
            $this->redirect(['/site/home']);
        }

    }


    function saveExamGenerated($data, $time, $type){
        $model = new ExamGenerated();

        $model->Categories = implode(',', $data['categories_id']);
        $model->Count = implode(',', $data['categories_count']);
        $model->Time = $time;
        $model->Type = $type;
        $model->UserId = Yii::$app->user->identity->id;
        $model->Date = date("Y/m/d H:i:s");
        return $model->save() ? $model->Id : false;
    }


    function actionStart($id){
        
        $exam = ExamGenerated::findOne($id);
        $questions = $this->getQuestions($exam['Categories'], $exam['Count']);
        // print_r($questions);

        return $this->render('exam', [
            'id' => $id,
            'questions' => $questions,
            'time' => $exam->Time,
        ]);
    }

    function getQuestions($categories, $count){

        $categories = explode(',', $categories);
        $count = explode(',', $count);
        $questions = array();

        for ($i = 0; $i < count($categories); $i++) {
            if (isset($categories[$i]) and isset($count[$i])) {
                $questions[] = Questions::find()->where(['IdCategory' => $categories[$i]])->orderBy([ 'rand()' => SORT_DESC])->limit($count[$i])->all();
            }
        }

        return $questions;
    }


    function actionSaveAnswer(){

        $get = Yii::$app->request->get();
        if (Yii::$app->request->isAjax) {

            $exam = ExamGenerated::findOne($get['exam_id']);
            $model = new ExamResults();
            $model->IdExam = $get['exam_id'];
            $model->IdQuestion = $get['question_id'];
            $model->IdQuestionType = $get['question_type'];
            if ($model->IdQuestionType == 1) {
                $answers = Answers::find()->where(['IdQuestion' => $model->IdQuestion])->all();
                foreach ($answers as $a) {
                    if (trim($a->Answer) == trim($get['complete'])) {
                        $model->Correct = 1;
                    }
                }
            }else{
                $model->Correct = $get['multiple'];
            }

            $model->UserId = Yii::$app->user->identity->id;
            $model->Date = date("Y-m-d H:i:s");
            $model->save();
            return \yii\helpers\Json::encode($model->errors);
            
        }

    }

    function actionResults(){

    }

}
