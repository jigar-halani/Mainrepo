<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/2/16
 * Time: 3:18 PM
 */

function flash($t=NULL,$message=NULL,$type=NULL){
	$flash=app('App\Http\Flash');
	if(func_num_args()==0){
		return $flash;
	}
	return $flash->message($t,$message,$type);
}