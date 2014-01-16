<?php
class Listword extends Eloquent
{
	public function wordinfo() {
		return $this->hasMany('Wordinfo','id');;
	}	
}
