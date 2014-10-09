<?php
class OfficeSection extends Eloquent{
	
	protected $table = 'office_sections';

	public function officeZone(){
		return $this->belongsTo('OfficeZone');
	}

	public function officeCircle(){
		return $this->belongsTo('OfficeCircle');
	}

	public function officeDivision(){
		return $this->belongsTo('OfficeDivision');
	}

	public function officeSubDivision(){
		return $this->belongsTo('OfficeSubDivision');
	}
	
}