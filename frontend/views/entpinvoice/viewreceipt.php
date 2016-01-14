<?php
/**
 * Created by PhpStorm.
 * User: Azrul APTinventions
 * Date: 12/01/2016
 * Time: 12:02
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
$this->title = "Receipt";
?>

<p>
    <?= Html::a('Update', ['update', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
    <?= Html::a('Invoice', ['viewinvoice', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Print', ['viewreceipt', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-warning']) ?>
</p>

<div class="row">
    <div class="col-lg-4">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'entrepreneur_user_id',
                //'invoice_id',
                'invoice.customer',
                'invoice.address',
                'invoice.telephone',
                'invoice.fax',
                'invoice.pic',
                'invoice.mobile',
            ],
        ]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?=GridView::widget([
            'dataProvider'=>$dataProvider,
            'summary'=> '',
            'columns'=>[
                //'mentor_id',
                [
                    'label'=>'Product',
                    'value'=>'item'
                ],

                [
                    'label'=>'Product Code',
                    'value'=>'code'
                ],

                [
                    'label'=>'Qty.',
                    'value'=>'qty'
                ],

                [
                    'label'=>'Price',
                    'format'=>['decimal',2],
                    'value'=>'price'
                ],

                [
                    'label'=>'Total',
                    'format'=>['decimal',2],
                    'value'=> function ($model)
                    {
                        return $allvalue = $model->price * $model->qty;
                    }

                ]
            ]
        ])?>
    </div>
</div>
