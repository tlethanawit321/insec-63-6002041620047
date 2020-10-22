<?php

use yii\db\Migration;
use yii\rbac\DbManager;
/**
 * Class m201022_150734_create_assignment_of_post
 */
class m201022_150734_create_assign_any_user_to_role extends Migration
{
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->init();

        $author=$auth->getRole('author');
        $admin=$auth->getRole('admin');
        $superadmin=$auth->getRole('super-admin');

        $auth->assign($author, 1);
        $auth->assign($admin, 2);
        $auth->assign($superadmin, 3);
      
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->init();

        $author =$auth->getRole('author');
        $admin=$auth->getRole('admin');
        $superadmin=$auth->getRole('super-admin');

        $auth->revoke($author, 1);
        $auth->revoke($admin, 2);
        $auth->revoke($superadmin, 3);

        return true;
    }
}
   
