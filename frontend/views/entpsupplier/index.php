<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Lookup;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntpSupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Supplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'value' => 'supplier.name'
            ],
            [
                'attribute' => 'address',
                'value' => 'supplier.address'
            ],
            [
                'attribute' => 'supplier.state',
                'filter'=>Html::activeDropDownList($searchModel,'state',Lookup::items('State-Name'),['class'=>'form-control','prompt'=>'Please select State']),
                'format'=>'raw',
                'value'=> function($model){
                    return $model->StateName();
                }
            ],
            [
                'attribute' => 'created at',
                'value' => 'supplier.created_at',
                'format' => 'date'
            ],
            [
                'attribute' => 'updated at',
                'value' => 'supplier.updated_at',
                'format' => 'date'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
