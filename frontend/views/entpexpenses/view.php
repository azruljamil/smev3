<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EntpExpenses */

$this->title = $model->expenses_id;
$this->params['breadcrumbs'][] = ['label' => 'My Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-expenses-view">

    <h1><?php //= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'entrepreneur_user_id' => Yii::$app->user->id, 'expenses_id' => $model->expenses_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'entrepreneur_user_id' => Yii::$app->user->id, 'expenses_id' => $model->expenses_id], [
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
                    //'expenses_id',
                    'expenses.total',
                    'expenses.reason',
                    'expenses.created_at:date',
                    'expenses.updated_at:date',
                ],
            ]) ?>
        </div>
    </div>

</div>
