<meta charset="utf-8">

	<script>
		$(document).ready(function(){
	// Menu border and text color
			$('.select-border-color').select2({
				dropdownCssClass: 'border-success',
				containerCssClass: 'border-success text-success-700'
			});
		})
	</script>
	
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>	
	
<?php
	$session=session();
	$InputBBS=\Config\Services::request();
		if($session->has("IL_Key")>=1){
			if($_SESSION["IL_Status"]==1){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
    include(APPPATH."Database-pdo/pdo_data.php");
    include(APPPATH."Database-pdo/pdo_conndatastu.php");
    include(APPPATH."Database-pdo/class_data.php");
            
    include(APPPATH."Database-pdo/pdo_library.php");
    include(APPPATH."Database-pdo/class_library.php");
    include(APPPATH."Database-pdo/class_data_library.php");
    include(APPPATH."Database-pdo/class_borrow_book.php");
//----------------------------------------------------------------------------------------------
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
//----------------------------------------------------------------------------------------------
        if((is_null($InputBBS->getPost('user_key')))){ ?>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel">
			<div class="panel-heading bg-success">
				ไม่พบข้อมูล
		    </div>

			<div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div></div>
                    </div>
                </div>
			</div>
		</div>
    </div>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<?php   }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<script>
	$(document).ready(function(){
        var counter = 1;
		var int_quota="<?php echo $set_quota;?>";
        $("#addButton").click(function () {
                                    
            if(int_quota<=counter){
                    //alert("Only 10 textboxes allow");
                    return false;
            }else{
                            
                var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
                                        
                newTextBoxDiv.after().html('<fieldset class="content-group">'+
                                            '    <div class="form-group">'+
                                            '        <label class="control-label col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">เลขทะเบียนหนังสือ&nbsp;:&nbsp;</label>'+
                                            '            <div class="col-sm-9 col-md-9 col-lg-9">'+
                                            '                <input type="text" class="form-control"  style="font-size: 22px;" name="books_key[]" id="books_key[]" placeholder="เลขทะเบียนหนังสือ..." required="required">'+
                                            '            </div>'+
                                            '    </div>'+
                                            '</fieldset>');
                                    
                newTextBoxDiv.appendTo("#TextBoxesGroup");		
                                                    
            }
                counter=counter+1;	
                        
        });	
             
            $("#removeButton").click(function () {
                if(counter==1){
                    return false;
                }else{
                    counter=counter-1;	
                    $("#TextBoxDiv" + counter).remove();
                }                
            });
	});
</script>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        $user_key=$InputBBS->getPost('user_key');
        $data_name=new PrintReginaStuDataClass($user_key);
    ?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel">
			<div class="panel-heading bg-success">
				ข้อมูลสมาชิก <?php echo "(อ้างอิงจากฐานข้อมูลระบบสารสนเทศนักเรียน) ภาคเรียนที่ ".$set_t." ปีการศึกษา ".$set_y;?>
		    </div>

			<div class="panel-body">
                <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <img style="width: 180px;" src="http://rc.regina.ac.th/Application/evaluation_rc/view/all/<?php echo $user_key;?>.jpg" class="img-thumbnail" alt="Cinque Terre">
                    </div>
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">รหัสนักเรียน&nbsp;:&nbsp;</div>
                            <div class="col-sm-8 col-md-8 col-lg-8"><?php echo $user_key;?></div>
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
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel">
			<div class="panel-heading bg-info">
				<h6 class="panel-title">ยืมหนังสือ</h6>
			</div>

			<div class="panel-body">
<form name="but_form_borrow" id="but_form_borrow" method="post" action="<?php echo base_url();?>admin?library_mod=borrow_book">	
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        <div id="TextBoxesGroup">
                        <div id="TextBoxDiv" >
                            <fieldset class="content-group">
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3 col-lg-3" style="font-size: 18px;">เลขทะเบียนหนังสือ&nbsp;:&nbsp;</label>
								    <div class="col-sm-9 col-md-9 col-lg-9">
                                        <input type="text" class="form-control" style="font-size: 22px;" name="books_key[]" id="books_key[]" placeholder="เลขทะเบียนหนังสือ..." required="required">
								    </div>
                                </div>
                            </fieldset>                            
                        </div>
                        </div>
                    
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <fieldset class="content-group">
                            <div class="form-group">
                                <button type="button" class="btn btn-warning" id="addButton">เพิ่มช่องรายการ</button>
                                <button type="button" class="btn btn-danger" id="removeButton">ลบช่องรายการ</button>
                            </div>
                        </fieldset>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <button type="submit" class="btn btn-success" name="but_save" id="but_save" style="font-size: 18px;">ดำเนินการยืม</button>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">

                    </div>
                </div>
    <input type="hidden" name="user_key" id="user_key" value="<?php echo  $user_key;?>">
    <input type="hidden" name="management" id="management" value="borrow">
</form>
			</div>
		</div>
    </div>
</div>    

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
<?php   }
    
?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<?php		}else{
				exit("<script>window.location='admin?library_mod=books_library';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=books_library';</script>");
		}
?>