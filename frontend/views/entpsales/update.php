<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntpSales */

$this->title = 'Update Sales: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'entrepreneur_id' => Yii::$app->user->id, 'sales_id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entp-sales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
