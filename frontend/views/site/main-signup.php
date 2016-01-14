<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\Lookup;
use yii\helpers\Html;
use common\widgets\Alert;
?>
<div class="container content">
    	<div class="row">
            <div class="col-md-12 col-md-offset-1 col-sm-6 col-sm-offset-3">

                    <div class="headline">
                        <h2>Sign up for SALEXES</h2>
                    </div>
                    <?= Alert::widget() ?>
                    <?php $form = ActiveForm::begin([
                        'id' => 'form-signup',
                        'action'=>['signup','role'=>$model->role]

                    ]); ?>
                    <div class="row">
                        <div class="col-lg-5">
                            <?= $form->field($model, 'email') ?>
                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <?= $form->field($model, 'address') ?>
                            <?= $form->field($model, 'address2') ?>

                            <div class="row">
                                <div class="col-lg-6">
                                    <?= $form->field($model, 'district') ?>
                                </div>
                                <div class="col-lg-6">
                                    <?= $form->field($model, 'postcode') ?>
                                </div>
                            </div>



                            <hr>
                            
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?= $form->field($model, 'name') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?= $form->field($model, 'ic')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '999999-99-9999'])?>
                                </div>
                            </div>
                            <?= $form->field($model, 'state')->dropDownList(Lookup::items('State-Name'),['prompt'=>'Please select State']) ?>
                            <?= $form->field($model, 'mobile') ?>
                            <?php if($model->role == 'ENT'):?>
                                <?= $form->field($model, 'plkn')->dropDownList(Lookup::items('Plkn-Name'),['prompt'=>'Required to select PLKN']) ?>
                            <?php endif;?>
                            <hr>

                        </div>

                    </div>
                    <div class="form-group">
                                <?= Html::submitButton('Sign-up Now', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </div>

                    <?php ActiveForm::end(); ?>

                    <hr>

                    <h4>For information on features please visit <?=Html::a('SALEXES','http://www.sme.skydatasolution.com/sme/frontend/web/index.php?r=site/profile')?></h4>

		
            </div>
        </div><!--/row-->
    </div>