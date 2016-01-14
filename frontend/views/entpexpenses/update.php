<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EntpExpenses */

$this->title = 'Update Expenses: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'entrepreneur_id' => Yii::$app->user->id, 'expenses_id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entp-expenses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
