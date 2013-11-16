<?php

class PostController extends ForumBaseController
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array('accessControl');
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
/*
            // ALL users
            array('allow',
                'actions' => array(),
                'users' => array('*'),
            ),
*/
            // authenticated users
            array('allow',
                'actions' => array('update', 'delete'),
                'users' => array('@'),
            ),

            // administrators
            array('allow',
                'actions' => array('delete'),
                'users' => array('@'), // Must be authenticated
                'expression' => 'Yii::app()->user->isAdmin()', // And must be admin
            ),

            // deny all users
            array('deny', 'users'=>array('*')),
        );
    }

    /**
     * deletePost action
     * Deletes post.
     */
    public function actionDelete($id)
    {
        if(!Yii::app()->request->isPostRequest || !Yii::app()->request->isAjaxRequest)
            throw new CHttpException(400, 'Invalid request');

        // First, we make sure it even exists
        $post = Post::model()->findByPk($id);
        $thread = $post->thread;
        $forum = $thread->forum;
        echo $thread->postCount;
        if(null == $post)
            throw new CHttpException(404, 'The requested page does not exist.');

        if($thread->postCount!==1){
            $post->delete();
            Yii::app()->user->setFlash('success', "Post berhasil dihapus!");
        }
        else{
            $thread->delete();
            $this->redirect('/forum');
            Yii::app()->user->setFlash('success', "Thread berhasil dihapus!");
        }
        

    }

    /**
     * UPDATE action. Only accessible by author and admin
     */
    public function actionUpdate($id)
    {
        $post = Post::model()->findByPk($id);
        if(null == $post)
            throw new CHttpException(404, 'Post not found.');
        if(!Yii::app()->user->isAdmin() && YII::app()->user->id != $post->authorUsername)
            throw new CHttpException(403, 'You are not allowed to edit this post.');
        
        if(isset($_POST['Post']))
        {
            $post->attributes=$_POST['Post'];
            if($post->validate())
            {
                $post->save(false);
                $this->redirect($post->thread->url);
            }
        }
        $this->render('editpost', array(
            'model'=>$post,
        ));
    }

}