<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Lookup;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>
    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'action'=>['signup','role'=>$model->role]

    ]); ?>
    <div class="row">
        <div class="col-lg-5">

            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'ic') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?php if($model->role == 'ENT'):?>
                <?= $form->field($model, 'plkn')->dropDownList(Lookup::items('Plkn-Name'),['prompt'=>'Required to select PLKN']) ?>
            <?php endif;?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'address') ?>
            <?= $form->field($model, 'address2') ?>
            <?= $form->field($model, 'postcode') ?>
            <?= $form->field($model, 'district') ?>
            <?= $form->field($model, 'state') ?>
            <?= $form->field($model, 'mobile') ?>
            <div class="form-group">
                <?= Html::submitButton('Sign-up', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>
