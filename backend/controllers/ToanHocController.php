<?php
//http://localhost/phpmyadmin/

namespace backend\controllers;


use yii\web\Controller;

class ToanHocController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionTongHaiSo(){ //action create form
        $sum='';
        if (isset($_POST['num_a'])&& isset($_POST['num_b'])){
            $sum=$_POST['num_a']+$_POST['num_b'];
        }
        return $this->render('tong_hai_so', [
            'tong_hai_so'=>$sum
        ]);
    }

    //public function actionTinhTong(){//action to handle result in form

    public function actionUser(){
        $age = "";
        if (isset($_POST['full_name'])){
            $dob = $_POST['date_of_birth'];
            $age = date("Y") - date("Y", strtotime($dob));
        }

        return $this->render('user', [
            'age' => $age
        ]);
    }
}