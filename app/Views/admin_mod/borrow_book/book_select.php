<meta charset="utf-8">
<?php
	$session=session();
	$input_book_select=\Config\Services::request();
		if($session->has("IL_Key")>=1){
			if($_SESSION["IL_Status"]==1){
                include(APPPATH."Database-pdo/pdo_data.php");
                include(APPPATH."Database-pdo/pdo_conndatastu.php");
                include(APPPATH."Database-pdo/class_data.php");
            
                include(APPPATH."Database-pdo/pdo_library.php");
                include(APPPATH."Database-pdo/class_library.php");
                include(APPPATH."Database-pdo/class_data_library.php");
                include(APPPATH."Database-pdo/class_borrow_book.php");
            ?>
                
			
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        $data_set_borrow_book=new set_borrow_book("read","-","-","-","-","-","-","-","-");
        foreach($data_set_borrow_book->show_borrow_book() as $rc_book=>$data_set_book){
            if(($data_set_borrow_book->error_borrow_book()!="Error")){
                $set_key=$data_set_book["set_key"];
                $set_price=$data_set_book["set_price"];
                $set_time=$data_set_book["set_time"];
                $set_t=$data_set_book["set_t"];
                $set_y=$data_set_book["set_y"];
                $set_quota=$data_set_book["set_quota"];
            }else{
                $set_key="-";
                $set_price="-";
                $set_time="-";
                $set_t="-";
                $set_y="-";
                $set_quota="-";
            }
        }
    ?>

            <select class="select-menu-color" name="user_books" id="user_books">
                    <option value=""></option>               
                <optgroup label="รายชื่อสมาชิกห้องสมุด">
                    

    <?php
       // $data_name=new PrintReginaStuDataClass("16050");
     //$data_name->PRS_nameTH;
    ?>

 

    <?php
    
            $Data_User=new PrintReginaYear($set_y,$set_t);
            foreach($Data_User->RunReginaStuClass() as $user_key=>$Data_UserRow){ 
                $student_key=$Data_UserRow["rsd_studentid"];
                $data_name=new PrintReginaStuDataClass($student_key);
                
                ?>
                    <option value="<?php echo $student_key;?>"><?php echo $student_key."-".$data_name->PRS_nameTH." (".$data_name->PRS_nickTh.")";?></option>
    <?php   } ?>
                </optgroup>
            </select>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
			}else{
				exit("<script>window.location='/UserLogin/Logout';</script>");
			}
		}else{
			exit("<script>window.location='/UserLogin/Logout';</script>");
		}
?>