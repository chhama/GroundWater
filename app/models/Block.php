<?php
class Block extends Eloquent{
	
	protected $table = 'blocks';

	public function district(){
		return $this->belongsTo('District');
	}
	
}