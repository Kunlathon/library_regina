<?php
    date_default_timezone_set('Asia/Bangkok');
?>
<?php
//ควบคุมการยืม
    class key_borrow_book{
        public $kbb_book_key,$kbb_admin_key,$kbb_user_key,$kbb_borrow_key,$kbb_key_run,$kbb_type;
        public $kbb_error,$kbb_row;
        function __construct($kbb_book_key,$kbb_admin_key,$kbb_user_key,$kbb_borrow_key,$kbb_key_run,$kbb_type){
            $this->kbb_book_key=$kbb_book_key;
            $this->kbb_admin_key=$kbb_admin_key;
            $this->kbb_user_key=$kbb_user_key;
            $this->kbb_borrow_key=$kbb_borrow_key;
            $this->kbb_key_run=$kbb_key_run;
            $this->kbb_type=$kbb_type;
            $PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();	
            $kbb_error="error";
            $kbb_datetime=date("Y-m-d H:i:s");
            $kbb_row=array();
                if(($this->kbb_type=="key")){
                    try{
                        $key_borrow_book_sql="INSERT INTO `key_borrow_book`(`kbb_book_key`, `kbb_admin_key`, `kbb_user_key`, `kbb_borrow_key`, `kbb_key_run`, `kbb_datetime`) 
                                              VALUES ('{$this->kbb_book_key}','{$this->kbb_admin_key}','{$this->kbb_user_key}','{$this->kbb_borrow_key}','$this->kbb_key_run','{$kbb_datetime}')";
                        $CountLibrary->exec($key_borrow_book_sql);
                        $kbb_error="no_error";
                    }catch(PDOException $e){
                        $kbb_error="error";     
                    }
//set null
    $kbb_row="-";   
//set null end
                }elseif(($this->kbb_type=="delete")){
                    try{
                        $delete_borrow_book_sql="DELETE FROM `key_borrow_book` 
                                                WHERE `kbb_admin_key`='{$this->kbb_admin_key}' 
                                                AND `kbb_user_key`='{$this->kbb_user_key}' 
                                                AND `kbb_borrow_key`='{$this->kbb_borrow_key}' 
                                                AND `kbb_key_run`='{$this->kbb_key_run}'";
                        $CountLibrary->exec($delete_borrow_book_sql);
                        $kbb_error="no_error";
                    }catch(PDOException $e){
                        $kbb_error="error";     
                    }
//set null
$kbb_row="-";   
//set null end                    
                }else{
                    try{
                        $key_borrow_book_sql="SELECT `kbb_book_key`,`kbb_datetime` 
                                              FROM `key_borrow_book` 
                                              WHERE `kbb_admin_key`='{$this->kbb_admin_key}' 
                                              AND `kbb_user_key`='{$this->kbb_user_key}' 
                                              AND `kbb_borrow_key`='{$this->kbb_borrow_key}' 
                                              AND `kbb_key_run`='{$this->kbb_key_run}'";
                            if(($key_borrow_book_rs=$CountLibrary->query($key_borrow_book_sql))){
                                while($key_borrow_book_row=$key_borrow_book_rs->Fetch(PDO::FETCH_ASSOC)){
                                    if((is_array($key_borrow_book_row) && count($key_borrow_book_row))){
                                        $kbb_row[]=$key_borrow_book_row;
                                        $kbb_error="error"; 
                                    }else{
                                        $kbb_row="-";
                                        $kbb_error="error"; 
                                    }
                                }     
                            }else{
                                $kbb_row="-";
                                $kbb_error="error"; 
                            }
                    }catch(PDOException $e){
                        $kbb_row="-";
                        $kbb_error="error"; 
                    }
                }
            $this->kbb_error=$kbb_error;
            $this->kbb_row=$kbb_row;
            $CountLibrary=null;
        }function Control_Borrow(){
            return $this->kbb_error;
        }function Control_Borrow_Data(){
            return $this->kbb_row;
        }
    }
