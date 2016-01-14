<?php

namespace common\models;

use Yii;
use common\models\EntpSupplier;
use common\models\Supplier;
use common\models\Profile;
use yii\base\Model;

/**
 * This is the extended model class for supplier model
 *
 */
class SupplierExt extends Supplier
{
    public $name;
    public $address;

    public function rules()
    {
        return [
            [['name', 'address'], 'required']
            //[['profile_user_id'], 'integer']
        ];
    }

    public function addSupplier()
    {
        if ($this->validate())
        {
            $supplier = new Supplier();
            $supplier->name = $this->name;
            $supplier->save();
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Name' => Yii::t('app', 'Name'),
            'Address' => Yii::t('app', 'Address'),
        ];
    }


}
