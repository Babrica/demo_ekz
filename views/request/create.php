<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */

$this->title = 'Create Request';
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">

    <h1><?= Html::encode($this->title) ?></h1>

   <div class="request-form">
       <?php $form = \yii\widgets\ActiveForm::begin()?>
            <?= $form->field($model,'description')->textInput(['maxlength'=>true]) ?>
         <?= $form->field($model,'number_car')->textInput(['maxlength'=>true])   ?>


       <div class="form-group">
           <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
       </div>

       <?php \yii\widgets\ActiveForm::end() ?>

   </div>
</div>
