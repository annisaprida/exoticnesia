<?php

class ContainerController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

        public function actionaddtodatabase(){
            $container = new Container;
            if(isset ($_GET['username']))
            {
                $container->namadaerah = $_GET['namadaerah'];
                $container->username = $_GET['username'];
                if($container->save()) {
                    Yii::app()->user->setFlash('wishlistSubmitted','Infonesia telah tersimpan');
                    $this->redirect(array('infonesia/view','id'=>$container->namadaerah));
                    

                }

            }

        }
    }
    ?>