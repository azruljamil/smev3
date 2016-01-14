<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%supplier}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $postcode
 * @property string $district
 * @property integer $state
 * @property string $telephone
 * @property string $fax
 * @property string $email
 * @property integer $account_no
 * @property string $person
 * @property string $mobile
 * @property string $social_link
 * @property string $website
 *
 * @property EntpSupplier[] $entpSuppliers
 * @property Entrepreneur[] $entrepreneurs
 */
class Supplier extends \yii\db\ActiveRecord
{
    //public $entrepreneur;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%supplier}}';
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
            [['postcode', 'state', 'account_no'], 'integer'],
            [['name', 'address', 'website'], 'string', 'max' => 150],
            [['district'], 'string', 'max' => 255],
            [['telephone', 'mobile'], 'string', 'max' => 15],
            [['fax'], 'string', 'max' => 10],
            [['email', 'social_link'], 'string', 'max' => 225],
            [['person'], 'string', 'max' => 200],
            [['name', 'address', 'postcode','district', 'state', 'account_no', 'fax', 'telephone', 'email'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            //[['entrepreneur'], 'integer'],
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
            'postcode' => Yii::t('app', 'Postcode'),
            'district' => Yii::t('app', 'District'),
            'state' => Yii::t('app', 'State'),
            'telephone' => Yii::t('app', 'Telephone'),
            'fax' => Yii::t('app', 'Fax'),
            'email' => Yii::t('app', 'Email'),
            'account_no' => Yii::t('app', 'Account No'),
            'person' => Yii::t('app', 'Person'),
            'mobile' => Yii::t('app', 'Mobile'),
            'social_link' => Yii::t('app', 'Social Link'),
            'website' => Yii::t('app', 'Website'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpSuppliers()
    {
        return $this->hasMany(EntpSupplier::className(), ['supplier_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurs()
    {
        return $this->hasMany(Entrepreneur::className(), ['user_id' => 'entrepreneur_id'])->viaTable('{{%entp_supplier}}', ['supplier_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SupplierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SupplierQuery(get_called_class());
    }


}
