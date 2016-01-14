<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntpCustomer */

$this->title = 'Update Customer: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'My Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'entrepreneur_user_id' => Yii::$app->user->id, 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entp-customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
