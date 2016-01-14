<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%sales}}".
 *
 * @property integer $id
 * @property double $total
  * @property double $reason
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property EntpSales[] $entpSales
 * @property Entrepreneur[] $entrepreneurs
 */
class Sales extends \yii\db\ActiveRecord
{
    public $ent_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sales}}';
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
            [['total','reason'], 'required'],
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
            'reason' => Yii::t('app', 'Reason')
            //'created_at' => Yii::t('app', 'Created At'),
            //'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpSales()
    {
        return $this->hasMany(EntpSales::className(), ['sales_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurs()
    {
        return $this->hasMany(Entrepreneur::className(), ['id' => 'entrepreneur_id'])->viaTable('{{%entp_sales}}', ['sales_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SalesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalesQuery(get_called_class());
    }

    public function getName()
    {
        return $this->user->profile->name;
    }
}
