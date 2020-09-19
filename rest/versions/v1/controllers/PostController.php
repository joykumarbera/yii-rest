<?php

namespace rest\versions\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;

class PostController extends ActiveController
{
    public $modelClass = 'rest\versions\v1\models\Post';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['index']
        ];

        return $behaviors;
    }
}