?>



<?php
    class set_borrow_book{
        public $set_type,$sbb_key,$sbb_price,$sbb_time,$sbb_t,$sbb_y,$sbb_quota,$sbb_datetime,$sbb_save;
        public $borrow_book_row,$borrow_error;
        function __construct($set_type,$sbb_key,$sbb_price,$sbb_time,$sbb_t,$sbb_y,$sbb_quota,$sbb_datetime,$sbb_save){
            $this->set_type=$set_type;
            $this->sbb_key=$sbb_key;
            $this->sbb_price=$sbb_price;
            $this->sbb_time=$sbb_time;
            $this->sbb_t=$sbb_t;
            $this->sbb_y=$sbb_y;
            $this->sbb_quota=$sbb_quota;
            $this->sbb_datetime=$sbb_datetime;
            $this->sbb_save=$sbb_save;
            $borrow_book_row=array();
            $borrow_error="Error";
            $PDO_library=new count_library();
			$CountLibrary=$PDO_library->CallCountLibrary();	
                if(($this->set_type=="read")){
                    try{
                        $set_borrow_book_sql="SELECT * FROM `bb_set` 
                                              WHERE `set_key`='Rc_Book01';";
                            if(($set_borrow_book_rs=$CountLibrary->query($set_borrow_book_sql))){
                                $set_borrow_book_row=$set_borrow_book_rs->Fetch(PDO::FETCH_ASSOC);
                                    if((is_array($set_borrow_book_row) && count($set_borrow_book_row))){
                                        $borrow_book_row[]=$set_borrow_book_row;
                                        $borrow_error="No_Error";
                                    }else{
                                        $borrow_book_row="-";
                                        $borrow_error="Error";
                                    }
                            }else{
                                $borrow_book_row="-";
                                $borrow_error="Error";
                            }
                    }catch(PDOException $e){
                        $borrow_book_row="-";
                        $borrow_error="Error";
                    }
                }elseif(($this->set_type=="return_book")){
                    try{
                        $set_borrow_book_sql="SELECT * FROM `bb_set` 
                                              WHERE `set_key`='{$this->sbb_key}';";
                            if(($set_borrow_book_rs=$CountLibrary->query($set_borrow_book_sql))){
                                $set_borrow_book_row=$set_borrow_book_rs->Fetch(PDO::FETCH_ASSOC);
                                    if((is_array($set_borrow_book_row) && count($set_borrow_book_row))){
                                        $borrow_book_row[]=$set_borrow_book_row;
                                        $borrow_error="No_Error";
                                    }else{
                                        $borrow_book_row="-";
                                        $borrow_error="Error";
                                    }
                            }else{
                                $borrow_book_row="-";
                                $borrow_error="Error";
                            }
                    }catch(PDOException $e){
                        $borrow_book_row="-";
                        $borrow_error="Error";
                    }
                }else{
                    $borrow_book_row="-";
                    $borrow_error="Error";                   
                }
            $this->borrow_book_row=$borrow_book_row;
            $this->borrow_error=$borrow_error;
            $CountLibrary=null;
        }function show_borrow_book(){
            return $this->borrow_book_row;
        }function error_borrow_book(){
            return $this->borrow_error;
        }
    }
?>

