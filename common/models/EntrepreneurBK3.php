<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entrepreneur}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $plkn
 *
 * @property EntpExpenses[] $entpExpenses
 * @property Expenses[] $expenses
 * @property EntpSales[] $entpSales
 * @property Sales[] $sales
 * @property EntpSupplier[] $entpSuppliers
 * @property Supplier[] $suppliers
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
            [['user_id', 'plkn'], 'required'],
            [['user_id', 'plkn'], 'integer']
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
    public function getEntpExpenses()
    {
        return $this->hasMany(EntpExpenses::className(), ['entrepreneur_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpenses()
    {
        return $this->hasMany(Expenses::className(), ['id' => 'expenses_id'])->viaTable('{{%entp_expenses}}', ['entrepreneur_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpSales()
    {
        return $this->hasMany(EntpSales::className(), ['entrepreneur_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['id' => 'sales_id'])->viaTable('{{%entp_sales}}', ['entrepreneur_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpSuppliers()
    {
        return $this->hasMany(EntpSupplier::className(), ['entrepreneur_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['id' => 'supplier_id'])->viaTable('{{%entp_supplier}}', ['entrepreneur_id' => 'id']);
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

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
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
