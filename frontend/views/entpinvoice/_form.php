<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\EntpCustomer;

/* @var $this yii\web\View */
/* @var $model common\models\EntpInvoice */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->id;
?>

<div class="entp-invoice-form">


    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-5">


            <?= $form->field($model, 'customerSelect')->label('Select Customer')
                ->dropDownList(ArrayHelper::map(EntpCustomer::find()->joinWith('customer')->where('entp_customer.entrepreneur_user_id='.$id)->all(), 'customer.id', 'customer.name'),[
                    // 'data-placeholder'=>'Choose permission...',
                    //'class'           =>'chosen-select',
                    'style'           =>'width:230px;',
                    'tabindex'        =>'3',
                    'prompt'          =>'',
                    'id'              =>'customerSelect',
                    //'onchange'        =>'$("input#address").val($(this).val())'
                ])
            ?>

            <div id="hehe">

            </div>

            <?= $form->field($model, 'customer')->textInput(['maxlength' => true,'id'=>'customer'])->label('Name') ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true,'id'=>'address']) ?>

            <?= $form->field($model, 'telephone')->textInput(['maxlength' => true,'id'=>'telephone']) ?>

            <?= $form->field($model, 'fax')->textInput(['maxlength' => true,'id'=>'fax']) ?>

            <?= $form->field($model, 'pic')->textInput(['maxlength' => true,'id'=>'pic']) ?>

            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'id'=>'mobile']) ?>

        </div>

        <div class="col-lg-5">
            <?= $form->field($model, 'invoice_no')->textInput() ?>

            <?= $form->field($model, 'due_date')->textInput() ?>

            <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'account_no')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
<?php $this->beginBlock('JavascriptInit');?>

    <script type="text/javascript">
        $("#customerSelect").change(function(){
            //alert('hahahaha');
            $.ajax({
                url: '<?php echo Yii::$app->urlManager->createUrl('/entpinvoice/custlist') ?>',
                type: 'post',
                data: {id: $("#customerSelect").val()},
                success: function (data) {
                    //alert(data);
                    $('#hehe').html(data);
                    var customerC = $("#refername").val();
                    var addressC = $("#referaddress").val();
                    var telephoneC = $("#refertelephone").val();
                    var faxC = $("#referfax").val();
                    var picC = $("#referpic").val();
                    var mobileC = $("#refermobile").val();
                    $('#customer').val(customerC);
                    $('#address').val(addressC);
                    $('#telephone').val(telephoneC);
                    $('#fax').val(faxC);
                    $('#pic').val(picC);
                    $('#mobile').val(mobileC);
                }

            });
        });
    </script>

<?php $this->endBlock();?>