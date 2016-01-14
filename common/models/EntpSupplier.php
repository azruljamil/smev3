<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entp_supplier}}".
 *
 * @property integer $entrepreneur_id
 * @property integer $supplier_id
 *
 * @property Entrepreneur $entrepreneur
 * @property Supplier $supplier
 */
class EntpSupplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entp_supplier}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_id', 'supplier_id'], 'required'],
            [['entrepreneur_id', 'supplier_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entrepreneur_id' => Yii::t('app', 'Entrepreneur ID'),
            'supplier_id' => Yii::t('app', 'Supplier ID'),
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
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    /**
     * @inheritdoc
     * @return EntpSupplierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntpSupplierQuery(get_called_class());
    }

    public function getSupName()
    {
        return $this->supplier->name;
    }

    public function StateName()
    {
        $plknLookup = Lookup::items('State-Name');
        return $plknLookup[$this->supplier->state];
    }
}
