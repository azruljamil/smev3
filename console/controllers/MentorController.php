<?php
/**
 * Created by PhpStorm.
 * User: Fahmy
 * Date: 11/12/15
 * Time: 12:08 PM
 */
namespace console\controllers;

use common\models\Mentor;
use common\models\MentorEntrepreneur;
use common\models\User;
use yii\base\InvalidCallException;
use yii\console\Controller;
use yii\helpers\Console;

class MentorController extends Controller
{

    public function actionCreate($id)
    {
        $user = User::findOne($id);
        if(isset($user))
        {
            $mentor = new Mentor();
            try
            {
                $mentor->link('user',$user);
                echo "ok id:$id\n";
                var_dump($mentor->user);
            }
            catch ( InvalidCallException $e)
            {
                echo $e->getMessage();
            }
        }
        else
            echo "User id:$id not found";
    }

    public function actionAssign($mentor,$ent)
    {
        $mentor_ent = new MentorEntrepreneur();
        $mentor_ent->mentor_id=$mentor;
        $mentor_ent->entrepreneur_id=$ent;
        if($mentor_ent->save())
            return "Done\n";
        else
            return "Failed\n";

    }

    public function actionGetEnt($mentor_id)
    {
        $mentor = Mentor::findOne($mentor_id);
        $results = $mentor->entrepreneurs;
//        echo "Record :".count($results)."\n";
//        echo "user_id:".$results[0]->user_id."\n";
//        echo "username:".$results[0]->user->username."\n";
        foreach($results as $key=>$value)
        {
            echo "user_id:".$value->user_id."\n";
            echo "username:".$value->user->username."\n";
        }
    }

}