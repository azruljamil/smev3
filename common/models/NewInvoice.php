<?php
/**
 * Created by PhpStorm.
 * User: Azrul APTinventions
 * Date: 07/01/2016
 * Time: 16:09
 */
namespace common\models;

use yii\base\Model;
use Yii;
use common\models\Invoice;
use common\models\EntpInvoice;

/**
 * invoice form
 */

class NewInvoice extends Model
{
    public $customer;
    public $address;
    public $telephone;
    public $fax;
    public $pic;
    public $mobile;

    public $invoice_no;
    public $date;
    public $due_date;
    public $bank_name;
    public $account_no;

    public $sub_amount;
    public $diskaun;
    public $shipping;
    public $gst;
    public $total;

    public $item;


    /**
     * @inheritdoc
     */



    public function rules()
    {
        return [

            [['customer', 'address','telephone','fax','pic','mobile','invoice_no','date','due_date','bank_name','account_no'],'required'],
            [['address'], 'string', 'max' => 255],

        ];
    }

    public function addInvoice()
    {

        if ($this->validate()) {
            $invoice = new Invoice();
            $invoice->invoice_no = $this->invoice_no;
            $invoice->due_date = $this->due_date;
            $invoice->bank_name = $this->bank_name;
            $invoice->account_no = $this->account_no;
            $invoice->customer = $this->customer;
            $invoice->address = $this->address;
            $invoice->telephone = $this->telephone;
            $invoice->fax = $this->fax;
            $invoice->pic = $this->pic;
            $invoice->mobile = $this->mobile;
                if($invoice->save())
                {
                    $entpinvoice = new EntpInvoice();
                    $entpinvoice->entrepreneur_user_id = Yii::$app->user->id;
                    $entpinvoice->link('invoice',$invoice);
                }
            return $invoice;
        }
        return null;

    }


}