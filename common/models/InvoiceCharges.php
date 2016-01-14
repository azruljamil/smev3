<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%invoice_charges}}".
 *
 * @property integer $invoice_id
 * @property double $diskaun
 * @property double $shipping
 * @property double $gst
 *
 * @property Invoice $invoice
 */
class InvoiceCharges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%invoice_charges}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id'], 'required'],
            [['invoice_id'], 'integer'],
            [['diskaun', 'shipping', 'gst'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invoice_id' => Yii::t('app', 'Invoice ID'),
            'diskaun' => Yii::t('app', 'Diskaun'),
            'shipping' => Yii::t('app', 'Shipping'),
            'gst' => Yii::t('app', 'Gst'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }

    /**
     * @inheritdoc
     * @return InvoiceChargesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvoiceChargesQuery(get_called_class());
    }
}
