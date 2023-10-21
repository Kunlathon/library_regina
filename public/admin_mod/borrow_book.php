<?php
    include("public/database/pdo_data.php");
    include("public/database/pdo_conndatastu.php");
    include("public/database/class_data.php");
            
    include("public/database/pdo_library.php");
    include("public/database/class_library.php");
    include("public/database/class_data_library.php");
    include("public/database/class_borrow_book.php");
?>

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

<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold">ระบบยืมคืนหนังสือ</span> ยืมหนังสือ
				<small class="display-block">Management Information System Regina Library</small>
			</h4>
		</div>

		<!--<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
		</div>-->

	</div>
</div>

<!-- Page container -->
<div class="page-container">
<!-- Page content -->
	<div class="page-content">
<!-- Main content -->
		<div class="content-wrapper">

    <?php
            if((!is_null(filter_input(INPUT_POST,'management')))){
                $management=filter_input(INPUT_POST,'management');
                $user_key=filter_input(INPUT_POST,'user_key');
                $borrow_count=0;
                    if(($management=="borrow")){ ?>
<!---------------------------------------------------------------->
        <?php
       
            $count_key_test=count($_POST["books_key"]);
            $books_date=date("Y-m-d H:i:s");
            $books_admin=$_SESSION["IL_Key"];
            $count_bb=0;
                while($count_bb<$count_key_test){
                    $copy_books_key=$_POST["books_key"][$count_bb];
                    $system_borrow_books=new key_borrow_book($copy_books_key,$books_admin,$user_key,'1','Key',"key");
                    $count_bb=$count_bb+1;
                }
        ?>

        <?php
            //$books_test_error="yes";
            $books_test_error=0;
            $books_test_noerror=0;
            $run_books_key=new key_borrow_book("-",$books_admin,$user_key,1,'Key',"");
            foreach($run_books_key->Control_Borrow_Data() as $books=>$run_books_key_print){
                $data_books_key=$run_books_key_print["kbb_book_key"];
                $test_books=new test_books_data($data_books_key);
                    if(($test_books->Call_llb_error()=="noerror")){
                        if(($test_books->Call_Test_Books_Data()>=1)){
                            $books_test_noerror=$books_test_noerror+1;
                        }else{
                            $books_test_error=$books_test_error+1;
                        }
                    }else{
                        $books_test_error=$books_test_error+1;
                    }
            } 
        ?>

        <?php
            if(($books_test_error==0)){
//----------------------------------------------------------------
              
            $test_borrow_error=0;
            $test_borrow_noerror=0;
            $run_books_key=new key_borrow_book("-",$books_admin,$user_key,1,'Key',"");
            foreach($run_books_key->Control_Borrow_Data() as $books=>$run_books_key_print){
                $data_books_key=$run_books_key_print["kbb_book_key"];

                $test_books_borrow=new test_books_borrow($data_books_key,"test");
                    if(($test_books_borrow->run_test_books_borrow()=="error")){
                        $test_borrow_error=$test_borrow_error+1;
                    }elseif(($test_books_borrow->run_test_books_borrow()=="on_error")){
                        $test_borrow_noerror=$test_borrow_noerror+1;
                    }else{
                        $test_borrow_noerror=$test_borrow_noerror+1;
                    }
            } 

                if(($test_borrow_error!=0)){ ?>
<!---------------------------------------------------------------->
	<div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="content-group-lg">
                <div class="alert alert-danger alert-styled-left">
                    <div style="font: 20px">ไม่สามารถดำเนินการยืมได้ เนื่องจากหนังสือได้ถูกยืมไปแล้ว</div>
				</div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<button type="button" onclick="location.href='<?php echo base_url();?>/admin?library_mod=borrow_book';" class="btn btn-success">กลับไปที่หน้ายืมหนังสือ</button>
		</div>
	</div>	
<!----------------------------------------------------------------> 
                <?php 
                    $delete_llb=new key_borrow_book("-",$books_admin,$user_key,1,"Key","delete"); 
                }else{

                    $new_key_borrow=new Key_borrow();
                    $key_borrow_document=$new_key_borrow->borrow_key();

                    $into_borrow_document=new Borrow_Document($key_borrow_document,$user_key,$books_date,$books_admin,$set_t,$set_y,$set_key);

                        if(($into_borrow_document->Run_Borrow_document()=="no")){
                                
                                $run_books_key=new key_borrow_book("-",$books_admin,$user_key,1,'Key',"");
                                foreach($run_books_key->Control_Borrow_Data() as $books=>$run_books_key_print){
                                    $data_books_key=$run_books_key_print["kbb_book_key"];
                                    $test_books=new test_books_data($data_books_key);
                                        if(($test_books->Call_llb_error()=="noerror")){
                                            if(($test_books->Call_Test_Books_Data()>=1)){
                                            
                                                $books_items=new borrow_books_items($user_key,$key_borrow_document,$books_admin,$books_date,$data_books_key);
                                                $borrow_count=$borrow_count+1;
                                            }else{
                                                //$the_test_books="no";
                                            }
                                        }else{
                                            //$the_test_books="no";
                                        }
                                }


                            $delete_llb=new key_borrow_book("-",$books_admin,$user_key,1,"Key","delete");
                        }elseif(($into_borrow_document->Run_Borrow_document()=="yes")){
                            $delete_llb=new key_borrow_book("-",$books_admin,$user_key,1,"Key","delete");
                        }else{
                            $delete_llb=new key_borrow_book("-",$books_admin,$user_key,1,"Key","delete");
                        } ?>
<!---------------------------------------------------------------->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="content-group-lg">
                <div class="alert alert-success alert-styled-left">
                    <div style="font: 20px">ดำเนินการยืมหนังสือสำเร็จ</div>
				</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">จำนวนหนังสือที่ยืม </div>
                        <div class="col-sm-10 col-md-10 col-lg-10"><?php echo $borrow_count;?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">วันที่ยืม </div>
                        <div class="col-sm-10 col-md-10 col-lg-10"><?php echo  date("d-m-Y",strtotime($books_date));?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">วันที่กำหนดส่งคืน (ยืมได้ระยะเวลา <?php echo $set_time.")";?></div>
                        <div class="col-sm-10 col-md-10 col-lg-10"><?php echo  date("d-m-Y",strtotime("+$set_time days",strtotime($books_date)));?></div>
                    </div>                     
                </div>
            </div>
        </div>
    </div>  
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<button type="button" onclick="location.href='<?php echo base_url();?>/admin?library_mod=borrow_book';" class="btn btn-success">กลับไปที่หน้ายืมหนังสือ</button>
		</div>
	</div>	
<!---------------------------------------------------------------->    
    <?php       } ?>
<!---------------------------------------------------------------->                  
<!---------------------------------------------------------------->
    <?php
//----------------------------------------------------------------
            }else{ ?>
<!---------------------------------------------------------------->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="content-group-lg">
                <div class="alert alert-danger alert-styled-left">
                    <div style="font: 20px">ไม่พบรายหนังสือที่ต้องการยืม</div>
				</div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<button type="button" onclick="location.href='<?php echo base_url();?>/admin?library_mod=borrow_book';" class="btn btn-success">กลับไปที่หน้ายืมหนังสือ</button>
		</div>
	</div>
<!---------------------------------------------------------------->    
        <?php   
                $delete_llb=new key_borrow_book("-",$books_admin,$user_key,1,"Key","delete");
            }
        ?>
<!---------------------------------------------------------------->
        <?php       }else{ ?>
<!---------------------------------------------------------------->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-body border-top-primary">
                        <div class="row">
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <fieldset class="content-group">
								    <div class="form-group">
									    <label class="control-label col-sm-3 col-md-3 col-lg-3">รายชื่อสมาชิกห้องสมุด</label>
									    <div class="col-sm-9 col-md-9 col-lg-9">
                                            <select class="select-menu-color" name="user_books" id="user_books">
                                                <optgroup label="รายชื่อสมาชิกห้องสมุด">
                                                    <option value="">กำลังโหลดรายชื่อสมาชิกห้องสมุด...</option>
                                                </optgroup>
                                            </select>
									    </div>
								    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <fieldset class="content-group">
                                    <div class="form-group">
                                        <button type="button" id="but_enter" class="btn btn-success">เรียกชื่อ</button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div id="Run_borrow"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->              
<!---------------------------------------------------------------->
            <?php   }
            }else{ ?>
<!---------------------------------------------------------------->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-body border-top-primary">
                        <div class="row">
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <fieldset class="content-group">
								    <div class="form-group">
									    <label class="control-label col-sm-3 col-md-3 col-lg-3">รายชื่อสมาชิกห้องสมุด</label>
									    <div class="col-sm-9 col-md-9 col-lg-9">
                                            <select class="select-menu-color" name="user_books" id="user_books">
                                                <optgroup label="รายชื่อสมาชิกห้องสมุด">
                                                    <option value="">กำลังโหลดรายชื่อสมาชิกห้องสมุด...</option>
                                                </optgroup>
                                            </select>
									    </div>
								    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <fieldset class="content-group">
                                    <div class="form-group">
                                        <button type="button" id="but_enter" class="btn btn-success">เรียกชื่อ</button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div id="Run_borrow"></div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->              
<!---------------------------------------------------------------->
    <?php   } ?>




		</div>
<!-- /main content -->
	</div>
<!-- /page content -->
</div>
<!-- /page container -->
