<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entp_expenses}}".
 *
 * @property integer $entrepreneur_user_id
 * @property integer $expenses_id
 *
 * @property Entrepreneur $entrepreneur
 * @property Expenses $expenses
 */
class EntpExpenses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entp_expenses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'expenses_id'], 'required'],
            [['entrepreneur_user_id', 'expenses_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entrepreneur_user_id' => Yii::t('app', 'Entrepreneur ID'),
            'expenses_id' => Yii::t('app', 'Expenses ID'),
        ];
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
    public function getExpenses()
    {
        return $this->hasOne(Expenses::className(), ['id' => 'expenses_id']);
    }

    /**
     * @inheritdoc
     * @return EntpExpensesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntpExpensesQuery(get_called_class());
    }

    public function getExpensesTotal()
    {
        //return $this->sales->total;
        $o = $this->entrepreneur->user_id;
        $command = Yii::$app->db->createCommand('SELECT sum(a.total) FROM expenses a, entp_expenses b WHERE b.entrepreneur_user_id = '.$o.' AND a.id = b.expenses_id GROUP BY b.entrepreneur_user_id');
        return $command->queryScalar();
    }
}
