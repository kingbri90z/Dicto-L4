<?php
class Wordinfo extends Eloquent
{
	public function listword() {
		
		return $this->belongsTo('Listword','id');
	}
}