<?php
//The Test Books ตรวจสอบหนังสือในทะเบียน
    class test_books_data{
        public $tbd_key;
        public $count_book_test,$llb_error;
        function __construct($tbd_key){
            $this->tbd_key=$tbd_key;
//db
            $PDO_library=new count_library();
            $CountLibrary=$PDO_library->CallCountLibrary();	
//db end
            $llb_error="error";
            try{
                $set_listbooks_sql="SELECT COUNT(`LLB_Key`) AS `count_llb` 
                                    FROM `library_listbooks` 
                                    WHERE `LLB_Key`='{$this->tbd_key}'
                                    AND `Li_StatusNo`='LS001';";
                    if(($set_listbooks_rs=$CountLibrary->query($set_listbooks_sql))){
                        $set_listbooks_row=$set_listbooks_rs->Fetch(PDO::FETCH_ASSOC);
                            if((is_array($set_listbooks_row) && count($set_listbooks_row))){
                                $count_llb=$set_listbooks_row["count_llb"];
                            }else{
                                $count_llb="-";
                            }
                    }else{
                        $count_llb="-";
                    }
            }catch(PDOException $e){
                $count_llb="-";
            }

            if(($count_llb>=1)){
                $llb_error="noerror";
//test listbooks
                try{
                    $test_listbooksSql="SELECT COUNT(`LLB_Key`) AS `count_book_test` 
                                        FROM `library_listbooks` 
                                        WHERE `LLB_Key`='{$this->tbd_key}' 
                                        AND `Li_StatusNo`='LS001';";
                        if(($test_listbooksRs=$CountLibrary->query($test_listbooksSql))){
                            $test_listbooksRow=$test_listbooksRs->Fetch(PDO::FETCH_ASSOC);
                                if((is_array($test_listbooksRow) && count($test_listbooksRow))){
                                    $count_book_test=$test_listbooksRow["count_book_test"];
                                }else{
                                    $count_book_test="-";
                                }
                        }else{
                            $count_book_test="-";
                        }
                }catch(PDOException $e){
                    $count_book_test="-";
                }
//test listbooks end
            }else{
                $llb_error="error";
                $count_book_test="-";
            }
        $this->llb_error=$llb_error;
        @$this->count_book_test=$count_book_test;
        $CountLibrary=null;
        }function Call_Test_Books_Data(){
            return $this->count_book_test;
        }function Call_llb_error(){
            return $this->llb_error;
        }
    }
//The Test Books end
?>

<?php
//ตรวจสอบยืนซ้ำซ้อน
    class test_books_borrow{
        public $tbb_key,$type;
        public $tbb_error;
        function __construct($tbb_key,$type){
//db
            $PDO_library=new count_library();
            $CountLibrary=$PDO_library->CallCountLibrary();	
//db end 
            $this->tbb_key=$tbb_key;
            $this->type=$type;
            $tbb_error="error";  
                if(($this->type=="test")){
                    try{
                        $tbb_sql="SELECT COUNT(`bba_key`) AS `count_borrow` 
                                FROM `borrowed_items` 
                                WHERE `bud_books_id`='{$this->tbb_key}' 
                                AND `status_key`='1';";
                        $tbb_rs=$CountLibrary->query($tbb_sql);
                        $tbb_row=$tbb_rs->Fetch(PDO::FETCH_ASSOC);
                            if((is_array($tbb_row) && count($tbb_row))){
                                $count_borrow=$tbb_row["count_borrow"];
                                    if(($count_borrow>=1)){
                                        $tbb_error="error";
                                    }else{
                                        $tbb_error="on_error";
                                    }
                            }else{
                                $tbb_error="null_error";
                            }
                    }catch(PDOException $e){
                        $tbb_error="null_error";
                    }
                }else{
                    $tbb_error="null_error";
                }

            $this->tbb_error=$tbb_error;
            $CountLibrary=null;
        }function run_test_books_borrow(){
            return $this->tbb_error;
        }
    }
?>


