<?php
	namespace App\Controllers;
	class BooksLibrary extends BaseController{
		public function index(){
			return view('admin_mod/books_library/Show_books_library');
		}public function Adddata_books_library(){
			return view('admin_mod/books_library/Adddata_books_library');
		}
	}
?>