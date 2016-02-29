<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Note extends Model
{
    //
	protected $table = 'notes';
	protected $primaryKey='note_id';
	protected  $fillable=['body'];

	public function cards()
	{
		return 	$this->belongsTo(Card::class);
	}
}
