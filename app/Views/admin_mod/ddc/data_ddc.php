<script>
		$(document).ready(function(){

    // Setting datatable defaults
			$.extend( $.fn.dataTable.defaults, {
				autoWidth: false,
				columnDefs: [{ 
					orderable: false,
					width: '100px'
				}],
				dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
				language: {
					search: '<span>ค้นหา:</span> _INPUT_',
					searchPlaceholder: 'พิมพ์เพื่อค้นหา...',
					lengthMenu: '<span>แสดง:</span> _MENU_',
					paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
				},
				drawCallback: function () {
					$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
				},
				preDrawCallback: function() {
					$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
				}
			});
			
			$('.datatable-basic').DataTable();
			
		})
	</script>
<meta charset="utf-8">
<?php
	$session=session();
	$InputDD=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");
				include(APPPATH."Database-pdo/class_library.php");					
				
                $DDCA_No=$InputDD->getPost('DDCA_No');

                $DataDDCA_RowId=new ManagementDDCA($DDCA_No,"-","-","RowId");
                foreach($DataDDCA_RowId->RowAllManagementDDCA() as $books=>$DDCA_RowId){
                    
                    if((isset($DDCA_RowId["DDCA_TxtTh"]))){
                        $DDCA_NameTh=$DDCA_RowId["DDCA_TxtTh"];
                    }else{
                        $DDCA_NameTh="-";
                    }

                    if((isset($DDCA_RowId["DDCA_TxtEh"]))){
					    $DDCA_NameEh=$DDCA_RowId["DDCA_TxtEh"];
                    }else{
                        $DDCA_NameEh="-";
                    }
                    
                }


                ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script>
        $(document).ready(function(){
            $('#button_ddcb').on('click',function(){
                var DDCB_No=$("#DDCB_No").val();
                var DDCB_TxtTh=$("#DDCB_TxtTh").val();
                var DDCB_TxtEh=$("#DDCB_TxtEh").val();
                var DDCA_No="<?php echo $DDCA_No;?>";
                var code_run="add";
                
                    if(DDCB_TxtTh==""){
                        document.getElementById("DDCB_TxtTh-null").innerHTML=
                        '<div class="form-group has-error has-feedback">'+
                        '   <input type="text" name="DDCB_TxtTh" id="DDCB_TxtTh" class="form-control border-pink border-lg" placeholder="เพิ่มข้อมูล หมวดหมู่ย่อยภาษาไทย : <?php echo $DDCA_NameTh;?>">'+
                        '<div class="form-control-feedback">'+
                        '   <i class="icon-cancel-circle2"></i>'+
                        '</div>'+
                        ' <span class="help-block">กรุณากรอบข้อมูล หมวดหมู่ย่อยภาษาไทย : <?php echo $DDCA_NameTh;?></span>'+
                        '</div>'
                    }else{
                        document.getElementById("DDCB_TxtTh-null").innerHTML=
                        '<input type="text" name="DDCB_TxtTh" id="DDCB_TxtTh" class="form-control border-pink border-lg" placeholder="เพิ่มข้อมูล หมวดหมู่ย่อยภาษาไทย : <?php echo $DDCA_NameTh;?>" value='+DDCB_TxtTh+'>'+
                        '<span>หมวดหมู่ย่อยภาษาไทย <?php echo $DDCA_NameTh;?></span> '
                    }


                    if(DDCB_No==""){
                        document.getElementById("DDCB_No-null").innerHTML=
                        '<div class="form-group has-error has-feedback">'+
                        '   <input type="text" name="DDCB_No" id="DDCB_No" class="form-control border-pink border-lg" placeholder="เพิ่มข้อมูล เลขหมวดหมู่ย่อย : <?php echo $DDCA_NameTh;?>">'+
                        '<div class="form-control-feedback">'+
                        '   <i class="icon-cancel-circle2"></i>'+
                        '</div>'+
                        ' <span class="help-block">เลขหมวดหมู่ย่อย <?php echo $DDCA_NameTh;?></span>'+
                        '</div>'
                    }else{
                        document.getElementById("DDCB_No-null").innerHTML=
                        '<input type="text" name="DDCB_No" id="DDCB_No" class="form-control border-pink border-lg" placeholder="เพิ่มข้อมูล เลขหมวดหมู่ย่อย : <?php echo $DDCA_NameTh;?>" value='+DDCB_No+'>'+
                        '<span>เลขหมวดหมู่ย่อย <?php echo $DDCA_NameTh;?></span>'
                    }

                    if(DDCB_TxtTh!="" && DDCB_No!=""){
               
                        $.post("<?php echo base_url();?>ddc/ddcb",{
                            DDCB_No:DDCB_No,
                            DDCB_TxtTh:DDCB_TxtTh,
                            DDCB_TxtEh:DDCB_TxtEh,
                            DDCA_No:DDCA_No,
                            code_run:code_run
                        },function(add_ddcb){
                            var Error_ddcb=add_ddcb.trim();

                            var percent = 0;
                            var notice = new PNotify({
                                text: "กำลังดำเนินการ",
                                addclass: 'bg-primary',
                                type: 'info',
                                icon: 'icon-spinner4 spinner',
                                hide: false,
                                buttons: {
                                    closer: false,
                                    sticker: false
                                },
                                opacity: .9,
                                width: "170px"
                            });

                            setTimeout(function() {
                            notice.update({
                                title: false
                            });
                                var interval = setInterval(function() {
                                    percent += 2;
                                    var options = {
                                        text: percent + "%"
                                    };
                                    if (percent == 60) options.title = "เกือบจะถึงแล้ว";
                                    if (percent >= 100) {

                                        if(Error_ddcb==="NotError"){
                                            window.clearInterval(interval);
                                            options.title = "บันทึกสำเร็จ";
                                            options.addclass = "bg-success";
                                            options.type = "success";
                                            options.hide = true;
                                            options.buttons = {
                                                closer: true,
                                                sticker: true
                                            };
                                            options.icon = 'icon-checkmark3';
                                            options.opacity = 1;
                                            options.width = PNotify.prototype.options.width;

                                            bootbox.dialog({
                                            //title: "แก้ไขข้อมูลสำเร็จ",
                                            message: '<form name="js_dcc_back" id="js_dcc_back" class="form-horizontal" method="post" action="<?php echo base_url();?>admin?library_mod=ddc">'+
                                                    '	<div class="row">'+
                                                    '		<div class="col-sm-12 col-md-12 col-lg-12">'+
                                                    '			<button type="submit"  class="btn btn-secondary" >กลับไปที่รายการหมวดหมู่ย่อย</button>'+
                                                    '		</div>'+
                                                    '      <input type="hidden" name="JS_DDCA_No" id="JS_DDCA_No" value="'+DDCA_No+'"/>'+
                                                    '	</div>'+
                                                    '</form>'
                                            });						
                                            
                                        }else if(Error_ddcb==="Error"){
                                            window.clearInterval(interval);
                                            options.title = "เพิ่มข้อมูลไม่สำเร็จ";
                                            options.addclass = "bg-danger";
                                            options.type = "danger";
                                            options.hide = true;
                                            options.buttons = {
                                                closer: true,
                                                sticker: true
                                            };
                                            options.icon = 'icon-cross2';
                                            options.opacity = 1;
                                            options.width = PNotify.prototype.options.width;
                                        }else{
                                            window.clearInterval(interval);
                                            options.title = "พบข้อผิดพลาด";
                                            options.addclass = "bg-warning";
                                            options.type = "warning";
                                            options.hide = true;
                                            options.buttons = {
                                                closer: true,
                                                sticker: true
                                            };
                                            options.icon = 'icon-warning22';
                                            options.opacity = 1;
                                            options.width = PNotify.prototype.options.width;
                                        }

                                    }
                                    notice.update(options);
                                }, 120);
                            }, 2000);

                        })

                    }else{}
            })
        })
    </script>



