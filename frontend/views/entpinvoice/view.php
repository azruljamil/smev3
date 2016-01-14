<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\Product;
use common\models\EntpProduct;
use common\models\Invoice;

/* @var $this yii\web\View */
/* @var $model common\models\EntpInvoice */

$this->title = $model->invoice->invoice_no;
$this->params['breadcrumbs'][] = ['label' => 'My Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id = Yii::$app->user->id;
?>
<div class="entp-invoice-view">
    <input id="urlbase" type="hidden" value="<?=Url::base(true) ?> ">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Generate Invoice', ['viewinvoice', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Add Charges', ['addcharges', 'entrepreneur_user_id' => $model->entrepreneur_user_id, 'invoice_id' => $model->invoice_id], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-lg-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'entrepreneur_user_id',
                    //'invoice_id',
                    'invoice.invoice_no',
                    'invoice.due_date',
                    'invoice.created_at:date',
                    'invoice.updated_at:date',
                ],
            ]) ?>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'entrepreneur_user_id',
                    //'invoice_id',
                    'invoice.customer',
                    'invoice.address',
                    'invoice.telephone',
                    'invoice.fax',
                    'invoice.mobile',
                ],
            ]) ?>




        </div>

        <div class="col-lg-7">

            <?php $form = ActiveForm::begin([
                'action'=> ['additem','invoice_id'=>$model->invoice_id,'entrepreneur_user_id'=>Yii::$app->user->id],
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                ]
            ]) ?>

            <?php //= $form->errorSummary($model);?>

            <?= $form->field($model,'invoice_id')->hiddenInput(['value'=>Yii::$app->getRequest()->getQueryParam('invoice_id'),'id'=>'invoice_id'])->label(false)?>

            <?= $form->field($model,'entrepreneur_user_id')->hiddenInput(['value'=>Yii::$app->getRequest()->getQueryParam('entrepreneur_user_id'),'id'=>'entrepreneur_user_id'])->label(false)?>

            <?= $form->field($model,'invoice_no')->hiddenInput(['value'=>$model->invoice->invoice_no])->label(false)?>

            <?= $form->field($model,'item')->hiddenInput(['id'=>'item'])->label(false) ?>
            <?= $form->field($model,'code')->hiddenInput(['id'=>'code'])->label(false) ?>
            <?= $form->field($model,'price')->hiddenInput(['id'=>'price'])->label(false) ?>

            <div class="row">
                <div class="col-lg-5">
                    <?= $form->field($model, 'productSelect')->label('Select Product')
                        ->dropDownList(ArrayHelper::map(EntpProduct::find()->joinWith('product')->where('entp_product.entrepreneur_user_id='.$id)->all(), 'product.id', 'product.product'),[
                            // 'data-placeholder'=>'Choose permission...',
                            //'class'           =>'chosen-select',
                            'style'           =>'width:230px;',
                            'tabindex'        =>'3',
                            'prompt'          =>'',
                            'id'              =>'productSelect',
                            //'onchange'        =>'$("input#price").val($(this).val())'
                        ])
                    ?>

                    <div id="hehe">

                    </div>
                </div>
                <div class="col-lg-2">
                    <?= $form->field($model,'qty')->textInput(['id'=>'qty','style'=>'width:50px;'])->label('Qty') ?>
                </div>
                <br>
                <div class="col-lg-3">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Add Product'), ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>


            <?php ActiveForm::end(); ?>

            <h1> Items </h1>

                    <?=GridView::widget([
                        'dataProvider'=>$dataProvider,
                        'columns'=>[
                            //'mentor_id',
                            [
                                'label'=>'Product',
                                'value'=>'item'
                            ],

                            [
                                'label'=>'Product Code',
                                'value'=>'code'
                            ],

                            [
                                'label'=>'Qty.',
                                'value'=>'qty'
                            ],

                            [
                                'label'=>'Price',
                                'format'=>['decimal',2],
                                'value'=>'price'
                            ],

                            [
                                'label'=>'Total',
                                'format'=>['decimal',2],
                                'value'=> function ($model)
                                {
                                    return $allvalue = $model->price * $model->qty;
                                }

                            ],
                            //'entrepreneur_id',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons'=>[
                                    'deactivate'=>function ($url, $model, $key) {
                                        $icon = Html::tag('span','',['class'=>'glyphicon glyphicon-trash']);
                                        $linkUrl = Html::a($icon,['removeitem','id'=>$model->id,'code'=>$model->code,'entrepreneur_user_id'=>Yii::$app->user->id,'invoice_id'=>Yii::$app->getRequest()->getQueryParam('invoice_id')],['title'=>'Remove Item','aria-label'=>'remove','data-pjax'=>'0']);
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

<?php $this->beginBlock('JavascriptInit');?>

    <script type="text/javascript">
        $("#productSelect").change(function(){
            $.ajax({
                url: '<?php echo Yii::$app->urlManager->createUrl('/entpinvoice/sample') ?>',
                type: 'post',
                data: {id: $("#productSelect").val()},
                success: function (data) {
                    //alert(data);
                    $('#hehe').html(data);
                    var productP = $("#referproduct").val();
                    var codeP = $("#refercode").val();
                    var priceP = $("#referprice").val();
                    $('#code').val(codeP);
                    $('#price').val(priceP);
                    $('#item').val(productP);
                }

            });
        });
    </script>

<?php $this->endBlock();?>
