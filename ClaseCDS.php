<?php
	
	/**
	* 
	*/
	class CDS
	{
		public $id;
		public $titel;
		public $interpret;
		public $jahr;

		public function __construct(){}

		/*public function __construct($id = NULL,$titel = NULL, $interpret = NULL ,$jahr = NULL)
		{
			$this->id = $id;
			$this->titel = $titel;
			$this->interpret = $interpret;
			$this->jahr = $jahr;
		}*/

		public function toString()
		{
			return "ID: " . $this->id . " TITULO: " . $this->titel ." INTERPRETE: " . $this->interpret ." AÑO: " . $this->jahr; 
		}	
	}

?>

