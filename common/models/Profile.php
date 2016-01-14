<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property string $image
 * @property string $first_name
 * @property string $last_name
 * @property string $ic
 * @property string $dob
 * @property string $address
 * @property string $address2
 * @property integer $postcode
 * @property string $district
 * @property integer $state
 * @property string $mobile
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'string'],
            [['dob'], 'safe'],
            [['postcode', 'state', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['user_id','name'], 'required'],
            [['first_name', 'last_name', 'district'], 'string', 'max' => 81],
            [['ic', 'mobile'], 'string', 'max' => 15],
            [['address', 'address2'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image' => Yii::t('app', 'Image'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'ic' => Yii::t('app', 'Identity Card Number'),
            'dob' => Yii::t('app', 'Dob'),
            'address' => Yii::t('app', 'Address'),
            'address2' => Yii::t('app', 'Address2'),
            'postcode' => Yii::t('app', 'Postcode'),
            'district' => Yii::t('app', 'District'),
            'state' => Yii::t('app', 'State'),
            'mobile' => Yii::t('app', 'Mobile'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }

}
