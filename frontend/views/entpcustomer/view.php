<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EntpCustomer */

$this->title = $model->customer->name;
$this->params['breadcrumbs'][] = ['label' => 'My Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'entrepreneur_user_id' => Yii::$app->user->id, 'customer_id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'entrepreneur_user_id' => Yii::$app->user->id, 'customer_id' => $model->customer_id], [
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
                    //'entrepreneur_user_id',
                    //'customer_id',
                    'customer.name',
                    'customer.pic',
                    'customer.telephone',
                    'customer.mobile',
                    'customer.email',
                ],
            ]) ?>
        </div>
    </div>

</div>
