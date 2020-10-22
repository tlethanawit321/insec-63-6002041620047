<?php

use yii\db\Migration;

/**
 * Class m201022_105442_create_permission_of_post
 */
class m201022_105442_create_permission_of_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $create = $auth->createPermission('post-create');
        $create->description = 'Create a post';
        $auth->add($create);

        $update = $auth->createPermission('post-update');
        $update->description = 'Update a post';
        $auth->add($update);

        $delete = $auth->createPermission('post-delete');
        $delete->description = 'Delete a post';
        $auth->add($delete);

        $view = $auth->createPermission('post-view');
        $view->description = 'View a post';
        $auth->add($view);

        $index = $auth->createPermission('post-index');
        $index->description = 'List a post';
        $auth->add($index);

        return true;
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = yii::$app->authManager;

        $create = $auth->getPermission('post-create');
        if($create){
            $auth->remove($create);
        }

        $update = $auth->getPermission('post-update');
        if($update){
            $auth->remove($update);
        }

        $index = $auth->getPermission('post-index');
        if($index){
            $auth->remove($index);
        }

        $delete = $auth->getPermission('post-delete');
        if($delete){
            $auth->remove($delete);
        }

        $view = $auth->getPermission('post-view');
        if($view){
            $auth->remove($view);
        }
        return false;
    }
}
