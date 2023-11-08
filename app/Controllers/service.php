<?php
	namespace App\Controllers;
    
	class Service extends BaseController{

        /*public function index($books){
            $row_print_book=array('books'=>$books);
			return view('print_books/code_books_key',$row_print_book);
		}*/

        public function books($books){
            $row_print_book=array('books'=>$books);
			return view('service_books/service_books',$row_print_book);
		}

	}
?>