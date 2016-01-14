<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "{{%entp_sales}}".
 *
 * @property integer $entrepreneur_user_id
 * @property integer $sales_id
 *
 * @property Entrepreneur $entrepreneur
 * @property Sales $sales
 */
class EntpSales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entp_sales}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'sales_id'], 'required'],
            [['entrepreneur_user_id', 'sales_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entrepreneur_user_id' => Yii::t('app', 'Entrepreneur ID'),
            'sales_id' => Yii::t('app', 'Sales ID'),
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
    public function getSales()
    {
        return $this->hasOne(Sales::className(), ['id' => 'sales_id']);
    }

    /**
     * @inheritdoc
     * @return EntpSalesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntpSalesQuery(get_called_class());
    }

    public function getSalesTotal()
    {
        //return $this->sales->total;
        $o = $this->entrepreneur->user_id;
        $command = Yii::$app->db->createCommand('SELECT sum(a.total) FROM sales a, entp_sales b WHERE b.entrepreneur_user_id = '.$o.' AND a.id = b.sales_id GROUP BY b.entrepreneur_user_id');
        return $command->queryScalar();
    }

}
