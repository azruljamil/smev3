<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Mentor */

$this->title = $model->user->profile->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mentors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php //= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <div class="row">
        <div class="col-lg-6">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="160px">{label}</th><td>{value}</td></tr>',
                'options'=>['class'=>'table table-striped'],
                'attributes' => [

                    [
                        'label'=>'Name',
                        'value'=> $model->user->profile->name,

                    ],
                    //'username',
                    'email',
                ],
            ]) ?>
        </div>
    </div>

    <h1>My Entrepreneur </h1>

    <div class="row">
        <div class="col-lg-9">
            <?=GridView::widget([
                'dataProvider'=>$dataProvider,
                'columns'=>[
                    //'mentor_id',
                    [
                        'label'=>'Name',
                        'value'=>function($model){
                            return $model->entrepreneur->name;
                        }
                    ],

                    [
                        'label'=>'PLKN',
                        'value'=>function($model){
                            return $model->entrepreneur->PusatName;
                        }
                    ],

                    [
                        'label'=>'Total Sales',
                        'format'=>['decimal',2],
                        'value'=>function($model){
                            return $model->entrepreneur->AllSales;
                        }
                    ],

                    [
                        'label'=>'Total Expenses',
                        'format'=>['decimal',2],
                        'value'=>function($model){
                            return $model->entrepreneur->AllExpenses;
                        }
                    ],

                    //'entrepreneur_id',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons'=>[
                            'deactivate'=>function ($url, $model, $key) {
                                $icon = Html::tag('span','',['class'=>'glyphicon glyphicon-trash']);
                                $linkUrl = Html::a($icon,['mentor/remove','mentor_id'=>$model->mentor_id,'id'=>$model->entrepreneur_user_id],['title'=>'Remove Entrepreneur','aria-label'=>'remove','data-pjax'=>'0']);
                                return $linkUrl;
                            }
                        ],
                        'template'=>'{deactivate}'
                        //'template'=>'{view}  {deactivate} {update} {delete}'
                    ]
                ]
            ])?>
        </div>
    </div>

</div>
