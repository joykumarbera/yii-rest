<?php

namespace rest\versions\v1\controllers;

use common\models\LoginForm;
use yii\rest\ActiveController;

/**
 * Class UserController
 */
class UserController extends ActiveController
{
    /**
     * log a user in
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        if($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login())
        {
            return [
                'access_token' => \Yii::$app->user->identity->getAuthKey(),
                'token_type' => 'Bearer',
                'expires_in' => null,
                'refresh_token' => null
            ];
        }
        else
        {
            return $model;
        }
    }
}