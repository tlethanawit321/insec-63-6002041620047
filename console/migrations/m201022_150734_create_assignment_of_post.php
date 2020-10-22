<?php

use yii\db\Migration;
use yii\rbac\DbManager;
/**
 * Class m201022_150734_create_assignment_of_post
 */
class m201022_150734_create_assignment_of_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->init();
        $author = $auth->getRole('author');
        $admin= $auth->getRole('admin');
        $superadmin= $auth->getRole('super-admin');


        $auth->assign($author, 1);
        $auth->assign($superadmin, 2);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->init();
        $author = $auth->getRole('author');
        $admin= $auth->getRole('admin');
        $superadmin= $auth->getRole('super-admin');

        $auth->revoke($admin, 2);
        
        return true;
    }
}
   
