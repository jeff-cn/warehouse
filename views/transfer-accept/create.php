<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TransferAccept */

$this->title = 'Create Transfer Accept';
$this->params['breadcrumbs'][] = ['label' => 'Transfer Accepts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-accept-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
