<?php
namespace frontend\models;

use common\models\Entrepreneur;
use common\models\Mentor;
use common\models\Profile;
use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $role;

    public $image;
    public $dob;
    public $postcode;
    public $state;
    public $created_at;
    public $updated_at;
    public $first_name;
    public $last_name;
    public $district;
    public $ic;
    public $mobile;
    public $address;
    public $address2;
    public $name;

    public $plkn;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['role', 'string'],

            [['name', 'ic','plkn'],'required'],
            [['image'], 'string'],
            [['dob'], 'safe'],
            [['postcode', 'state', 'created_at', 'updated_at','plkn'], 'integer'],
            [['first_name', 'last_name', 'district','name'], 'string', 'max' => 81],
            [['name'], 'string', 'min' => 10],
            [['ic', 'mobile'], 'string', 'max' => 15],
            [['address', 'address2'], 'string', 'max' => 255],



        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                $profile = new Profile();
                $profile->loadDefaultValues();
                $profile->first_name = $this->first_name;
                $profile->last_name = $this->last_name;
                $profile->dob = $this->dob;
                $profile->address = $this->address;
                $profile->address2 = $this->address2;
                $profile->district = $this->district;
                $profile->state = $this->state;
                $profile->mobile = $this->mobile;
                $profile->ic = $this->ic;
                $profile->postcode = $this->postcode;
                $profile->name = $this->name;
                $profile->link('user',$user);
                if($this->role == 'ENT')
                {
                    $ent = new Entrepreneur();
                    $ent->plkn = $this->plkn;
                    $ent->link('user',$user);
                }
                elseif($this->role == 'MNT')
                {
                    $mnt = new Mentor();
                    $mnt->link('user',$user);
                }

                Yii::$app->mailer->compose()
                    ->setFrom('admin@9teraju.com')
                    ->setTo($user->email)
                    ->setSubject('SALEXES Registration')
                    ->setTextBody('Congratulations you have been succesfully registered with us !!!')
                    ->setHtmlBody('<b>Please contact admin@9teraju.com to make payment for account activation.</b>')
                    ->send();
                return $user;
            }

        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'plkn' => Yii::t('app', 'PLKN Name'),
            'ic' => Yii::t('app', 'Identity Card Number'),
            'address' => Yii::t('app', 'Address Line 1'),
            'address2' => Yii::t('app', 'Address Line 2'),
            'mobile' => Yii::t('app', 'Telephone / Mobile'),

        ];
    }
}
