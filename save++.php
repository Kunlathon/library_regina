library_books (test null)
try{
    $count_book_sql="SELECT COUNT(`Books_Key`) AS `count_lb` 
                     FROM `library_books` 
                     WHERE `lk_ID`='{$this->MK_Key}';";
    if(($count_book_rs=$CountLibrary->query($count_book_sql))){
        $count_book_row=$count_book_rs->Fetch(PDO::FETCH_ASSOC);
            if((is_array($count_book_row) && count($count_book_row))){
                $count_lb=$count_book_row["count_lb"];
            }else{
                $count_lb=0;
            }
    }else{
        $count_lb=0;
    }

}catch(PDOException $e){
	$count_lb=0;
}




(test null)
try{
	$count_listbooks_sql="SELECT COUNT(`LLB_Key`) AS `count_list` 
						  FROM `library_listbooks` 
						  WHERE `LAd_No`='{$this->MAdd_Key}';";
		if(($count_listbooks_rs=$CountLibrary->query($count_listbooks_sql))){
			$count_listbooks_row=$count_listbooks_rs->Fetch(PDO::FETCH_ASSOC);
			if((is_array($count_listbooks_row) && count($count_listbooks_row))){
				$count_list=$count_listbooks_row["count_list"];
			}else{
				$count_list=0;
			}
		}else{
			$count_list=0;
		}
}catch(PDOException $e){
	$count_list=0;
}