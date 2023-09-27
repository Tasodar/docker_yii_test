<?php

namespace app\controllers;

use app\models\Post;
use app\models\Profile;
use Yii;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        $rows = Post::find()->all();
        return $this->render('list', compact('rows'));
    }

    public function actionAdd()
    {
        $model = new Post();
        $formData = Yii::$app->request->post();

        if(Yii::$app->request->isPost && $model->load($formData)) {

            if($model->save()){
                Yii::$app->session->addFlash('success','Data save success');
                return $this->redirect(['main/index']);
            }
            Yii::$app->session->addFlash('error','Data save fail. Looser!');
        }

        $userList = Profile::getList();
        return $this->render('add', ['model' => $model, 'userList' => $userList]);
    }

}
