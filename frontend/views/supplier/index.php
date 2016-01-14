<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Supplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'entrepreneur_id',
//            [
//                'label'=>'Name',
//                'value'=>function($model){
//                    return $model->entrepreneur->name;
//                }
//            ],
//            //'supplier_id',
//            [
//                'label'=>'Supplier',
//                'attribute'=>'supName',
//                'format'=>'raw'
//            ],

            [
                'attribute' => 'name',
                'value' => 'supplier.name'
            ],
            [
                'attribute' => 'address',
                'value' => 'supplier.address'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
