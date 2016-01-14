<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EntpCustomer]].
 *
 * @see EntpCustomer
 */
class EntpCustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EntpCustomer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EntpCustomer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}