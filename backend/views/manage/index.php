<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Lookup;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Activate User'), '#', ['class' => 'btn btn-success', 'id'=>'activateUser']) ?>
        <?= Html::a(Yii::t('app', 'Deactivate User'), '#', ['class' => 'btn btn-danger', 'id'=>'deactivateUser']) ?>
        <?= Html::a(Yii::t('app', 'Assign as Mentor'), '#', ['class' => 'btn btn-warning', 'id'=>'assignedMentor']) ?>
    </p>

    <?= GridView::widget([
        'id'=>'userList',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            'name',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email',
            [
                'label'=>'Status',
                'attribute'=>'statusName',
                'filter'=>Html::activeDropDownList($searchModel,'status',Lookup::items('User-Status'),['class'=>'form-control','prompt'=>'Please select status'])
            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?= Html::beginForm(['activate'],'post',['class'=>'hidden','id'=>'user-activate-form'])?>

    <?=Html::hiddenInput('selected','',['id'=>'selected-value'])?>
    <?=Html::hiddenInput('action','',['id'=>'action-value'])?>

<?=Html::endForm()?>


<?php $this->beginBlock('JavascriptInit')?>
<script type="text/javascript">
    $(document).ready(function(){
       $('#activateUser').click(function(){
           var keys = $('#userList').yiiGridView('getSelectedRows');
           if(keys.length > 0)
           {
               $('#selected-value').val(keys);
               $('#action-value').val('<?=User::STATUS_ACTIVE?>');
               $('#user-activate-form').submit();
               alert(keys);
           }
           else
           {
               alert('Please select user to activate !!!');
           }

       });

        $('#deactivateUser').click(function(){
            var keys = $('#userList').yiiGridView('getSelectedRows');
            if(keys.length > 0)
            {
                $('#selected-value').val(keys);
                $('#action-value').val('<?=User::STATUS_INACTIVE?>');
                $('#user-activate-form').submit();
                //alert(keys);
            }
            else
            {
                alert('Please select user to deactivate !!!');
            }

        });

        $('#assignedMentor').click(function(){
            var keys = $('#userList').yiiGridView('getSelectedRows');
            if(keys.length > 0)
            {
                $('#selected-value').val(keys);
                $('#action-value').val('assignedAsMentor');
                $('#user-activate-form').submit();
                //alert(keys);
            }
            else
            {
                alert('Please select user to deactivate !!!');
            }

        });
    });
</script>
<?php $this->endBlock();?>
