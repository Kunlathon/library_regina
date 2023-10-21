<?php
	namespace App\Controllers;
	class BooksRegistration extends BaseController{
		public function index(){
			return view('admin_mod/books_registration/books_registration');
		}public function updateBooks(){
			return view('admin_mod/books_registration/up_books_registration');
		}public function DeleteBooks(){
			return view('admin_mod/books_registration/delete_books_registration');
		}
	}
?>