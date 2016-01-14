<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Lookup;

/* @var $this yii\web\View */
/* @var $model common\models\EntpSupplier */
/* @var $form yii\widgets\ActiveForm */
$me = Yii::$app->user->id;
?>

<div class="entp-supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'entrepreneur')->textInput(['value'=>$me])->label(false) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'address')->textInput() ?>

    <?= $form->field($model, 'postcode')->textInput() ?>

    <?= $form->field($model, 'district')->textInput() ?>

    <?= $form->field($model, 'state')->dropDownList(Lookup::items('State-Name'),['prompt'=>'Required to select State']) ?>

    <?= $form->field($model, 'telephone')->textInput() ?>

    <?= $form->field($model, 'fax')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'account_no')->textInput() ?>

    <?= $form->field($model, 'person')->textInput() ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'social_link')->textInput() ?>

    <?= $form->field($model, 'website')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
