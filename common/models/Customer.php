<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $telephone
 * @property string $fax
 * @property string $pic
 * @property string $mobile
 * @property string $email
 *
 * @property EntpCustomer[] $entpCustomers
 * @property Entrepreneur[] $entrepreneurUsers
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'telephone', 'fax', 'pic', 'mobile','email'], 'required'],
            [['name', 'address', 'pic'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 150],
            [['telephone', 'mobile'], 'string', 'max' => 15],
            [['fax'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'telephone' => Yii::t('app', 'Telephone'),
            'fax' => Yii::t('app', 'Fax'),
            'pic' => Yii::t('app', 'Pic'),
            'mobile' => Yii::t('app', 'Mobile'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpCustomers()
    {
        return $this->hasMany(EntpCustomer::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurUsers()
    {
        return $this->hasMany(Entrepreneur::className(), ['user_id' => 'entrepreneur_user_id'])->viaTable('{{%entp_customer}}', ['customer_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
