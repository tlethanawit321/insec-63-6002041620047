<?php
namespace backend\models;
class AuthAssignment extends \common\models\AuthAssignment{
    public function getUserName()
    {
        return $this->hasOne(User::class,['id'=>'user_id']);
    }
    
    
    
}