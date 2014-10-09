<?php
class Tubewell extends Eloquent{
	
	protected $table = 'tubewells';

	// Location
	public function district(){
		return $this->belongsTo('District');
	}

	public function block(){
		return $this->belongsTo('Block');
	}

	public function panchayat(){
		return $this->belongsTo('Panchayat');
	}

	// Office
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

	public function officeSection(){
		return $this->belongsTo('OfficeSection');
	}

	// Delivery
	public function delivery(){
		return $this->belongsTo('Delivery');
	}
	
}