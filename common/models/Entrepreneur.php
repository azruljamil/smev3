<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%entrepreneur}}".
 *
 * @property integer $user_id
 * @property integer $plkn
 *
 * @property EntpCustomer[] $entpCustomers
 * @property Customer[] $customers
 * @property EntpExpenses[] $entpExpenses
 * @property Expenses[] $expenses
 * @property EntpInvoice[] $entpInvoices
 * @property Invoice[] $invoices
 * @property EntpProduct[] $entpProducts
 * @property Product[] $products
 * @property EntpSales[] $entpSales
 * @property Sales[] $sales
 * @property EntpSupplier[] $entpSuppliers
 * @property Supplier[] $suppliers
 * @property User $user
 * @property MentorEntrepreneur[] $mentorEntrepreneurs
 * @property Mentor[] $mentors
 */
class Entrepreneur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entrepreneur}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'plkn'], 'required'],
            [['user_id', 'plkn'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'plkn' => Yii::t('app', 'Plkn'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpCustomers()
    {
        return $this->hasMany(EntpCustomer::className(), ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['id' => 'customer_id'])->viaTable('{{%entp_customer}}', ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpExpenses()
    {
        return $this->hasMany(EntpExpenses::className(), ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpenses()
    {
        return $this->hasMany(Expenses::className(), ['id' => 'expenses_id'])->viaTable('{{%entp_expenses}}', ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpInvoices()
    {
        return $this->hasMany(EntpInvoice::className(), ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['id' => 'invoice_id'])->viaTable('{{%entp_invoice}}', ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpProducts()
    {
        return $this->hasMany(EntpProduct::className(), ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%entp_product}}', ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpSales()
    {
        return $this->hasMany(EntpSales::className(), ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['id' => 'sales_id'])->viaTable('{{%entp_sales}}', ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntpSuppliers()
    {
        return $this->hasMany(EntpSupplier::className(), ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['id' => 'supplier_id'])->viaTable('{{%entp_supplier}}', ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMentorEntrepreneurs()
    {
        return $this->hasMany(MentorEntrepreneur::className(), ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMentors()
    {
        return $this->hasMany(Mentor::className(), ['id' => 'mentor_id'])->viaTable('{{%mentor_entrepreneur}}', ['entrepreneur_user_id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return EntrepreneurQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntrepreneurQuery(get_called_class());
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
    }

    public function getUsername()
    {
        return $this->user->username;
    }

    public function getEmail()
    {
        return $this->user->email;
    }

    public function getMeid()
    {
        return $this->user->id;
    }

    public function getName()
    {
        return $this->user->profile->name;
    }

    public function getAddress()
    {
        return $this->user->profile->address;
    }

    public function getAddress2()
    {
        return $this->user->profile->address2;
    }

    public function NamePlkn()
    {
        $plknLookup = Lookup::items('Plkn-Name');
        return $plknLookup[$this->plkn];
    }

    public function getPusatName()
    {
        return Lookup::item('Plkn-Name',$this->plkn);
    }

    public function getAllSales()
    {
        $o = $this->user->profile->user_id;
        //return $count;
        //return $count;
        $sales = Yii::$app->db->createCommand('SELECT sum(a.total) FROM sales a, entp_sales b WHERE b.entrepreneur_user_id = '.$o.' AND a.id = b.sales_id GROUP BY b.entrepreneur_user_id');
        return $sales->queryScalar();
    }

    public function getAllExpenses()
    {
        $o2 = $this->user->profile->user_id;
        //return $count;
        //return $count;
        $expenses = Yii::$app->db->createCommand('SELECT sum(a.total) FROM expenses a, entp_expenses b WHERE b.entrepreneur_user_id = '.$o2.' AND a.id = b.expenses_id GROUP BY b.entrepreneur_user_id');
        return $expenses->queryScalar();
    }
}
