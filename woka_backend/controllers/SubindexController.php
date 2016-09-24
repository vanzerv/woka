<?php

namespace backend\controllers;

class SubindexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout="sub.php";
        return $this->render('index');
    }
}
