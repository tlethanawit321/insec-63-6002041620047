<?php

use yii\db\Migration;

/**
 * Class m201022_142134_create_post_permission_to_role
 */
class m201022_142134_create_post_permission_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        // //getRole
        $author = $auth->getRole('author');
        $admin= $auth->getRole('admin');
        $superadmin= $auth->getRole('super-admin');
        // //getPermission
        $listpost= $auth->getPermission('post-index');
        $createpost= $auth->getPermission('post-create');
        $updatepost= $auth->getPermission('post-update');
        $deletepost= $auth->getPermission('post-delete');
        $viewpost= $auth->getPermission('post-view');
        // //assign
        $auth->addChild($author, $createpost);
        $auth->addChild($author, $listpost);
        $auth->addChild($author, $updatepost);
        $auth->addChild($author, $viewpost);

        $auth->addChild($admin, $author);

        $auth->addChild($superadmin, $admin);
        $auth->addChild($superadmin, $deletepost);
        return true;
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->getRole('author');
        $admin= $auth->getRole('admin');
        $superadmin= $auth->getRole('super-admin');
        // //getPermission
        $listpost= $auth->getPermission('post-index');
        $createpost= $auth->getPermission('post-create');
        $updatepost= $auth->getPermission('post-update');
        $deletepost= $auth->getPermission('post-delete');
        $viewpost= $auth->getPermission('post-view');

         $auth->removeChild($author, $createpost);
        $auth->removeChild($author, $listpost);
        $auth->removeChild($author, $updatepost);
        $auth->removeChild($author, $viewpost);

        $auth->removeChild($admin, $author);

        $auth->removeChild($superadmin, $admin);
        $auth->removeChild($superadmin, $deletepost);

        return false;
    }
}
