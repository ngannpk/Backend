<?php

//http://localhost/yii/index.php?r=toan-hoc/cong-hai-so
//toan-hoc (Controller): ToanHocController in frontend/controllers/ToanHocController (class php)
//cong-hai-so (View): actionCongHaiSo in frontend/views/toan-hoc (same name as Controller)
namespace frontend\controllers;


use yii\web\Controller;

class ToanHocController extends Controller //NO echo or print in Controller
{
    public function actionCongHaiSo(){
        return $this->render("_form_cong_hai_so.php", [
            'a' => rand(0, 1000),
            'b' => rand(1001, 2000),
            //'sum' => 'a' + 'b',
        ]);
    }
}