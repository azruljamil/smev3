<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EntpProduct]].
 *
 * @see EntpProduct
 */
class EntpProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EntpProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EntpProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}