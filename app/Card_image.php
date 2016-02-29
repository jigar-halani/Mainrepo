<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card_image extends Model
{
    //

	public $table='card_image';
	protected $primaryKey="card_image_id";
	protected $fillable=['image'];

	public function card()
	{
		return $this->belongsTo(Card::class,'cards_id','cards_id');
	}

}
