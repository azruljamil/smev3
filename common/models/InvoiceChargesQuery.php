<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvoiceCharges]].
 *
 * @see InvoiceCharges
 */
class InvoiceChargesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return InvoiceCharges[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvoiceCharges|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}