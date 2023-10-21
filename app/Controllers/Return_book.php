<?php
	namespace App\Controllers;
	class Return_book extends BaseController{
		public function index(){
			return view('admin_mod/return_book/return_book');
		}
	}
?>