<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntpSupplier */

$this->title = 'Update Supplier: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'My Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'entrepreneur_id' => Yii::$app->user->id, 'supplier_id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entp-supplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
