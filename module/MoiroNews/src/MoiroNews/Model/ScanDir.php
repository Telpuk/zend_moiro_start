<?php
namespace MoiroNews\Model;

class ScanDir {
	private $dir = null;

	public function __construct($dir = null){
		try {
			if ( !is_dir( $dir ) ) {
				throw new \Exception("No exists directory");
			}
			$this->dir = $dir;
		}catch (\Exception $e){
			echo $e->getMessage();
		}
	}

	public function startScanDir(){
		$scanDir = scandir($this->dir);

		$count = count($scanDir);

		for ($i=0; $i < $count; $i++) {
			if ($scanDir[$i] == '.' || $scanDir[$i] == '..') {
				 unset($scanDir[$i]);
			}
		}

		return $scanDir;
	}
}