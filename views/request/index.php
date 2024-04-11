<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            'description:ntext',
            'number_car',
            [
                     'attribute'=>'status',
                        'value'=> function($model){
                            switch ($model->status){
                                case 0:
                                    return'Новая';
                                case 1:
                                    return 'Одобренна';
                                case 2:
                                    return 'Отказана';
                                 default:
                                     return 'Неизвестный статус';
                            }

                        }

            ],


            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
