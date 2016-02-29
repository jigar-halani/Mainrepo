<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Card extends Model
{
	protected $table = 'cards';
	protected $primaryKey='cards_id';
	protected $fillable=[
		'title',
		'description','user_id'
	];
	public function notes()
	{
		return $this->hasMany(Note::class,'cards_id','cards_id');
	}
	public function scopeLocatedAt($query,$title)
	{
		return $query->where(compact('title'));
	}
	public function scopeLocatedAtById($query,$cards_id){
		//return

		return $query->where(compact('cards_id'));
	}
	public function cardimages()
	{
		return $this->hasMany(Card_image::class,'cards_id','cards_id');
	}



}