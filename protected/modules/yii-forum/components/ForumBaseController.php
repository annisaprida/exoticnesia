<?php
/**
 * This is the base controller for any forum related contollers.
 * Its main reason for existance is it will populate the forumuser table, and
 * set the user state "forumuser_id" to a correct value.
 * All controllers in the foum module must extend from this base class.
 */
class ForumBaseController extends CController
{
	public function beforeAction($action)
	{
		// If user is guest, we have nothing to do, and if it's already
		// set, we're done
		if(Yii::app()->user->isGuest || isset(Yii::app()->user->id)) return true;

		// See if we know who this is
		$pt = Pengunjungterdaftar::model()->findByAttributes(array(Yii::app()->user->id));

		// If it's not found, we'll add it, otherwise, just update lastseen
		if(null == $pt)
		{
			$pt = new Pengunjungterdaftar;
			$pt->username = Yii::app()->user->id;
			$pt->firstseen = time();
			$pt->lastseen = time();
			$pt->save(false);
		} else {
			$pt->lastseen = time();
			$pt->save(false);
                }

                // Ad seet the user state
		Yii::app()->user->setState('id', $pt->username);

		return true;
	}
}