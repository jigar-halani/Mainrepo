<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/2/16
 * Time: 3:43 PM
 */

namespace App\Http;
class Flash{

	public function create($title,$m,$type)
	{
		session()->flash('flash_message',[
			'title' =>$title,
			'message' => $m,
			'level' =>$type
		]);
	}

	public function message($title,$m)
	{
		return $this->create($title,$m,'info');
	}

	public function success($title,$m)
	{
		return $this->create($title,$m,'success');
	}
	public function error($title,$m)
	{
		return $this->create($title,$m,'error');
	}


}