<?php

use yii\db\Migration;

/**
 * Class m201022_093951_create_item_for_rbac
 */
class m201022_093951_create_item_for_rbac extends Migration
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
        
        // print_r($auth);
        return true;
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
        echo "m201022_093951_create_item_for_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_093951_create_item_for_rbac cannot be reverted.\n";

        return false;
    }
    */
}
