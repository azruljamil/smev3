<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EntpProduct */

$this->title = $model->product->product;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'product_id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'product_id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-lg-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'entrepreneur_id',
                    //'product_id',
                    'product.product',
                    'product.code',
                    'product.qty',
                    'product.price',
                    'product.created_at:date',
                    'product.updated_at:date',
                ],
            ]) ?>
        </div>
    </div>

</div>
