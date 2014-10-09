<?php
class OfficeCircle extends Eloquent{
	
	protected $table = 'office_circles';

	public function officeZone(){
		return $this->belongsTo('OfficeZone');
	}
	
}