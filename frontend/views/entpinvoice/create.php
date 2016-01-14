<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EntpInvoice */

$this->title = 'New Invoice';
$this->params['breadcrumbs'][] = ['label' => 'My Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-invoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
