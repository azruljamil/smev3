<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EntpSales */

$this->title = 'New Sales';
$this->params['breadcrumbs'][] = ['label' => 'Entp Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-sales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
