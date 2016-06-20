<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address_street')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address_city')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address_state')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address_zip')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address_country')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
