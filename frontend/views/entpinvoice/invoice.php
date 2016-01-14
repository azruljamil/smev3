<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\NewInvoice */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'New Invoice';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #hide{
        display: none;
    }
</style>

<div class="site-invoice">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields:</p>
    <?php $form = ActiveForm::begin([
        'id' => 'form-invoice',
        'action'=>['create']

    ]); ?>
    <div class="row">
        <div class="col-lg-5">

            <?= $form->field($model, 'customer') ?>
            <?= $form->field($model, 'address') ?>
            <?= $form->field($model, 'telephone') ?>
            <?= $form->field($model, 'fax') ?>
            <?= $form->field($model, 'pic') ?>
            <?= $form->field($model, 'mobile') ?>

                <?php //= $form->field($model, 'plkn')->dropDownList(Lookup::items('Plkn-Name'),['prompt'=>'Required to select PLKN']) ?>

        </div>
        <div class="col-lg-5">

            <?= $form->field($model, 'invoice_no') ?>
            <?= $form->field($model, 'date') ?>
            <?= $form->field($model, 'due_date') ?>
            <?= $form->field($model, 'bank_name') ?>
            <?= $form->field($model, 'account_no') ?>


        </div>



    </div>

    <div class="row">


        <div class="col-lg-4 itemInvoice">
            <h1>Invoice Item Add</h1>
            <p class="text-items">
                <label for="item">Item <span class="items-number"></span></label>
                [ <a href="#" class="add-items">Add More</a> ]
                <input class="form-control" type="text" name="items[]" value="" id="item" />
                <input class="form-control" type="text" name="qty[]" value="" id="qty" />
                <input class="form-control" type="text" name="value[]" value="" id="value" />
            </p>



        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <?= Html::submitButton('Sign-up', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php $this->beginBlock('JavascriptInit');?>

    <script type="text/javascript">

//        $(document).ready(function() {
//            //alert('hahaha');
//            $('#item1').keyup(function(){
//                //$('#item2').show();
//            });
//
//        });
//        $("#item1").keyup(function(){
//            $('#item2').val($('#item1').val());
//             });

            jQuery(document).ready(function($){
                $('.itemInvoice .add-items').click(function(){
                    var n = $('.text-items').length + 1;
                    var box_html = $('<p class="text-items"><label for="item' + n + '">Item <span class="items-number">' + n + '</span></label> <input type="text" class="form-control" name="items[]" value="" id="item' + n + '" /> <input type="text" class="form-control" name="qty[]" value="" id="qty' + n + '" /> <input type="text" class="form-control" name="value[]" value="" id="value' + n + '" /><a href="#" class="remove-items">Remove</a></p>');
                    box_html.hide();
                    $('.itemInvoice p.text-items:last').after(box_html);
                    box_html.fadeIn('slow');
                    return false;
                });

                $('.itemInvoice').on('click', '.remove-items', function(){
                    //$(this).parent().css( 'background-color', '#FF6C6C' );
                    if($('.text-items').length > 1){
                        $(this).parent().fadeOut('slow', function() {
                            $(this).remove();
                            $('.items-number').each(function(index){
                                $(this).text( index + 1 );
                            });
                        });
                    }
                    return false;
                });
            });

    </script>

<?php $this->endBlock();?>