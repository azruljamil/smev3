<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EntpInvoiceitem]].
 *
 * @see EntpInvoiceitem
 */
class EntpInvoiceitemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EntpInvoiceitem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EntpInvoiceitem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}