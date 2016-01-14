<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EntpCustomer */

$this->title = 'New Customer';
$this->params['breadcrumbs'][] = ['label' => 'My Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
