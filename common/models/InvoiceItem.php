<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%invoice_item}}".
 *
 * @property integer $id
 * @property string $item
 * @property string $code
 * @property integer $qty
 * @property double $price
 *
 * @property EntpInvoiceitem[] $entpInvoiceitems
 * @property Invoice[] $invoices
 */
class InvoiceItem extends \yii\db\ActiveRecord
{
    public $product;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%invoice_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['qty'], 'integer'],
            [['price'], 'number'],
            [['item', 'code'], 'string', 'max' => 155]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item' => Yii::t('app', 'Item'),
            'code' => Yii::t('app', 'Code'),
            'qty' => Yii::t('app', 'Qty'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpInvoiceitems()
    {
        return $this->hasMany(EntpInvoiceitem::className(), ['invoice_item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['id' => 'invoice_id'])->viaTable('{{%entp_invoiceitem}}', ['invoice_item_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InvoiceItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvoiceItemQuery(get_called_class());
    }
}
