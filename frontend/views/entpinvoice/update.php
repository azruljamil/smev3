<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntpInvoice */

$this->title = 'Update Invoice: ' . ' ' . $model->invoice_no;
$this->params['breadcrumbs'][] = ['label' => 'My Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->invoice_no, 'url' => ['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'invoice_id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entp-invoice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
