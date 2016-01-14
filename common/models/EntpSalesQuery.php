<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EntpSales]].
 *
 * @see EntpSales
 */
class EntpSalesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EntpSales[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EntpSales|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}