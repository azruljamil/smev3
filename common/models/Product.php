<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $product
 * @property string $code
 * @property integer $qty
 *
 * @property EntpProduct[] $entpProducts
 * @property Entrepreneur[] $entrepreneurs
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
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
            [['qty'], 'integer'],
            [['price'], 'number'],
            [['product', 'code'], 'string', 'max' => 150],
            [['product', 'code', 'qty'], 'required'],
            [['created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product' => Yii::t('app', 'Product'),
            'code' => Yii::t('app', 'Code'),
            'qty' => Yii::t('app', 'Qty'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpProducts()
    {
        return $this->hasMany(EntpProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrepreneurs()
    {
        return $this->hasMany(Entrepreneur::className(), ['user_id' => 'entrepreneur_id'])->viaTable('{{%entp_product}}', ['product_id' => 'id']);
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
                $dropdown[$model->id] = $model->product;
            }
        }
        return $dropdown;
    }


    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
