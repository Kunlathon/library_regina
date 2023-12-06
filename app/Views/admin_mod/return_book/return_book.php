<meta charset="utf-8">
<?php
	$session=session();
	$InputRB=\Config\Services::request();
		if($session->has("IL_Key")>=1){
			if($_SESSION["IL_Status"]==1){					
				//$DDCB_NO=$InputRB->getPost('DDCB_NO');

                include(APPPATH."Database-pdo/pdo_data.php");
                include(APPPATH."Database-pdo/pdo_conndatastu.php");
                include(APPPATH."Database-pdo/class_data.php");
                        
                include(APPPATH."Database-pdo/pdo_library.php");
                include(APPPATH."Database-pdo/class_library.php");
                include(APPPATH."Database-pdo/class_data_library.php");
                include(APPPATH."Database-pdo/class_borrow_book.php"); ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript">
    function setScreenHWCookie() {
        $.cookie('sw', screen.width);
        //$.cookie('sh',screen.height);
        return true;
    }
    setScreenHWCookie();
    </script>
 
    <?php
		$width_system=filter_input(INPUT_COOKIE,'sw');
		if(($width_system>=1200)){
			$grid="lg";
		}elseif(($width_system<=992)){
			$grid="md";
		}elseif(($width_system<=768)){
			$grid="sm";
		}else{
			$grid="xs";
		}
    ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
			$book_key=$InputRB->getPost('book_key');
				if((isset($book_key))){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
					
		<?php
			$TestReturnBook=new test_return_book($book_key,"-");
				if(($TestReturnBook->return_book_error()=="no_error")){
	//--uesr book data
					$TestReturnBook=new test_return_book($book_key,"print_data");
					foreach($TestReturnBook->return_book_row_data() as $book=>$TestReturnBookRow){
						$txt_book_key=$TestReturnBookRow["bud_books_id"];
						$txt_book_uesr=$TestReturnBookRow["bud_key"];
						$txt_book_borrow_date=$TestReturnBookRow["bud_datetime_a"];
						$txt_book_return_date=date("Y-m-d H:i:s");
						$txt_admin=$_SESSION["IL_Key"];
						$txt_bba_key=$TestReturnBookRow["bba_key"];
						
					}
	//--uesr book data end		
					
					
	//set system book				
					$data_set_reurn_book=new set_borrow_book("return_book","Rc_Book01","-","-","-","-","-","-","-");
				
					foreach($data_set_reurn_book->show_borrow_book() as $rc_book=>$data_set_book){
						if(($data_set_reurn_book->show_borrow_book()!="Error")){
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
	//set system book end	



					$Vocabulary=new vocabulary_book($txt_book_borrow_date,$txt_book_return_date,$set_time,$set_price); 
						
						//echo $Vocabulary->Call_Book_price();
						//echo $Vocabulary->Call_Sum_Day();				
					
					?>
					
					<?php
						$data_name=new PrintReginaStuDataClass($txt_book_uesr);
						
						$reurn_books=new return_books_items($txt_bba_key,$txt_book_uesr,$txt_book_key,$txt_book_return_date,$txt_admin,$set_price);
						
						
						
							if(($reurn_books->Run_Return_Books_Items()=="no")){
								$reurn_book_txt="คืนหนังสือสำเร็จ";
							}elseif(($reurn_books->Run_Return_Books_Items()=="yes")){
								$reurn_book_txt="คืนหนังสือไม่สำเร็จ";
							}else{
								$reurn_book_txt="-";
							}
						
					?>

			<div class="row">
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel">
						<div class="panel-heading bg-success">
							ข้อมูลสมาชิก <?php echo "(อ้างอิงจากฐานข้อมูลระบบสารสนเทศนักเรียน) ภาคเรียนที่ ".$set_t." ปีการศึกษา ".$set_y;?>
						</div>
						
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-2 col-md-2 col-lg-2">
									<img style="width: 180px;" src="http://rc.regina.ac.th/Application/evaluation_rc/view/all/<?php echo $txt_book_uesr;?>.jpg" class="img-thumbnail" alt="Cinque Terre">
								</div>
								<div class="col-sm-10 col-md-10 col-lg-10">
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">รหัสนักเรียน&nbsp;:&nbsp;</div>
										<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $txt_book_uesr;?></div>
									</div>
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">ชื่อ-สกุล&nbsp;:&nbsp;(ภาษาไทย)</div>
										<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $data_name->PRS_nameTH;?></div>
									</div>
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">ชื่อ-สกุล&nbsp;:&nbsp;(ภาษาอังกฤษ)</div>
										<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $data_name->PRS_nameEH;?></div>
									</div>
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">ชื่อเล่น&nbsp;:&nbsp;</div>
										<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $data_name->PRS_nickTh." (".$data_name->PRS_nickEn.")";?></div>                            
									</div>
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">อายุ&nbsp;:&nbsp;</div>
										<div class="col-sm-8 col-md-8 col-lg-8"><?php echo $data_name->DataAge;?></div>                            
									</div>
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">ระดับชั้น&nbsp;:&nbsp;</div>
										<div class="col-sm-8 col-md-8 col-lg-8"></div>                            
									</div>
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">แผนการเรียน&nbsp;:&nbsp;ห้องเรียน</div>
										<div class="col-sm-8 col-md-8 col-lg-8"></div>                            
									</div>
									<div class="row">
										<div class="col-sm-4 col-md-4 col-lg-4">เลขที่&nbsp;:&nbsp;</div>
										<div class="col-sm-8 col-md-8 col-lg-8"></div>                            
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="col-<?php echo $grid;?>-6">
					<div class="panel">
						<div class="panel-heading bg-info">
							ข้อมูลการคืนหนังสือ เลขทะเบียน : <?php echo $txt_book_key;?>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-<?php echo $grid;?>-4">วันที่ยืม&nbsp;:&nbsp;</div>
								<div class="col-<?php echo $grid;?>-8"><?php echo $Vocabulary->Call_Sum_Day();?></div>
							</div>
							<div class="row">
								<div class="col-<?php echo $grid;?>-4">จำนวนวันที่ยืม&nbsp;:&nbsp;</div>
								<div class="col-<?php echo $grid;?>-8"><?php echo $Vocabulary->Call_Sum_Day();?></div>
							</div>
							<div class="row">
								<div class="col-<?php echo $grid;?>-4">จำนวนวันที่ยืม&nbsp;:&nbsp;</div>
								<div class="col-<?php echo $grid;?>-8"><?php echo $Vocabulary->Call_Sum_Day();?></div>
							</div>	
							<div class="row">
								<div class="col-<?php echo $grid;?>-4">ค่าเทียบปรับ&nbsp;:&nbsp;</div>
								<div class="col-<?php echo $grid;?>-8"><?php echo $Vocabulary->Call_Book_price()." บาท";?></div>
							</div>	
							<div class="row">
								<div class="col-<?php echo $grid;?>-4">สถานะการคืนหนังสือ&nbsp;:&nbsp;</div>
								<div class="col-<?php echo $grid;?>-8"><?php echo $reurn_book_txt;?></div>
							</div>						
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<button type="button" onclick="location.href='<?php echo base_url();?>/admin?library_mod=return_book';" class="btn btn-success">กลับไปที่หน้าคืนหนังสือ</button>
				</div>
			</div>				
			
		<?php			
				}else{ ?>
			<div class="row">
				<div class="col-<?php echo $grid;?>-12">
					<div class="content-group-lg">
						<div class="alert alert-danger alert-styled-left">
							<div style="font: 20px">ไม่พบรายการหนังสือ ในฐานข้อมูลค้างคืน</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<button type="button" onclick="location.href='<?php echo base_url();?>admin?library_mod=return_book';" class="btn btn-success">กลับไปที่หน้าคืนหนังสือ</button>
				</div>
			</div>			
		<?php   } ?>					
					
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->						
		<?php	}else{
					exit("<script>window.location='/UserLogin/Logout';</script>"); 
				} ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       }else{
				exit("<script>window.location='/UserLogin/Logout';</script>");    
            }
		}else{
			exit("<script>window.location='/UserLogin/Logout';</script>");
		}

?>
