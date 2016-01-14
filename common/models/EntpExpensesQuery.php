<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EntpExpenses]].
 *
 * @see EntpExpenses
 */
class EntpExpensesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EntpExpenses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EntpExpenses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}