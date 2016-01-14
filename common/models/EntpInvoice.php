<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entp_invoice}}".
 *
 * @property integer $entrepreneur_user_id
 * @property integer $invoice_id
 *
 * @property Entrepreneur $entrepreneurUser
 * @property Invoice $invoice
 */
class EntpInvoice extends \yii\db\ActiveRecord
{
    public $item;
    public $price;
    public $qty;
    public $code;
    public $total;
    public $productSelect;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entp_invoice}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'invoice_id'], 'required'],
            [['entrepreneur_user_id', 'invoice_id'], 'integer'],
            [['item', 'price', 'qty', 'total', 'code','productSelect'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entrepreneur_user_id' => Yii::t('app', 'Entrepreneur User ID'),
            'invoice_id' => Yii::t('app', 'Invoice ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurUser()
    {
        return $this->hasOne(Entrepreneur::className(), ['user_id' => 'entrepreneur_user_id']);
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
     * @return EntpInvoiceItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntpInvoiceItemQuery(get_called_class());
    }
}
