<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Lookup;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Select My Entrepreneur');
$this->params['breadcrumbs'][] =  $this->title;
$mr =  Yii::$app->user->id;
//$mr;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title); ?> </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::a(Yii::t('app', 'Select Entrepreneur'), '#', ['class' => 'btn btn-success', 'id'=>'selectUser']) ?>


    </p>

    <?= GridView::widget([
        'id'=>'entrepreneurList',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'class' => 'yii\grid\CheckboxColumn',
//                'checkboxOptions' => function ($model) {
//                    return ['value'=>  $model->user_id, 'id'=>'check'];
//                }

            ],
            'name',
            [
                'attribute' => 'plkn',
                'filter'=>Html::activeDropDownList($searchModel,'plkn',Lookup::items('Plkn-Name'),['class'=>'form-control','prompt'=>'Please select PLKN']),
                'format'=>'raw',
                'value'=> function($model){
                    return $model->NamePlkn();
                },
                'headerOptions'=>['width'=>'380px']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?= Html::beginForm(['addmentorentrepreneur'],'post',['class'=>'hidden','id'=>'user-activate-form'])?>

<?=Html::hiddenInput('selected','',['id'=>'selected-value'])?>
<?=Html::hiddenInput('mentor','',['id'=>'mentor-value'])?>

<?=Html::endForm()?>


<?php $this->beginBlock('JavascriptInit')?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#selectUser').click(function(){
            var keys = $('#entrepreneurList').yiiGridView('getSelectedRows');
            if(keys.length > 0)
            {
                $('#selected-value').val(keys);
                $('#mentor-value').val('<?php echo $mr ?>');
                $('#user-activate-form').submit();
                //alert(keys);
                //alert(<?php //echo $mr ?>);
                //window.stop();
            }
            else
            {
                alert('Please select entrepreneur !!!');
            }

        });
    });
</script>
<?php $this->endBlock();?>
