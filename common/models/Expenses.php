<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%expenses}}".
 *
 * @property integer $id
 * @property double $total
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property EntpExpenses[] $entpExpenses
 * @property Entrepreneur[] $entrepreneurs
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%expenses}}';
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
            [['total'], 'number'],
            [['created_at', 'updated_at'], 'integer'],
            [['total','reason'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'total' => Yii::t('app', 'Total'),
            'reason' => Yii::t('app', 'Reason'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpExpenses()
    {
        return $this->hasMany(EntpExpenses::className(), ['expenses_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurs()
    {
        return $this->hasMany(Entrepreneur::className(), ['id' => 'entrepreneur_id'])->viaTable('{{%entp_expenses}}', ['expenses_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ExpensesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExpensesQuery(get_called_class());
    }

    public function getName()
    {
        return $this->user->profile->name;
    }
}
