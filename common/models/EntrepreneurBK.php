<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entrepreneur}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $plkn
 *
 * @property User $user
 * @property MentorEntrepreneur[] $mentorEntrepreneurs
 * @property Mentor[] $mentors
 */
class Entrepreneur extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entrepreneur}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id','plkn'], 'integer'],

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
            'plkn' => Yii::t('app', 'Plkn'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
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
    public function getMentorEntrepreneurs()
    {
        return $this->hasMany(MentorEntrepreneur::className(), ['entrepreneur_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMentors()
    {
        return $this->hasMany(Mentor::className(), ['id' => 'mentor_id'])->viaTable('{{%mentor_entrepreneur}}', ['entrepreneur_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return EntrepreneurQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntrepreneurQuery(get_called_class());
    }

    public function getUsername()
    {
        return $this->user->username;
    }

    public function getEmail()
    {
        return $this->user->email;
    }

    public function getMeid()
    {
        return $this->user->id;
    }

    public function getName()
    {
        return $this->user->profile->name;
    }

    public function NamePlkn()
    {
        $plknLookup = Lookup::items('Plkn-Name');
        return $plknLookup[$this->plkn];
    }

    public function getPusatName()
    {
        return Lookup::item('Plkn-Name',$this->plkn);
    }
}
