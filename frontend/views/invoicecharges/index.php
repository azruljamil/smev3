<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InvoiceChargesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoice Charges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-charges-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Invoice Charges', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'invoice_id',
            'diskaun',
            'shipping',
            'gst',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
