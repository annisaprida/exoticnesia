<?php

class InfonesiaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'postOnly + deleteReview',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','index','container','rating','deleteReview','newReview'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','indexadmin','deleteReview'),
				'users'=>array('admin'),
				// 'users' => array('@'),
				// 'expression'=>'isset($user->role) && ($user->role===isAdmin())'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$infonesia=$this->loadModel($id);
        $rating = $this->actionSumRating($infonesia);
        $review = $this->newReview($infonesia);
        $urlpic = $infonesia->urlpics;
        $tempatmakan = $this->actionTempatMakan($infonesia);
        $penginapan = $this->actionPenginapan($infonesia);

        $this->render('view',array(
            'model'=>$infonesia,
            'review'=>$review,
            'rating'=>$rating,
            'urlpic'=>$urlpic,
            'tempatmakan'=>$tempatmakan,
            'penginapan'=>$penginapan,
        ));
	}

	 public function actionTempatMakan($model) {
        $criteria = new CDbCriteria;

        $dataProvider = new CActiveDataProvider('Tempatmakan',array(
            'criteria'=>array('condition'=> 'namadaerah=\''.$model->namadaerah.'\'')
        ));

        return $dataProvider;
    }

    public function actionPenginapan($model) {
        $criteria = new CDbCriteria;

        $dataProvider = new CActiveDataProvider('Penginapan',array(
            'criteria'=>array('condition'=> 'namadaerah=\''.$model->namadaerah.'\'')
        ));

        return $dataProvider;
    }

    protected function newReview($infonesia)
    {
        $review=new Review;
        if(isset($_POST['Review']))
        {
            $review->attributes=$_POST['Review'];
            if($infonesia->addReview($review))
            {
                Yii::app()->user->setFlash('commentSubmitted','Review anda telah tersimpan.');
                $this->refresh();
            }
        }
        return $review;
    }

    public function actionRating() {
    	//edit by Annisa Prida
    	$username = $_POST['username'];
    	$id = $_POST['id'];
    	$rating = $_POST['rate'];
    	$model = $this->loadModel($id);
    	$model->rate($username,$rating);
        $totalRating = $model->getTotalRating();
        $ratersCount = $model->getRatersCount();
		$avg_rating = ((double)$totalRating / $ratersCount);
		$model->updateRating($avg_rating);
         if ( ! $totalRating)
			echo 'N/A';
		else
			echo '' . $avg_rating . ' (dari ' . $ratersCount . ' pengguna)';
    }

    public function actionSumRating($model) {

       	$query = 'select namadaerah, COUNT(*) as jumlah, SUM(nilai) as nilaikes from rating where namadaerah = \''.$model->namadaerah.'\'group by namadaerah';
        $models = Yii::app()->db->createCommand($query)->queryRow();

            if ($models['jumlah'] != 0) {
                $jumlah = $models['jumlah'];
                $nilai = $models['nilaikes'];
                
                $rate = round($nilai/$jumlah,1);
            } else {
                $rate = '-';
            }
           return $rate;
    }
        

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	/**
	 * Merubah proses pembuatan Infonesia secara besar-besaran
	 * Perubahan ditujukan untuk pesan error pada model Urlpic, Penginapan dan Tempatmakan agar bisa ditampilkan
	 */
		$model= new Infonesia;
		$item1 = new Urlpic;
		$item2 = new Urlpic;
		$item3 = new Urlpic;
		$item4 = new Urlpic;
		$item5 = new Urlpic;
		$place2 = new Penginapan;
		$resto = new Tempatmakan;
		$gambarBoolean = false;
		$tempatMakanBoolean = false;
		$penginapanBoolean = false;
		$infonesiaBoolean = false;
		$i = 0;
		
		$path = Yii::app()->basePath.'/../images/';
		if(isset($_POST['Infonesia'])&&isset($_POST['Urlpic']))
			{
				$model->attributes = $_POST['Infonesia'];
				
				$model->username='admin';
				if($model->validate())
				{
						$infonesiaBoolean = true;
				}
				$path = Yii::app()->basePath . '/../images/infonesia/' .$model->namadaerah. '/';
					$array = $_POST['Urlpic'];
					$gambar = array();
					$j = 0;
					foreach ($array as $isi) 
					{	
						
						$image = CUploadedFile::getInstance(Urlpic::model(), '['.$j.']gambar_daerah');
						if(!empty($image))
                        {
							if($j == 0){
								$gambar[$j]=$image;
								$item1->namadaerah = $model->namadaerah;
								$item1->gambar_daerah = $j;
								$item1->urlpic = $gambar[$j]->name;
								if($item1 -> validate()){
									$j+=1;
								}
							}else if($j == 1){
								$gambar[$j]=$image;

								$item2->namadaerah = $model->namadaerah;
								$item2->gambar_daerah = $j;
								$item2->urlpic = $gambar[$j]->name;
								if($item2 -> validate()){
									$j+=1;
								}
							}else if($j == 2){
								$gambar[$j]=$image;

								$item3->namadaerah = $model->namadaerah;
								$item3->gambar_daerah = $j;
								$item3->urlpic = $gambar[$j]->name;
								if($item3 -> validate()){
									$j+=1;
								}
							}else if($j == 3){
								$gambar[$j]=$image;
								$item4->namadaerah = $model->namadaerah;
								$item4->gambar_daerah = $j;
								$item4->urlpic = $gambar[$j]->name;
								if($item4 -> validate()){
									$j+=1;
								}
							}else if($j == 4){
								$gambar[$j]=$image;
								$item5->namadaerah = $model->namadaerah;
								$item5->gambar_daerah = $j;
								$item5->urlpic = $gambar[$j]->name;
								if($item5 -> validate()){
									$j+=1;
								}
							}
                        }
					}
					 
					if($item1->validate() && $item2->validate() && $item3->validate() && $item4->validate() && $item5->validate()){
						$gambarBoolean = true;
					}
					
				if(isset($_POST['Penginapan']))
					{
						$temp = $_POST['Penginapan']['penginapan'];
						$places = explode(';',$temp);
						foreach($places as $value)
						{
							$place2->penginapan = $value;
							$place2->namadaerah = $model->namadaerah;
							if($place2->validate())
							{
								$penginapanBoolean = true;
							}
								
						}
					}
					if(isset($_POST['Tempatmakan']))
					{
						$temp2 = $_POST['Tempatmakan']['tempatmakan'];
						$resto1 = explode(';',$temp2);
						foreach($resto1 as $value2)
						{
							$resto->tempatmakan = $value2;
							$resto->namadaerah = $model->namadaerah;
							if($resto->validate())
							{
								$tempatMakanBoolean = true;
							}
								
						}
					}
					if($penginapanBoolean && $tempatMakanBoolean && $gambarBoolean && $infonesiaBoolean){
													if (!is_dir($path))
									Yii::app()->helper->createFolder($path);
						$model->save();
						$item1->save();
						$resto->save();
						$place2->save();
						$gambar[0]->saveAs($path.$gambar[0]);
						$item2->save();
						$gambar[1]->saveAs($path.$gambar[1]);
						$item3->save();
						$gambar[2]->saveAs($path.$gambar[2]);
						$item4->save();
						$gambar[3]->saveAs($path.$gambar[3]);
						$item5->save();
						$gambar[4]->saveAs($path.$gambar[4]);
						$this->redirect(array('view','id'=>$model->namadaerah));
					}
			}

		$this->render('create',array(
			'model'=>$model,'place'=>$place2, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 'item4'=>$item4, 'item5'=>$item5, 'resto'=>$resto,
		));	
			
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Infonesia']))
		{
			$model->attributes=$_POST['Infonesia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->namadaerah));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Infonesia', array(
			'criteria'=>array(
	        'order'=>'avg_rating DESC',
	    ),
			));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionDeleteReview($id,$namadaerah)
	{
		$this->loadReview($id)->delete();
		Yii::app()->user->setFlash('commentDeleted','Review telah dihapus');
		$this->redirect(array('view','id'=>$namadaerah));
	}

	public function loadReview($id)
	{
		$model=Review::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionIndexadmin()
	{
		$dataProvider=new CActiveDataProvider('Infonesia');
		$this->render('indexadmin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Infonesia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Infonesia']))
			$model->attributes=$_GET['Infonesia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Infonesia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Infonesia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Infonesia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='infonesia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionContainer(){
        $this->redirect(array('container/addtodatabase','namadaerah'=>$_GET['namadaerah'],'username'=>yii::app()->user->id));
    }
}
