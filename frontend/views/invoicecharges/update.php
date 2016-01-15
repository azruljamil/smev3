<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InvoiceCharges */

$this->title = 'Update Invoice Charges: ' . ' ' . $model->invoice_id;
$this->params['breadcrumbs'][] = ['label' => 'Invoice Charges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->invoice_id, 'url' => ['view', 'id' => $model->invoice_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invoice-charges-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
