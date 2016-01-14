<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Lookup;

/* @var $this yii\web\View */
/* @var $model common\models\Entrepreneur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entrepreneur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'email')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'plkn')->dropDownList(Lookup::items('Plkn-Name'),['prompt'=>'Required to select PLKN']) ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
