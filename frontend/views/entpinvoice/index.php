<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntpInvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Invoice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'entrepreneur_user_id',
            //'invoice_id',
            [
                'attribute' => 'invoice_no',
                'value' => 'invoice.invoice_no'
            ],
            [
                'attribute' => 'created_at',
                'value' => 'invoice.created_at',
                'format' => 'date'
            ],
            [
                'attribute' => 'updated_at',
                'value' => 'invoice.updated_at',
                'format' => 'date'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>
