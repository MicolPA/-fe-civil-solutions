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
        $searchModel = new QuestionsSearch();
        $dataProvider = $searchModel->search($IdCategory);

        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
                
                return $this->redirect(['create',
                    'IdCategory' => $IdCategory,
                ]);  
            }
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
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IdQuestion]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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

    protected function subirFoto(Questions $model) 
    {

            $model->archivo = UploadedFile::getInstance($model, 'archivo');

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
                $model2 = new Answers();

                $model2->IdQuestion = $model->IdQuestion;
                $model2->Answer = $post["CorrectAnswer"][$i];
                $correct = $post['multiple'];
                if(isset([$correct]['$1'])){
                        $model2->CorrectAnswer = '1';
                }else{
                    $model2->CorrectAnswer = '0';
                }                
                if(!$model2->save()){
                    print_r($model2->errors);
                    exit;
                }
            }
            
        }
    }
}

