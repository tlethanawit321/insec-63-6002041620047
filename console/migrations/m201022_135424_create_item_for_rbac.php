<?php

use yii\db\Migration;

/**
 * Class m201022_135424_create_item_for_rbac
 */
class m201022_135424_create_item_for_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = yii::$app->authManager;

        $admin=$auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);
        
        $author=$auth->createRole('author');
        $author->description = 'Author';
        $auth->add($author);
        
        $superadmin=$auth->createRole('super-admin');
        $superadmin->description = 'Super Admin';
        $auth->add($superadmin);

        return true;
        // print_r($auth);
        
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = yii::$app->authManager;
        $admin = $auth->getRole('admin');
        if($admin){
            $auth->remove($admin);
        }
        $author = $auth->getRole('author');
        if($author){
            $auth->remove($author);
        }
        $superadmin = $auth->getRole('super-admin');
        if($superadmin){
            $auth->remove($superadmin);
        }
        
    return false;
    }
}

 
    

