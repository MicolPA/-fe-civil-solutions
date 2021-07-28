<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;

class AdminController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        $this->layout = '@app/views/layouts/main-admin';
        return true;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
