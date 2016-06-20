<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BoxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'barcode') ?>

    <?= $form->field($model, 'width') ?>

    <?= $form->field($model, 'height') ?>

    <?= $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'dislocation_warehouse_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
