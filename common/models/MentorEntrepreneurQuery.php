<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MentorEntrepreneur]].
 *
 * @see MentorEntrepreneur
 */
class MentorEntrepreneurQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MentorEntrepreneur[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MentorEntrepreneur|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}