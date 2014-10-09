<?php
class Panchayat extends Eloquent{
	
	protected $table = 'panchayats';
	
	public function district(){
		return $this->belongsTo('District');
	}

	public function block(){
		return $this->belongsTo('Block');
	}
}