<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntpExpensesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Expenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-expenses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Expenses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'entrepreneur_id',
            //'expenses_id',
            [
                'attribute' => 'total',
                'value' => 'expenses.total',
                'format' => ['decimal',2],
                'headerOptions'=>['width'=>'250px']
            ],
            [
                'label' => 'Description',
                'attribute' => 'reason',
                'value' => 'expenses.reason',
                'headerOptions'=>['width'=>'350px']
            ],
            [
                'attribute' => 'expenses Date',
                'value' => 'expenses.created_at',
                'format' => 'date',
                'headerOptions'=>['width'=>'200px']
            ],
            [
                'attribute' => 'expenses Updated',
                'value' => 'expenses.updated_at',
                'format' => 'date',
                'headerOptions'=>['width'=>'200px']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
