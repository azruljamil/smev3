<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Lookup;

/* @var $this yii\web\View */
/* @var $model common\models\EntpSupplier */

$this->title = $model->supplier->name;
$this->params['breadcrumbs'][] = ['label' => 'My Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-supplier-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'supplier_id' => $model->supplier_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'supplier_id' => $model->supplier_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                   // 'entrepreneur_id',
                   // 'supplier_id',
                   'supplier.name',
                   'supplier.address',
                   'supplier.telephone',
                   'supplier.district',
                   [
                       'attribute' => 'supplier.state',
                       'format'=>'raw',
                       'value'=> $model->StateName()

                   ],
                   'supplier.person',
                    'supplier.email',
                ],
            ]) ?>
        </div>
        <div class="col-lg-5">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'entrepreneur_id',
                    // 'supplier_id',
                    'supplier.fax',

                    'supplier.account_no',
                    'supplier.mobile',
                    'supplier.social_link',
                    'supplier.website',
                    'supplier.created_at:date',
                    'supplier.updated_at:date',
                ],
            ]) ?>
        </div>
    </div>

</div>
