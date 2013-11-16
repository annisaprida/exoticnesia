<?php

class PenggunaController extends Controller
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
				'actions'=>array('index','create','lupa','sendemaildaftar','daftar','kirimpwd','notiflupa','salahemail', 'verifikasi', 'kirimulangemail'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','update','upload','viewwishlist','createwishlist'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				// 'expression'=>'$users->isAdmin()'
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
		$model=$this->loadModel($id);
		$profil=$model->profils;

		$path = Yii::app()->basePath.'/../images/pengguna/' .$model->username . '/gallery' . '/';				

		if(isset($_POST['Foto']))
		{
			$foto = new Foto();
			$foto->attributes=$_POST['Foto'];
			$gambar = CUploadedFile::getInstance($foto,'foto');
			$foto->username = $profil->username;
			$foto->profil_id = $profil->id;

				if(!empty($gambar))
				{
					$foto->url=$gambar->name;
					if($foto->save())
						$gambar->saveAs($path.$gambar);
						Yii::app()->user->setFlash('success', "Foto berhasil di upload!");
				}
		}

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'pt'=>Pengunjungterdaftar::model()->find('username=?',array($this->id)),
			'profil'=>Profil::model()->find('username=?',array($this->id)),
			'foto'=>Foto::model()->find('username=?',array($this->id)),
			'wishlist'=>Wishlistmanager::model()->find('username=?',array($this->id)),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pengguna;
		$pt= new Pengunjungterdaftar;
		$profil=new Profil;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Pengunjungterdaftar']))
		{
			// $model->attributes = $_POST['Pengguna'];
			$pt->attributes = $_POST['Pengunjungterdaftar'];
			$profil->attributes = $_POST['Profil'];

			$model->isAktif=0;
			$model->kodeDaftar=md5(rand(0,1000000));

			$model->username = $pt->username;
			$profil->username = $pt->username;

			$foto=CUploadedFile::getInstance($profil,'avatar');

			if($pt->save() && $pt->validate())
			{
				if($model->save() && $model->validate())
				{
					if($profil->save() && $profil->validate())
					{
						if(!empty($foto)){
							$profil->avatar = $foto->name;
							$foto->saveAs($path.$foto);
						}

						$this->redirect(array('/pengguna/sendEmailDaftar', 'id'=>$model->username));	

					}
				} 
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'pt'=>$pt,
			'profil'=>$profil,
		));
	}

	public function actionSendemaildaftar($id)
	{
		$model=$this->loadModel($id);
		$pt=$model->username0;
		$profil=$model->profils;

		Yii::import('application.extensions.phpmailer.JPhpMailer');
		$mail = new JPhpMailer;
		$mail->IsSMTP();
		$mail->Host = 'mx1.idhostinger.com';
		$mail->Port = '2525';
		$mail->SMTPAuth = true;
		$mail->Username = 'admin@exoticnesia.pusku.com';
		$mail->Password = '3xoticn3sia';
		$mail->SetFrom('admin@exoticnesia.pusku.com', 'Administrator Exoticnesia');
		$mail->Subject = '[Exoticnesia] Verifikasi Pendaftaran';
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
		$mail->MsgHTML('Hai '. $profil->nama . '<br/> Anda telah melakukan pendaftaran dengan : <br/>
			Username: ' .$model->username . '<br/>
			Password: ' .$pt->password . '<br/>
			Klik link berikut ini untuk melakukan verifikasi :
			http://exoticnesia.pusku.com/index.php?r=pengguna/verifikasi&kode='.$model->kodeDaftar.'<br/> <br/> <br/> -Exoticnesia-'
			);
		$mail->AddAddress($pt->email);
		if($mail->Send()){
			$this->redirect(array('/pengguna/daftar','id'=>$model->username));
			// Yii::app()->user->setFlash('success', "Email berhasil dikirimkan!");
		}
		else {
			$this->redirect(array('/pengunjungterdaftar/salahemail', 'id'=>$model->username));
		}					
	}

	public function actionKirimulangemail($id)
	{
		$model=$this->loadModel($id);
		$pt=$model->username0;
		$profil=$model->profils;

		Yii::import('application.extensions.phpmailer.JPhpMailer');
		$mail = new JPhpMailer;
		$mail->IsSMTP();
		$mail->Host = 'mx1.idhostinger.com';
		$mail->Port = '2525';
		$mail->SMTPAuth = true;
		$mail->Username = 'admin@exoticnesia.pusku.com';
		$mail->Password = '3xoticn3sia';
		$mail->SetFrom('admin@exoticnesia.pusku.com', 'Administrator Exoticnesia');
		$mail->Subject = '[Exoticnesia] Verifikasi Pendaftaran';
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
		$mail->MsgHTML('Hai '. $profil->nama . '<br/> Anda telah melakukan pendaftaran dengan : <br/>
			Username: ' .$model->username . '<br/>
			Password: ' .$pt->password . '<br/>
			Klik link berikut ini untuk melakukan verifikasi :
			http://exoticnesia.pusku.com/index.php?r=pengguna/verifikasi&kode='.$model->kodeDaftar.'<br/> <br/> <br/> -Exoticnesia-'
			);
		$mail->AddAddress($pt->email);
		if($mail->Send()){
			Yii::app()->user->setFlash('success', "Email sudah dikirim!");
			$this->redirect(array('/pengguna/daftar','id'=>$model->username));
		}
		else {
			$this->redirect(array('/pengunjungterdaftar/salahemail', 'id'=>$model->username));
		}					
	}

	public function actionDaftar($id)
	{
		$model=$this->loadModel($id);
		$pt=$model->username0;
		$profil=$model->profils;

		$this->render('daftar',array(
			'model'=>$this->loadModel($id), 'pt'=>$pt, 'profil'=>$profil,
		));
	}

	/**
	* Ketika pengguna melakukan pendaftaran, harus melakukan verifikasi terlebih dahulu
	* sebelum dapat login ke sistem
	*/
	public function actionVerifikasi($kode)
	{
		$model = Pengguna::model()->find('kodeDaftar=?',array($kode));
		$id = $model->username;

		$model->isAktif = '1';
		$model->save();	

		$folder = Yii::app()->basePath.'/../images/pengguna/';
		if(!is_dir($folder.$id)){
			mkdir($folder.$id);
		}
		$f2 = Yii::app()->basePath.'/../images/pengguna/'.$id.'/';
		$avatar='avatar';
		$gallery='gallery';
		if(!is_dir($f2.$avatar)) mkdir($f2.$avatar);
		if(!is_dir($f2.$gallery)) mkdir($f2.$gallery);

		$this->render('verifikasi', array('kode' => $kode));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$pt=$model->username0;
		$profil=$model->profils;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['Profil'], $_POST['Pengunjungterdaftar']))
		{
			$_POST['Pengunjungterdaftar']['Username'] = $pt->username;
			$_POST['Pengunjungterdaftar']['Password'] = $pt->password;
			
			$pt->attributes = $_POST['Pengunjungterdaftar'];
			$profil->attributes = $_POST['Profil'];

			$pt->username = $model->username;
			$model->username = $profil->username;

			$foto=CUploadedFile::getInstance($profil,'avatar');
			$path=Yii::app()->basePath . '/../images/pengguna/' .$model->username . '/avatar' . '/';

			if($pt->save()){
				if($model->save()){ 
					if(!empty($foto)){
						$profil->avatar = $foto->name;
						if($profil->save()) {
							$foto->saveAs($path.$foto);
						}
					}
					else{
						$profil->save();
					}
					Yii::app()->user->setFlash('success', "Profil berhasil diubah!");
					$this->redirect(array('view', 'id'=>$model->username));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'pt'=>$pt,
			'profil'=>$profil,
		));
	}

	public function actionViewwishlist()
	{
	 	$model=$this->loadModel(Yii::app()->user->id);
                
        $dataProvider=new CActiveDataProvider('Container',array(
        'criteria'=>array('condition'=> 'username=\''.$model->username.'\''),
        'pagination'=>array('pageSize'=>20)));
                
		$this->render('createwishlist',array(
			'dataProvider'=>$dataProvider,
            'model'=>$model,
		));
	}

	public function actionCreatewishlist(){

		$wishlistman = new Wishlistmanager;

		$wishlistman->nama = 'My Wishlist';
		$wishlistman->username = Yii::app()->user->id;
		$wishlistman->save();
		
		$query = 'select MAX(id) as id from wishlistmanager';
		$models = Yii::app()->db->createCommand($query)->queryRow();

		$no = $models['id'];

		if(isset($_POST['container'])) {

			$array = $_POST['container']['id'];
			
			if(is_array($array)) {
				foreach ($array as $arr=>$value) {
					$container = Container::model()->findByPk($value);

					$wishlist = new Wishlist;

					$wishlist->id = $no;
					$wishlist->namadaerah = $container->namadaerah;
					$wishlist->save();

					$container->delete();
				}
			}
			$this->redirect(array('/wishlist/view', 'id'=>$wishlistman->id));
		
		} else {
			Yii::app()->user->setFlash('error',"Please, choose the infonesia first.");
			$this->redirect(array('viewwishlist'));
		}
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
		$dataProvider=new CActiveDataProvider('Pengguna');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pengguna('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pengguna']))
			$model->attributes=$_GET['Pengguna'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	* Mengambil password
	*/
	public function actionLupa()
	{
		$model=new Pengunjungterdaftar;
		//$this->performAjaxValidation($model);

		if (isset($_POST['Pengunjungterdaftar']))
		{
			$email=$_POST['Pengunjungterdaftar']['email'];
			$model = Pengunjungterdaftar::model()->find('email=?',array($email));

			if ($model !== null) 
			{
				Yii::import('application.extensions.phpmailer.JPhpMailer');
				$mail = new JPhpMailer;
				$mail->IsSMTP();
				$mail->Host = 'mx1.idhostinger.com';
				$mail->Port = '2525';
				$mail->SMTPAuth = true;
				$mail->Username = 'admin@exoticnesia.pusku.com';
				$mail->Password = '3xoticn3sia';
				$mail->SetFrom('admin@exoticnesia.pusku.com', 'Administrator Exoticnesia');
				$mail->Subject = '[Exoticnesia] Lupa Password';
				$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
				$mail->MsgHTML('Hai ' . $profil->nama .
					'Anda telah meminta password anda kepada kami. Berikut ini merupakan akun anda di sistem kami. <br/>
					Username: ' .$model->username . '<br/>
					Password: ' .$model->password . '<br/>
					Terima kasih :-) <br/> <br/> <br/>
					-Exoticnesia-'
					);
				$mail->AddAddress($model->email);
				if($mail->Send()){
					$this->redirect(array('notiflupa','id'=>$model->username));
				}
			}
			else
			{
				//Kalo email nggak terdaftar masih nggakbisa ngehandle
				Yii::app()->user->setFlash('error', "Alamat e-mail tidak terdaftar!");
				$this->refresh();
			}
		}
		$this->render('lupa', array('model' => $model));
	}

	public function actionKirimpwd($id)
	{
		//belum bisa tampilin ini
		$this->render('kirimpwd',array('pengunjungterdaftar' => $id));
	}

	public function actionNotiflupa($id)
	{
		$this->render('notiflupa',array('pengunjungterdaftar' => $id));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pengguna the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pengguna::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Pengguna $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pengguna-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}