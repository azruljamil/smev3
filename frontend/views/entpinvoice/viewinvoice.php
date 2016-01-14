<?php
/**
 * Created by PhpStorm.
 * User: Azrul APTinventions
 * Date: 12/01/2016
 * Time: 11:07
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
$this->title = "Invoice";
?>
<div class="entp-invoice-view">
    <p>
        <?= Html::a('Update', ['update', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Invoice Item', ['view', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Receipt', ['viewreceipt', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-warning']) ?>
    </p>

<div class="row">
    <div class="col-lg-6" align="left">
        <h3>#<?=$model->invoice->invoice_no; ?></h3>
        <h3>Invoice to:</h3>
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
    <div class="col-lg-6" align="right">
        <?= DetailView::widget([
            'model' => $model2,
            'attributes' => [
                //'entrepreneur_user_id',
                //'invoice_id',
                'name',
                'address',
                'address2',
                'telephone',
                'mobile',
                'website'

            ],
        ]) ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'entrepreneur_user_id',
                //'invoice_id',
                'invoice.invoice_no',
                'invoice.due_date',
                'invoice.bank_name',
                'invoice.account_no',
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
</div>