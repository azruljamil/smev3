<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entp_customer}}".
 *
 * @property integer $entrepreneur_user_id
 * @property integer $customer_id
 *
 * @property Customer $customer
 * @property Entrepreneur $entrepreneurUser
 */
class EntpCustomer extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entp_customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'customer_id'], 'required'],
            [['entrepreneur_user_id', 'customer_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entrepreneur_user_id' => Yii::t('app', 'Entrepreneur User ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurUser()
    {
        return $this->hasOne(Entrepreneur::className(), ['user_id' => 'entrepreneur_user_id']);
    }

    /**
     * @inheritdoc
     * @return EntpCustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntpCustomerQuery(get_called_class());
    }
}