<?php 
//สร้างรหัสใบยืมหนังสือ
    class Key_borrow{ 
        public $bba_key;
        function __construct(){

            //db
            $PDO_library=new count_library();
            $CountLibrary=$PDO_library->CallCountLibrary();	
            //db end            

            //$borrowed_date=date("Y-m-d H:i:s",strtotime($this->borrowed_date));
            $test_y=date("Y");

            try{
                $test_nullSql="SELECT COUNT(`bba_key`) AS `count_bbd` 
                               FROM `bb_borrow_data` 
                               WHERE bba_key` LIKE '%{$test_y}%'";
                $test_nullRs=$CountLibrary->query($test_nullSql);
                $test_nullRow=$test_nullRs->Fetch(PDO::FETCH_ASSOC);
                    if((is_array($test_nullRow) && count($test_nullRow))){
                        $count_bbd=$test_nullRow["count_bbd"];
                    }else{
                        $count_bbd=0;
                    }
            }catch(PDOException $e){
                $count_bbd=0;
            }

            $count_bbd=$count_bbd+1;
            $bba_key=date("Y").$count_bbd; //Ex id=> 20231

            try{
                $test_bbaSql="SELECT COUNT(`bba_key`) AS `count_bba` FROM `bb_borrow_data` WHERE `bba_key`='{$bba_key}'";
                $test_bbaRs=$CountLibrary->query($test_bbaSql);
                $test_bbaRow=$test_bbaRs->Fetch(PDO::FETCH_ASSOC);
                    if((is_array($test_bbaRow) && count($test_bbaRow))){
                        $count_bba=$test_bbaRow["count_bba"];
                    }else{
                        $count_bba=0;
                    }
            }catch(PDOException $e){
                $count_bba=0;
            }
            while($count_bba!=0){

                $count_bbd=$count_bbd+1;
                $bba_key=date("Y").$count_bbd;

                try{
                    $test_bbaSql="SELECT COUNT(`bba_key`) AS `count_bba` FROM `bb_borrow_data` WHERE `bba_key`='{$bba_key}'";
                    $test_bbaRs=$CountLibrary->query($test_bbaSql);
                    $test_bbaRow=$test_bbaRs->Fetch(PDO::FETCH_ASSOC);
                        if((is_array($test_bbaRow) && count($test_bbaRow))){
                            $count_bba=$test_bbaRow["count_bba"];
                        }else{
                            $count_bba=0;
                        }
                }catch(PDOException $e){
                    $count_bba=0;
                }

            }

            $this->bba_key=$bba_key;
            $CountLibrary=null;

        }function borrow_key(){
            return $this->bba_key;
        }
    }
?>

<?php
    //บันทึกใบยืมหนังสือ
    class Borrow_Document{
        public $bd_borrow_key,$bd_uesr_id,$bd_datatime,$bd_save,$bd_t,$bd_y,$bd_setKey;
        public $ss_error;
            function __construct($bd_borrow_key,$bd_uesr_id,$bd_datatime,$bd_save,$bd_t,$bd_y,$bd_setKey){
                $this->bd_borrow_key=$bd_borrow_key;
                $this->bd_uesr_id=$bd_uesr_id;
                $this->bd_datatime=$bd_datatime;
                $this->bd_save=$bd_save;
                $this->bd_t=$bd_t;
                $this->bd_y=$bd_y;
                $this->bd_setKey=$bd_setKey;
//db
                $PDO_library=new count_library();
                $CountLibrary=$PDO_library->CallCountLibrary();	
//db end
                $ss_error="yes";
                try{
                    $into_bb_borrow_dataSql="INSERT INTO `bb_borrow_data`(`bba_key`, `bba_uesr_id`, `bba_datetime`, `bba_save`, `bb_t`, `bb_y`, `set_key`) 
                                             VALUES ('{$this->bd_borrow_key}','{$this->bd_uesr_id}','{$this->bd_datatime}','{$this->bd_save}','{$this->bd_t}','{$this->bd_y}','{$this->bd_setKey}')";
                    $CountLibrary->exec($into_bb_borrow_dataSql);
                    $ss_error="no";
                }catch(PDOException $e){
                    $ss_error="yes";
                }

                    if(($ss_error=="no")){
//into bb_user_data
                        try{
                            $into_user_dataSql="INSERT INTO `bb_user_data`(`bud_key`, `bud_date`) 
                                                VALUES ('{$this->bd_uesr_id}','{$this->bd_datatime}')";
                            $CountLibrary->exec($into_user_dataSql);
                        }catch(PDOException $e){
                            try{
                                $update_user_dataSql="UPDATE `bb_user_data` 
                                                    SET `bud_date`='{$this->bd_datatime}' 
                                                    WHERE `bud_key`='{$this->bd_uesr_id}'";
                                $CountLibrary->exec($update_user_dataSql);
                            }catch(PDOException $e){}
                        }
//bb_user_data end
                        $ss_error="no";
                    }else{
                        $ss_error="yes";
                    }
                $this->ss_error=$ss_error;
                $CountLibrary=null;
            }function Run_Borrow_document(){
                return $this->ss_error;
            }
    }
?>





<?php
//บันทึกรายการหนังสือ
    class borrow_books_items{
        public $bbi_user_key,$bbi_bb_key,$bbi_admin_key,$bbi_date,$bbi_books_key;
        public $items_error;
            function __construct($bbi_user_key,$bbi_bb_key,$bbi_admin_key,$bbi_date,$bbi_books_key){
                $this->bbi_user_key=$bbi_user_key;
                $this->bbi_bb_key=$bbi_bb_key;
                $this->bbi_admin_key=$bbi_admin_key;
                $this->bbi_date=$bbi_date;
                $this->bbi_books_key=$bbi_books_key;

//db
                $PDO_library=new count_library();
                $CountLibrary=$PDO_library->CallCountLibrary();	
//db end
                $items_date=date("Y-m-d H:i:s",strtotime($this->bbi_date));
                $items_error="yes";

                try{
                    $books_itemsSql="INSERT INTO `borrowed_items`(`bba_key`, `bud_key`, `bud_books_id`, `bud_datetime_a`,  `bud_save`, `bud_price`, `status_key`)
                                     VALUES ('{$this->bbi_bb_key}','{$this->bbi_user_key}','{$this->bbi_books_key}','{$items_date}','{$this->bbi_admin_key}','0.00','1')";
                    $CountLibrary->exec($books_itemsSql);
                    $items_error="no";
                }catch(PDOException $e){
                    $items_error="yes";
                }
        
                $this->items_error=$items_error;
                $CountLibrary=null;
            }function Run_Borrow_Books_Items(){
                return $this->items_error;
            }
    }

?>


<?php
//บันทึกรายการหนังสือคืน
    class return_books_items{
        public $rbi_bba_key,$rbi_bud_key,$rbi_books_id,$rbi_datetime_b,$rbi_reurn_save,$rbi_bud_price;
        public $items_error;
            function __construct($rbi_bba_key,$rbi_bud_key,$rbi_books_id,$rbi_datetime_b,$rbi_reurn_save,$rbi_bud_price){
				$this->rbi_bba_key=$rbi_bba_key;
				$this->rbi_bud_key=$rbi_bud_key;
				$this->rbi_books_id=$rbi_books_id;
				$this->rbi_datetime_b=$rbi_datetime_b;
				$this->rbi_reurn_save=$rbi_reurn_save;
				$this->rbi_bud_price=$rbi_bud_price;

//db
                $PDO_library=new count_library();
                $CountLibrary=$PDO_library->CallCountLibrary();	
//db end
                $items_date=date("Y-m-d H:i:s",strtotime($this->rbi_datetime_b));
                $items_error="yes";

                try{
                    $books_itemsSql="UPDATE `borrowed_items` 
									SET `bud_datetime_b`='{$items_date}'
									,`bud_reurn_save`='{$this->rbi_reurn_save}'
									,`bud_price`='{$this->rbi_bud_price}'
									,`status_key`='2' 
									WHERE `bba_key`='{$this->rbi_bba_key}' 
									AND `bud_key`='{$this->rbi_bud_key}' 
									AND `bud_books_id`='{$this->rbi_books_id}'";
                    $CountLibrary->exec($books_itemsSql);
                    $items_error="no";
                }catch(PDOException $e){
                    $items_error="yes";
                }
        
                $this->items_error=$items_error;
                $CountLibrary=null;
            }function Run_Return_Books_Items(){
                return $this->items_error;
            }
    }
?>






<?php
    //return_book ตรวจสอบหนังสือ มีการยืมถูกต้อง

    class test_return_book{
        public $trb_bookkey,$type;
        public $trb_error,$trb_row_date;
            function __construct($trb_bookkey,$type){
            $this->trb_bookkey=$trb_bookkey;
            $this->type=$type;
            $trb_error="error";
            $trb_row_date=array();
//db
            $PDO_library=new count_library();
            $CountLibrary=$PDO_library->CallCountLibrary();	
//db end
                if(($this->type=="print_data")){
                    try{
                        $pd_return_book_sql="SELECT * 
                                             FROM `borrowed_items` 
                                             WHERE `bud_books_id`='{$this->trb_bookkey}' 
                                             AND `status_key`='1'";
                        $pd_return_book_rs=$CountLibrary->query($pd_return_book_sql);
                            while($pd_return_book_row=$pd_return_book_rs->Fetch(PDO::FETCH_ASSOC)){
                                if((is_array($pd_return_book_row) && count($pd_return_book_row))){
                                    $trb_row_date[]=$pd_return_book_row;
                                }else{
                                    $trb_row_date="-";
                                }
                            }
                    }catch(PDOException $e){
                        $trb_row_date="-";
                    } 
$trb_error="-";
                }else{

                    try{
                        $test_return_book_sql="SELECT COUNT(`bba_key`) AS `test_count_book` 
                                            FROM `borrowed_items` 
                                            WHERE `bud_books_id`='{$this->trb_bookkey}' 
                                            AND `status_key`='1'";
                        $test_return_book_rs=$CountLibrary->query($test_return_book_sql);
                        $test_return_book_row=$test_return_book_rs->Fetch(PDO::FETCH_ASSOC);
                            if((is_array($test_return_book_row) && count($test_return_book_row))){
                                $test_count_book=$test_return_book_row["test_count_book"];
                                    if(($test_count_book>=1)){
                                        $trb_error="no_error";
                                    }else{
                                        $trb_error="error";
                                    }
                            }else{
                                $trb_error="-";
                            }
                    }catch(PDOException $e){
                        $trb_error="-";
                    } 
$trb_row_date="-";
                } 

            $this->trb_error=$trb_error;
            $this->trb_row_date=$trb_row_date;
            $CountLibrary=null;

            }function return_book_error(){
                return  $this->trb_error;
            }function return_book_row_data(){
                return  $this->trb_row_date;
            }
    }

?>

<?php
    class vocabulary_book{
        
        public $vb_data_a,$vb_data_b,$vb_day,$vb_price;
        public $book_price,$data_day_book;
            function __construct($vb_data_a,$vb_data_b,$vb_day,$vb_price){
                
                $this->vb_data_a=$vb_data_a;
                $this->vb_data_b=$vb_data_b;
                $this->vb_day=$vb_day;
                $this->vb_price=$vb_price;

                $set_data_code_a=date("Y-m-d",strtotime($this->vb_data_a));
                $set_data_code_b=date("Y-m-d",strtotime($this->vb_data_b));

                $data_day_book=(strtotime($set_data_code_b) - strtotime($set_data_code_a))/  ( 60 * 60 * 24 );

                $book_day=$this->vb_day;

                    if($data_day_book>=$book_day){
                        $price=($data_day_book-$this->vb_day);
                        $book_price=($price*$this->vb_price);
                    }else{
                        $book_price=0;
                    }

                $this->book_price=$book_price;
                $this->data_day_book=$data_day_book;

            }function Call_Book_price(){
                return $this->book_price;
            }function Call_Sum_Day(){
                return $this->data_day_book;
            }
    }
?>