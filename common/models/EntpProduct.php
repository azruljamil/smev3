<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entp_product}}".
 *
 * @property integer $entrepreneur_id
 * @property integer $product_id
 *
 * @property Entrepreneur $entrepreneur
 * @property Product $product
 */
class EntpProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return '{{%entp_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrepreneur_user_id', 'product_id'], 'required'],
            [['entrepreneur_user_id', 'product_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entrepreneur_user_id' => Yii::t('app', 'Entrepreneur ID'),
            'product_id' => Yii::t('app', 'Product ID'),
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
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public static function dropdown()
    {
        // get abd cache data
        static $dropdown;
        if($dropdown === null)
        {
            //get all record from database and generate
            $models = static::find()->all();
            foreach ($models as $model)
            {
                $dropdown[$model->entrepreneur_user_id] = $model->entrepreneur_user_id;
            }
        }
        return $dropdown;
    }


    /**
     * @inheritdoc
     * @return EntpProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntpProductQuery(get_called_class());
    }

    public function getProdName()
    {
        return $this->product->product;
    }

    public function getProdCode()
    {
        return $this->product->code;
    }

    public function getProdQty()
    {
        return $this->product->qty;
    }
}
