<?php
/**
 * 
 */
class format{
	public function validation($data){
		$data=trim($data);
		$data=htmlspecialchars($data);
		$data=htmlentities($data);
	}
	
}

?>