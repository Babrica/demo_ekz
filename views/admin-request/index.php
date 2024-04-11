
<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Админ Панель Принятие заявок';

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'attribute' => 'user.fio', // Используйте "user.fio" для получения ФИО из связанной модели User
            'value' => function ($model) {
                return $model->user ? $model->user->fio : null;
            },

        ],
        'description',
        'number_car',
        [
            'attribute' => 'status',
            'value' => function ($model) {
                switch ($model->status) {
                    case 0:
                        return 'Новая';
                    case 1:
                        return 'Подтверждена';
                    case 2:
                        return 'Отклонена';
                    default:
                        return 'Неизвестный статус';
                }
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{confirm} {reject}',
            'buttons' => [
                'confirm' => function ($url, $model, $key) {
                    return Html::a('Подтвердить', ['confirm', 'id' => $model->id], ['class' => 'btn btn-success']);
                },
                'reject' => function ($url, $model, $key) {
                    return Html::a('Отклонить', ['reject', 'id' => $model->id], ['class' => 'btn btn-danger']);
                },
            ],
        ],
    ],
]); ?>
