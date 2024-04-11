<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Request;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class AdminRequestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $requests = Request::find()->all();

        $dataProvider =new ActiveDataProvider([
           'query'=> Request::find()->where(['status'=>0]),
        ]);


        return $this->render('index',[
            'dataProvider'=>  $dataProvider,
        ]);


    }

    public function actionConfirm($id)
    {
        $model = $this->findModel($id);
        $model->status = 1; // Устанавливаем статус "Подтверждена"
        $model->save(false); // Сохраняем без валидации

        return $this->redirect(['index']);
    }

    public function actionReject($id)
    {
        $model = $this->findModel($id);
        $model->status = 2; // Устанавливаем статус "Отклонена"
        $model->save(false); // Сохраняем без валидации

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Новых заявок нет.');
    }


}
