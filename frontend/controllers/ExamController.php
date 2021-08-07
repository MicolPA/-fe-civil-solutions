<?php

namespace frontend\controllers;

use Yii;
use app\models\Category;
use app\models\Answers;
use app\models\Questions;
use frontend\models\Examlogs;
use frontend\models\ExamGenerated;
use frontend\models\ExamResults;
use yii\data\ActiveDataProvider;

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

        $result = $this->saveExamGenerated($cat_array, $post['time'], $post['type']);
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
        if (!$log = $this->getExamLog($id)) {
            return $this->redirect(['/site/home']);
        }
        $questions = $this->getQuestions($exam['Categories'], $exam['Count']);
        // print_r($questions);

        return $this->render('exam', [
            'id' => $id,
            'log' => $log,
            'questions' => $questions,
            'time' => $exam->Time,
        ]);
    }

    function getExamLog($id){
        $log = Examlogs::find()->where(['IdExam' => $id, 'FinishAt' => null, 'UserId' => Yii::$app->user->identity->id])->one();
        if ($log) {
            return $log;
            return null;
        }else{
            $log = new Examlogs();
            $log->IdExam = $id;
            $log->StartedAt = date("Y-m-d H:i:i");
            $log->FinishAt = null;
            $log->UserId = Yii::$app->user->identity->id;
            $log->save();
            return $log;
        }
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
                $answers = Answers::find()->where(['IdQuestion' => (int)$model->IdQuestion])->all();
                foreach ($answers as $a) {
                    if (trim($a->Answer) == trim($get['complete'])) {
                        $model->Correct = 1;
                    }
                }
            }else{
                $model->Correct = $get['multiple'];
            }
            $model->LogId = $get['log_id'];
            $model->UserId = Yii::$app->user->identity->id;
            $model->Date = date("Y-m-d H:i:s");
            $model->save();
            return \yii\helpers\Json::encode($get);
            
        }

    }

    function actionResults(){

        $get = Yii::$app->request->get();
        $log = Examlogs::findOne($get['log_id']);
        $infoExam = $this->getInfoExam($get['exam_id']);
        if (!$log->FinishAt) {
            $log->FinishAt = date("Y-m-d H:i:s");
            $log->save();
        }

        $grade = $this->getGrade($get['exam_id'], $get['log_id']);

        return $this->render('results', [
            'grade' => $grade,
            'infoExam' => $infoExam,
        ]);

    }

    function getInfoExam($exam_id){

        $data['exam'] = ExamGenerated::findOne($exam_id);
        $data['categories'] = explode(',', $data['exam']['Categories']);
        $data['count'] = explode(',', $data['exam']['Count']);

        return $data;
    }


    function getGrade($exam_id, $log_id){

        $data['correct'] = ExamResults::find()->where(['IdExam' => $exam_id, 'LogId' => $log_id, 'Correct' => 1])->count();
        $data['all'] = ExamResults::find()->where(['IdExam' => $exam_id, 'LogId' => $log_id])->count();
        return $data;

    }


    function actionHistory(){

        $query = Examlogs::find()->where(['UserId' => Yii::$app->user->identity->id])->orderBy(['id' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // $grade = $this->getGrade($get['exam_id'], $get['log_id']);

        return $this->render('history', [
            // 'grade' => $grade,
            'dataProvider' => $dataProvider,
        ]);

    }

}
