<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\Application;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class ApplicationController extends Controller
{
   
     public function actionCreate()
    {
        $model = new Application();
        $rawData = Yii::$app->request->getRawBody(); 
        $data = json_decode($rawData, true); 

        if (!$data) {
            return ['status' => 'error', 'message' => 'Invalid JSON input'];
        }

        if ($model->load($data, '') && $model->validate() && $model->save()) {
            return ['status' => 'success', 'data' => $model];
        }

        return ['status' => 'error', 'errors' => $model->errors];
    }


   
    public function actionUpdate($id)
    {
        $model = Application::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Application not found');
        }

        $rawData = Yii::$app->request->getRawBody(); 
        $data = json_decode($rawData, true);

        if (!$data) {
            return ['status' => 'error', 'message' => 'Invalid JSON input'];
        }

        if ($model->load($data, '') && $model->validate() && $model->save()) {
            return ['status' => 'success', 'data' => $model];
        }

        return ['status' => 'error', 'errors' => $model->errors];
    }

}
