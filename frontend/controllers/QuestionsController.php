<?php

namespace frontend\controllers;

use app\models\Questions;
use app\models\Answers;
use app\models\Category;
use app\models\QuestionsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;

/**
 * QuestionsController implements the CRUD actions for Questions model.
 */
class QuestionsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Questions models.
     * @return mixed
     */
    public function actionIndex($IdCategory)
    {
        $this->layout = '@app/views/layouts/main-admin';

        $create = false;
        $cat = Category::findOne($IdCategory);
        $count = Questions::find()->where(['IdCategory' => $IdCategory])->count();   

        if ($count < $cat['Limit']) {
            $create = true;
        }
        $searchModel = new QuestionsSearch();
        $dataProvider = $searchModel->search($IdCategory);

        return $this->render('index', [
            'create' => $create,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'IdCategory' => $IdCategory,
        ]);
    }

    /**
     * Displays a single Questions model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = '@app/views/layouts/main-admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Questions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate($IdCategory)
    {
        $this->layout = '@app/views/layouts/main-admin';
        $this->questionLimit($IdCategory);

        $model = new Questions();
        $model2 = new Answers();
        $post = $this->request->post();
        $model->IdCategory = $IdCategory; 

        if ($this->request->isPost) {
            
            if ($model->load($post)) {
                $model->IdCategory = $IdCategory;    
            
            if(!$model->save()){
                    print_r($model->errors);
                }
                if($model->IdQuestionType == 1){
                    $this->actionSaveAnswers($post, $model);

                }else if($model->IdQuestionType == 2){
                    $this->actionSaveAnswers($post, $model);

                }
                
                $this->subirFoto($model);
            }

            Yii::$app->session->setFlash('success1', "Question saved successfully");
            return $this->redirect(['create', 'IdCategory' => $IdCategory ]); 
        } else {
            $model->loadDefaultValues();
            $model2->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'model2' => $model2,
            'IdCategory' => $IdCategory,

        ]);
    }

    
    /**
     * Updates an existing Questions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = $this->findModel($id);

        $old_url = $model->Image;
        if ($this->request->isPost && $model->load($this->request->post())) {
            if (UploadedFile::getInstance($model, 'archivo')) {
                $this->subirFoto($model, 1);
            }else{
                $model->Image = $old_url;
            }

            $model->save(false);
            return $this->redirect(['index', 'IdCategory' => $model->IdCategory]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Questions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = '@app/views/layouts/main-admin';
        $model = $this->findModel($id);
        $cat = $model->IdCategory;
        $model->delete();
        
        Yii::$app->session->setFlash('success1', "Question deleted successfully");
        return $this->redirect(['index', 'IdCategory' => $cat]);
    }

    /**
     * Finds the Questions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Questions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirFoto(Questions $model, $type=1) 
    {

        if ($type == 1) {
            $model->archivo = UploadedFile::getInstance($model, 'archivo');
        }else{
            $model->archivo = UploadedFile::getInstance($model, 'archivo');
        }

            if($model->archivo){
                $imageRute = 'images/' .time()."_".$model->archivo->baseName.".".$model->archivo->extension;
                if( $model->archivo->saveAs($imageRute)){
                    $model->Image = $imageRute;

                }
            }

        $model->save(false);
    }

    protected function questionLimit($IdCategory){
        $count = Questions::find()
        ->where(['IdCategory' => $IdCategory])
        ->count();    
        
        $limit = Category::find()
        ->select('Limit')
        ->where(['IdCategory' => $IdCategory])
        ->one();
         
        if($count >= $limit->Limit){
            return $this->redirect(['index',
            'IdCategory' => $IdCategory,
        ]); 
        }

    }

    protected function actionSaveAnswers($post, $model){
        for ($i=0; $i <= count($post["CorrectAnswer"]); $i++) { 
                    
            if (isset($post["CorrectAnswer"][$i])) {
                if ($post["CorrectAnswer"][$i]) {
                    $model2 = new Answers();

                    $model2->IdQuestion = $model->IdQuestion;
                    $model2->Answer = $post["CorrectAnswer"][$i];
                    $correct = $post['multiple'];

                    if ($model->IdQuestionType == 2) {
                         if($post['multiple'] == $i){
                            $model2->CorrectAnswer = '1';
                        }else{
                            $model2->CorrectAnswer = '0';
                        }               
                    }               
                    if(!$model2->save()){
                        print_r($model2->errors);
                        exit;
                    }
                }
            }
            
        }

    }
}

