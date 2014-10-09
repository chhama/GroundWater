<?php
class OfficeDivision extends Eloquent{
	
	protected $table = 'office_divisions';

	public function officeZone(){
		return $this->belongsTo('OfficeZone');
	}

	public function officeCircle(){
		return $this->belongsTo('OfficeCircle');
	}
	
}