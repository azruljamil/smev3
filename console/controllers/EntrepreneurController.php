<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 11/12/15
 * Time: 12:41 PM
 */
namespace console\controllers;

use common\models\Entrepreneur;
use common\models\User;
use yii\base\InvalidCallException;
use yii\console\Controller;
use yii\helpers\Console;

class EntrepreneurController extends Controller
{

    public function actionCreate($id)
    {
        $user = User::findOne($id);
        if(isset($user))
        {
            $ent = new Entrepreneur();
            try
            {
                $ent->link('user',$user);
                $u = $ent->user;
                echo "ok id:$id name:$u->username\n";
            }
            catch ( InvalidCallException $e)
            {
                echo $e->getMessage();
            }
        }
        else
            echo "User id:$id not found";
    }

    public function actionGetMentor($ent_id)
    {
        $ent = Entrepreneur::findOne($ent_id);
        $results = $ent->mentors;
        foreach($results as $key=>$value)
        {
            echo "user_id:".$value->user_id."\n";
            echo "username:".$value->user->username."\n";
        }

    }


}