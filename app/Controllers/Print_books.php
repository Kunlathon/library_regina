<?php
	namespace App\Controllers;
    
	class Print_books extends BaseController{

        /*public function index($books){
            $row_print_book=array('books'=>$books);
			return view('print_books/code_books_key',$row_print_book);
		}*/

        public function books($books){
            $row_print_book=array('books'=>$books);
			return view('print_books/code_books_key',$row_print_book);
		}

        public function books_count($books){
            $row_print_book=array('books'=>$books);
			return view('print_books/code_books_count',$row_print_book);
		}

	}
?>