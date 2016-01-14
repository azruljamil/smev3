<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Sales]].
 *
 * @see Sales
 */
class SalesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Sales[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sales|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}