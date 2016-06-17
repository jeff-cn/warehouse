<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransferAccept */

$this->title = 'Update Transfer Accept: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transfer Accepts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfer-accept-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
