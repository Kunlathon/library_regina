<meta charset="utf-8">
<!--****************************************************************************-->
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
<!--****************************************************************************-->

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
			
			$('#datatable-basic-library_rc').DataTable({
				columnDefs: [{
                	"targets": '_all',
                	"createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            	}],
            	"lengthMenu": [
               	 [10, 25, 50, 100, -1],
                	[10, 25 ,50, 100,"All"]
            	]
			});
			
		})
	</script>
	<!-- /theme JS files -->
<!--****************************************************************************-->

<?php
	$session=session();
	$InputAA=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){ ?>
	<?php
		include("public/database/pdo_library.php");
		include("public/database/class_library.php");	
	?>
				<div class="row">
					<div class="col-<?php echo $grid;?>-12">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="datatable-basic-library_rc">
								<thead>
									<tr align="center">
										<th align="center"><div>รหัส</div></th>
										<th align="center"><div>ที่เก็บหนังสือ</div></th>
										<th align="center"><div>การจัดการข้อมูล</div></th>
									</tr>
								</thead>
								<tbody>
	<?php
			$ReadManagementkeep=new ManagementKeep("-","-","-","read");
			foreach($ReadManagementkeep->CallMK_Keep() as $rc=>$keepRow){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
									<tr>
										<td align="center"><div><?php echo @$keepRow["lk_ID"];?></div></td>
										<td><div><?php echo @$keepRow["lk_txtTh"];?></div></td>
										<td>
											<ul class="list-inline">
												<li>
													<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteModal<?php echo @$keepRow["lk_ID"];?>"><i class="icon-bin2"></i></button>
												</li>
												<li>
<form name="form_update<?php echo @$keepRow["lk_ID"];?>" id="form_update<?php echo @$keepRow["lk_ID"];?>"  method="post" action="<?php echo base_url();?>admin?library_mod=keep">													
													<button type="submit" class="btn btn-danger btn-xs"><i class="icon-pencil6"></i></button>
<input type="hidden" name="manage" id="manage" value="form_update"> <input type="hidden" name="keep_key" id="keep_key" value="<?php echo @$keepRow["lk_ID"];?>">
</form>													
												</li>												
											</ul>
										</td>
									</tr>		
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->			
<div id="DeleteModal<?php echo @$keepRow["lk_ID"];?>" class="modal fade" role="dialog">
  	<div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title"> <i class="icon-trash"> </i> ยืนยันลบข้อมูล : <?php echo @$keepRow["lk_txtTh"];?></h4>
      	</div>
      	<div class="modal-body">
				<div class="row" >
					<div class="col-<?php $grid;?>-6"><button type="button"  name="delete_<?php echo @$keepRow["lk_ID"];?>" data-dismiss="modal" id="delete_<?php echo @$keepRow["lk_ID"];?>" value="<?php echo @$keepRow["lk_ID"];?>" class="btn btn-success">ลบข้อมูล</button></div>
					<div class="col-<?php $grid;?>-6"><button type="button" class="btn btn-default" data-dismiss="modal"><i class=""> </i>ยกเลิก</button></div>
				</div>
    	</div>
    </div>
<!-- Modal content end-->	
  	</div>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--form-delete-->
<script>
		$(document).ready(function(){
			$('#delete_<?php echo @$keepRow["lk_ID"];?>').on('click', function() {
				var manage="process_delete";
				var keep_key=$("#delete_<?php echo @$keepRow["lk_ID"];?>").val();
					if(keep_key!=""){
						$.post("<?php echo base_url();?>keep/processing",{
							manage:manage,
							keep_key:keep_key
						},function(data_process){
							var txt_process=data_process.trim();

							var percent = 0;
							var notice = new PNotify({
								text: "ดำเนินการ",
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
									text: percent + "% "
								};
								if (percent == 80) options.title = "ประมวลผล";
								if (percent >= 100) {

									if(txt_process==="succeed"){
										document.location="<?php echo base_url();?>admin?library_mod=keep";
									}else if(txt_process==="failed"){
										window.clearInterval(interval);
										options.title = "ลบไม่สำเร็จ พบความเชื่อมโยงของข้อมูล";
										options.addclass = "bg-danger";
										options.type = "error";
										options.hide = true;
										options.buttons = {
											closer: true,
											sticker: true
										};
										options.icon = 'icon-checkmark3';
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
										options.icon = 'icon-checkmark3';
										options.opacity = 1;
										options.width = PNotify.prototype.options.width;
									}

								}
								notice.update(options);
								}, 120);
							}, 1000);

						})
					}else{
					
					}
			});
		})
	</script>
<!--form-delete end-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php	} ?>
								</tbody>
							</table>						
						</div>
					</div>
				</div>

<?php		}else{
				exit("<script>window.location='admin?library_mod=keep';</script>");
			}
		}else{
			exit("<script>window.location='admin?library_mod=keep';</script>");
		}
?>