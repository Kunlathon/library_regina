<?php
	namespace App\Controllers;
	class Translator extends BaseController{
		public function index(){
			return view('admin_mod/translator/translator_show');
		}
		public function processing(){
			return view('admin_mod/translator/translator_processing');
		}
	}
?>