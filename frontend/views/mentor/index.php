<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MentorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mentors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //  echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?php //= Html::a(Yii::t('app', 'Create Mentor'), ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        //'tableOptions'=>['class'=>'table table-striped'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            [
//                'attribute'=>'name',
//                'headerOptions'=>['width'=>'250px']
//            ],
            'name',
            'email',
            [
                'label'=>'Total Entr.',
                'attribute'=>'entCount',
                'format'=>'raw'
            ],


//            [
//                'class' => 'yii\grid\ActionColumn',
//                'buttons'=>[
//                    'deactivate'=>function ($url, $model, $key) {
//                        $icon = Html::tag('span','',['class'=>'glyphicon glyphicon-warning-sign']);
//                        $linkUrl = Html::a($icon,['deactivate','id'=>$model->user_id],['title'=>'deactivate','aria-label'=>'Deactivate','data-pjax'=>'0']);
//                        return $linkUrl;
//                    }
//                ],
//
//                //'template'=>'{view}  {deactivate} {update} {delete}'
//            ],
        ],
    ]); ?>

</div>
