<?php
class OfficeSubDivision extends Eloquent{
	
	protected $table = 'office_sub_divisions';

	public function officeZone(){
		return $this->belongsTo('OfficeZone');
	}

	public function officeCircle(){
		return $this->belongsTo('OfficeCircle');
	}

	public function officeDivision(){
		return $this->belongsTo('OfficeDivision');
	}
	
}