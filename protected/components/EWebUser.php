<?php
	
	class EWebUser extends CWebUser
	{
		private $_model;

		function isGuest()
		{
			return 0;
		}

		function isAdmin()
		{
	        $user = $this->loadUser(Yii::app()->user->id);
	        if ($user === null)
	        	return 0;
	        else {
	        	return $user->admin != null; 
	        }
    	}

    	protected function loadUser($user = null)
    	{
    		if ($this-> _model === null ) {
    			if($user !== null){
    				$this -> _model = Pengunjungterdaftar::model()->findByPk($this->id); //ganti jd tabel atasnya    				
    			}
    		}
    		return $this->_model;
    	}
	}

?>