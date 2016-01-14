<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entp_invoiceitem}}".
 *
 * @property integer $invoice_id
 * @property integer $invoice_item_id
 *
 * @property Invoice $invoice
 * @property InvoiceItem $invoiceItem
 */
class EntpInvoiceitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entp_invoiceitem}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'invoice_item_id',], 'required'],
            [['invoice_id', 'invoice_item_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invoice_id' => Yii::t('app', 'Invoice ID'),
            'invoice_item_id' => Yii::t('app', 'Invoice Item ID'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceItem()
    {
        return $this->hasOne(InvoiceItem::className(), ['id' => 'invoice_item_id']);
    }

    /**
     * @inheritdoc
     * @return EntpInvoiceitemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntpInvoiceitemQuery(get_called_class());
    }
}
