<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%mentor_entrepreneur}}".
 *
 * @property integer $id
 * @property integer $mentor_id
 * @property integer $entrepreneur_id
 *
 * @property Entrepreneur $entrepreneur
 * @property Mentor $mentor
 */
class MentorEntrepreneur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mentor_entrepreneur}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mentor_id', 'entrepreneur_user_id'], 'required'],
            [['mentor_id', 'entrepreneur_user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mentor_id' => Yii::t('app', 'Mentor ID'),
            'entrepreneur_user_id' => Yii::t('app', 'Entrepreneur ID'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneur()
    {
        return $this->hasOne(Entrepreneur::className(), ['user_id' => 'entrepreneur_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMentor()
    {
        return $this->hasOne(Mentor::className(), ['id' => 'mentor_id']);
    }

    /**
     * @inheritdoc
     * @return MentorEntrepreneurQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MentorEntrepreneurQuery(get_called_class());
    }
}
