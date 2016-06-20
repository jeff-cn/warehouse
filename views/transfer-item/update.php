<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransferItem */

$this->title = 'Update Transfer Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transfer Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfer-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
