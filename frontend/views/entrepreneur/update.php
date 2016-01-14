<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Entrepreneur */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Entrepreneur',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entrepreneurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="entrepreneur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
