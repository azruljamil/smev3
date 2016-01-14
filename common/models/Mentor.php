<?php

namespace common\models;

use Yii;
use yii\bootstrap\Html;

/**
 * This is the model class for table "{{%mentor}}".
 *
 * @property integer $id
 * @property integer $user_id
 *
 * @property User $user
 * @property MentorEntrepreneur[] $mentorEntrepreneurs
 * @property Entrepreneur[] $entrepreneurs
 */
class Mentor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mentor}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','user_id'], 'required'],
            [['id','user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getMentorEntrepreneurs()
    {
        return $this->hasMany(MentorEntrepreneur::className(), ['mentor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurs()
    {
        return $this->hasMany(Entrepreneur::className(), ['user_id' =>'entrepreneur_user_id'])->viaTable('{{%mentor_entrepreneur}}', ['mentor_id' => 'id']);
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return MentorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MentorQuery(get_called_class());
    }

    public function getName()
    {
        return $this->user->profile->name;
    }

    public function getUsername()
    {
        return $this->user->username;
    }

    public function getEmail()
    {
        return $this->user->email;
    }

    public function getEntCount()
    {
        $count =  count($this->entrepreneurs);
        //return $count;
        return Html::a($count,['view','id'=>$this->id],['class'=>'label label-success']);
    }



}
