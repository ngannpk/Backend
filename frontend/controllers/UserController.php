<?php


namespace frontend\controllers;

use app\models\User;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;


class UserController extends Controller
{
    public function actionCreateUser(){
        //http://localhost/yii/index.php?r=user/create-user
        $user = new User();
        //VarDumper::dump($user->attributes, 10, true);
        if(isset($_POST['User'])){
            $user->load(\Yii::$app->request->post());
            if(is_array($user->hobbies))
                $user->hobbies = implode(', ', $user->hobbies);
            //$user->id = 15;
            //VarDumper::dump($user, 10, true);
            if($user->save())
                \Yii::$app->session->setFlash('Notification', 'Saved Successfully');
            else{
                VarDumper::dump(Html::errorSummary($user));
                exit;}
            //exit;
        }
        return $this->render('_form_user', array('user'=>$user));
    }

    //http://localhost/yii/index.php?r=user/get-one-user&iduser=3
    public function actionGetOneUser($iduser)
    {
//        $user = User::findOne($iduser); //Find #1
//        var_dump($user); //display raw info
//        exit;

//        VarDumper::dump($user, 10, true); //display w/ highlight and colors
//        exit;

//        $user = User::find() //Find #2
//            ->where('id = :i', [':i' => $iduser])
//            ->one();

//        $user = User::find() //Find #3
//            ->where(['id' => $iduser])
//            ->one();

        $user = User::find()//Find #4
        ->andFilterWhere(['id' => $iduser])
            ->one();


        return $this->render('user', array(
            'user_info' => $user
        ));
    }

    public function actionGetOneUserMultiWhere(){
        //http://localhost/yii/index.php?r=user/get-one-user-multi-where
        // select * from wd_user where DOB <= '1995-01-01', GENDER = 'Male', HOBBIES LIKE '%GAME%'
        $user = User::find()
            ->andFilterWhere(["<=", "dob", '1995-01-01'])
            ->andFilterWhere(['gender' => 'Male'])
            ->orderBy(['dob'=> SORT_ASC])
            //->andFilterWhere(['LIKE'], 'hobbies', 'game')
            ->one();
    }

//    public function actionGetAllUser(){
//        //http://localhost/yii/index.php?r=user/get-all-user
//        //get one user by multi users way
//        $users = User::find()->orderBy(['id' => SORT_DESC])
//            ->limit(1)
//            ->all();
//        VarDumper::dump($users, 10 , true);
//        exit;
//    }

    public function actionGetAllUser(){
        //http://localhost/yii/index.php?r=user/get-all-user
        //get all users
        $users = User::find()->all();
//        VarDumper::dump($users, 10 , true);
//        exit;
        return $this->render('user', array(
            'user_info' => $users
        ));
    }

    public function actionDeleteUser($iduser){
        //delete one user by ID
        //http://localhost/yii/index.php?r=user/delete-user&iduser=3
        $user = User::findOne($iduser);
        $user->delete();
    }

    public function actionDeleteMultiUser(){
        //delete users with conditions DOB from 1990 and Region North
        //http://localhost/yii/index.php?r=user/delete-multi-user
        User::deleteAll("year(dob) >= 1990 and year(dob) <= 1991 and region = :r",
            array(':r' => 'North'));
    }


}














