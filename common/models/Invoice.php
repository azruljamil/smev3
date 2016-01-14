<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%invoice}}".
 *
 * @property integer $id
 * @property string $invoice_no
 * @property string $due_date
 * @property string $bank_name
 * @property integer $account_no
 * @property string $customer
 * @property string $address
 * @property string $telephone
 * @property string $fax
 * @property string $pic
 * @property string $mobile
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property EntpInvoice[] $entpInvoices
 * @property Entrepreneur[] $entrepreneurUsers
 * @property EntpInvoiceitem[] $entpInvoiceitems
 * @property InvoiceItem[] $invoiceItems
 * @property InvoiceCharges $invoiceCharges
 */
class Invoice extends \yii\db\ActiveRecord
{
    public $customerSelect;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%invoice}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_no'], 'required'],
            [['due_date','customerSelect'], 'safe'],
            [['account_no', 'created_at', 'updated_at'], 'integer'],
            [['invoice_no'], 'string', 'max' => 155],
            [['bank_name'], 'string', 'max' => 100],
            [['customer', 'pic'], 'string', 'max' => 150],
            [['address'], 'string', 'max' => 255],
            [['telephone', 'fax', 'mobile'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'invoice_no' => Yii::t('app', 'Invoice No'),
            'due_date' => Yii::t('app', 'Due Date'),
            'bank_name' => Yii::t('app', 'Bank Name'),
            'account_no' => Yii::t('app', 'Account No'),
            'customer' => Yii::t('app', 'Customer'),
            'address' => Yii::t('app', 'Address'),
            'telephone' => Yii::t('app', 'Telephone'),
            'fax' => Yii::t('app', 'Fax'),
            'pic' => Yii::t('app', 'Pic'),
            'mobile' => Yii::t('app', 'Mobile'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpInvoices()
    {
        return $this->hasMany(EntpInvoice::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurUsers()
    {
        return $this->hasMany(Entrepreneur::className(), ['user_id' => 'entrepreneur_user_id'])->viaTable('{{%entp_invoice}}', ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpInvoiceitems()
    {
        return $this->hasMany(EntpInvoiceitem::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceItems()
    {
        return $this->hasMany(InvoiceItem::className(), ['id' => 'invoice_item_id'])->viaTable('{{%entp_invoiceitem}}', ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceCharges()
    {
        return $this->hasOne(InvoiceCharges::className(), ['invoice_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InvoiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvoiceQuery(get_called_class());
    }
}
