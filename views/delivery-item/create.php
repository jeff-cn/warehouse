<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DeliveryItem */

$this->title = 'Create Delivery Item';
$this->params['breadcrumbs'][] = ['label' => 'Delivery Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
