<?php
	namespace App\Controllers;
	class Ddc extends BaseController{
		public function index(){
			return view('admin_mod/ddc/data_ddc');
		}
        public function ddcb(){
            return view('admin_mod/ddc/add_ddcb');
        }
	}
?>