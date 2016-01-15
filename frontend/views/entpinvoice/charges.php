<?php
/**
 * Created by PhpStorm.
 * User: Azrul APTinventions
 * Date: 12/01/2016
 * Time: 17:52
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\InvoiceCharges */
/* @var $form yii\widgets\ActiveForm */
$this->title = $model->invoice->invoice_no;
$this->params['breadcrumbs'][] = ['label' => 'My Invoice Charges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id = Yii::$app->user->id;
?>

<div class="invoice-charges-form">

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

        <div class="col-lg-4">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'invoice_id')->hiddenInput(['value'=>Yii::$app->getRequest()->getQueryParam('invoice_id')])->label(false) ?>

            <?= $form->field($model, 'diskaun')->textInput() ?>

            <?= $form->field($model, 'shipping')->textInput() ?>

            <?= $form->field($model, 'gst')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>



        </div>



</div>


