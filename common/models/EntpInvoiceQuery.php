<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EntpInvoice]].
 *
 * @see EntpInvoice
 */
class EntpInvoiceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EntpInvoice[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EntpInvoice|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}