<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-body border-top-pink">
            
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h3 class="content-group text-semibold"> เพิ่มข้อมูล หมวดหมู่ย่อย : <?php echo $DDCA_NameTh;?></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div id="DDCB_No-null">
                        <input type="text" name="DDCB_No" id="DDCB_No" class="form-control border-pink border-lg" placeholder="เพิ่มข้อมูล เลขหมวดหมู่ย่อย : <?php echo $DDCA_NameTh;?>">
						<span>เลขหมวดหมู่ย่อย <?php echo $DDCA_NameTh;?> *</span>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div id="DDCB_TxtTh-null">
                        <input type="text" name="DDCB_TxtTh" id="DDCB_TxtTh" class="form-control border-pink border-lg" placeholder="เพิ่มข้อมูล หมวดหมู่ย่อยภาษาไทย : <?php echo $DDCA_NameTh;?>">
                        <span>หมวดหมู่ย่อยภาษาไทย <?php echo $DDCA_NameTh;?> *</span>                        
                    </div>
                   
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div id="DDCB_TxtEh-null">
                        <input type="text" name="DDCB_TxtEh" id="DDCB_TxtEh" class="form-control border-pink border-lg" placeholder="เพิ่มข้อมูล หมวดหมู่ย่อยภาษาอังกฤษ : <?php echo $DDCA_NameTh;?>">                    
                        <span>หมวดหมู่ย่อยภาษาอังกฤษ <?php echo $DDCA_NameTh;?></span>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <button type="button" name="button_ddcb" id="button_ddcb" class="btn btn-info">บันทึก / Save</button>               
                </div>                                                    
            </div>



        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-body border-top-info">

            <div class="table-responsive">
				<table class="table datatable-basic">
					<thead>
						<tr>
							<th><div>เลขหมวดหมู่ย่อย</div></th>
							<th><div>หมวดหมู่</div></th>
							<th><div>หมวดหมู่ ภาษาอังกฤษ</div></th>
                            <th><div>การจัดการข้อมูล</div></th>
						</tr>
					</thead>
					<tbody>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
    <?php
                $count_DDCB=0;
                $DataDDCB_RowId=new ManagementDDCB($DDCA_No,"-","-","-","RowId");
                foreach($DataDDCB_RowId->RowIdManagementDDCB() as $books=>$DDCB_RowId){ ?>
                   
                        <tr>
							<td><div><?php echo $DDCB_RowId["DDCB_No"];?></div></td>
							<td><div><?php echo $DDCB_RowId["DDCB_TxtTh"];?></div></td>
							<td><div><?php echo $DDCB_RowId["DDCB_TxtEh"];?></div></td>
                            <td>
                                <div>
<form name="up_data_ddc<?php echo $DDCB_RowId["DDCB_No"];?>" id="up_data_ddc<?php echo $DDCB_RowId["DDCB_No"];?>"  method="post" action="<?php echo base_url();?>admin?library_mod=ddc">                                    
                                    <button type="submit" class="btn btn-danger btn-xs"> <i class="icon-pencil3"></i></button>
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Modal_Delete<?php echo $count_DDCB;?>" > <i class="icon-trash"></i></button>
<input type="hidden" name="DDCB_Key" id="DDCB_Key" value="<?php echo $DDCB_RowId["DDCB_No"];?>"> <input type="hidden" name="list" id="list" value="UpDate">                                     
</form>
                                    
                                </div>
                            </td>
						</tr>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="modal fade" id="Modal_Delete<?php echo $count_DDCB;?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <i class="icon-trash"></i><?php echo " หมวดหมู่ย่อย ".$DDCB_RowId["DDCB_No"]." (".$DDCB_RowId["DDCB_TxtTh"].")";?>            
                </div>                
            </div><br>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div style="text-align: center;">
                        <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal" name="Delete_Ddc" id="Delete_Ddc<?php echo $count_DDCB;?>"> <i class="icon-trash"></i> ยืนยันการลบ</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>


          
        </div>
    </div>
</div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
    $(document).ready(function(){
        $('#Delete_Ddc<?php echo $count_DDCB;?>').on('click',function(){
            var ddcB_key="<?php echo $DDCB_RowId["DDCB_No"];?>";
            var ddcA_Key="<?php echo $DDCB_RowId["DDCA_No"];?>";
            var code_run="code_delete";
                if(ddcB_key!="" && code_run!=""){
                    $.post("<?php echo base_url();?>ddc/ddcb",{
                        ddcB_key:ddcB_key,
                        code_run:code_run
                    },function(data_process){
                        var Error_ddcb=data_process.trim();

                        var percent = 0;
                        var notice = new PNotify({
                            text: "กำลังดำเนินการ",
                            addclass: 'bg-primary',
                            type: 'info',
                            icon: 'icon-spinner4 spinner',
                            hide: false,
                            buttons: {
                                closer: false,
                                sticker: false
                            },
                            opacity: .9,
                            width: "170px"
                        });

                        setTimeout(function() {
                        notice.update({
                            title: false
                        });
                            var interval = setInterval(function() {
                                percent += 2;
                                var options = {
                                    text: percent + "%"
                                };
                                if (percent == 60) options.title = "เกือบจะถึงแล้ว";
                                if (percent >= 100) {

                                    if(Error_ddcb==="NotError"){
                                        window.clearInterval(interval);
                                        options.title = "ลบสำเร็จ";
                                        options.addclass = "bg-success";
                                        options.type = "success";
                                        options.hide = true;
                                        options.buttons = {
                                            closer: true,
                                            sticker: true
                                        };
                                        options.icon = 'icon-checkmark3';
                                        options.opacity = 1;
                                        options.width = PNotify.prototype.options.width;

                                        bootbox.dialog({
                                        //title: "แก้ไขข้อมูลสำเร็จ",
                                        message: '<form name="js_dcc_back" id="js_dcc_back" class="form-horizontal" method="post" action="<?php echo base_url();?>admin?library_mod=ddc">'+
                                                '	<div class="row">'+
                                                '		<div class="col-sm-12 col-md-12 col-lg-12">'+
                                                '			<button type="submit"  class="btn btn-secondary" >กลับไปที่หมวดหมู่ย่อย</button>'+
                                                '		</div>'+
                                                '      <input type="hidden" name="JS_DDCA_No" id="JS_DDCA_No" value="'+ddcA_Key+'"/>'+
                                                '	</div>'+
                                                '</form>'
                                        });						
                                        
                                    }else if(Error_ddcb==="Error"){
                                        window.clearInterval(interval);
                                        options.title = "ลบไม่สำเร็จ";
                                        options.addclass = "bg-danger";
                                        options.type = "danger";
                                        options.hide = true;
                                        options.buttons = {
                                            closer: true,
                                            sticker: true
                                        };
                                        options.icon = 'icon-cross2';
                                        options.opacity = 1;
                                        options.width = PNotify.prototype.options.width;
                                    }else{
                                        window.clearInterval(interval);
                                        options.title = "พบข้อผิดพลาด";
                                        options.addclass = "bg-warning";
                                        options.type = "warning";
                                        options.hide = true;
                                        options.buttons = {
                                            closer: true,
                                            sticker: true
                                        };
                                        options.icon = 'icon-warning22';
                                        options.opacity = 1;
                                        options.width = PNotify.prototype.options.width;
                                    }

                                }
                                notice.update(options);
                            }, 120);
                        }, 2000);
                    })
                }else{}
        })
    })
</script>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <?php       
                    $count_DDCB=$count_DDCB+1;
                }    ?>
		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		

					</tbody>
					</table>						
				</div>

        </div>
    </div>
</div>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
			}else{
				exit("<script>window.location='Admin?library_mod=ddc';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=ddc';</script>");
		}
?>