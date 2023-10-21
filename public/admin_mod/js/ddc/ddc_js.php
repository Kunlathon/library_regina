	<!-- Theme JS files colors_pink-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/selectboxit.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/pnotify.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/noty.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

	
	<script>
        $(document).ready(function(){
            $('.select-menu-color').select2({
                containerCssClass: 'bg-pink',
                dropdownCssClass: 'bg-pink'
            });
        })
    </script>


	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<!--<script src="../../../../global_assets/js/demo_pages/components_modals.js"></script>-->
	<!-- /theme JS files -->

    <script>
        $(document).ready(function(){
            $('#button_ddc').on('click',function(){
                var DDCA_No=$("#DDCA_No").val();
                    if(DDCA_No!=""){
                        $.post("<?php echo base_url();?>/Ddc",{
                            DDCA_No:DDCA_No
                        },function(Test_Ddc){
                            if(Test_Ddc!=""){
                                $("#Run_ddcb").html(Test_Ddc)
                            }else{}
                        })        
                    }else{}
            })
        })
    </script>

	<script>
		$(document).ready(function(){
			var JS_DDCA_No=$("#JS_DDCA_No").val();
                    if(JS_DDCA_No!=""){
                        $.post("<?php //echo base_url();?>/Ddc",{
                            DDCA_No:JS_DDCA_No
                        },function(Test_Ddc){
                            if(Test_Ddc!=""){
                                $("#Run_ddcb2").html(Test_Ddc)
                            }else{}
                        })        
                    }else{}
		})
	</script>


	<!-- /theme JS files -->

    <!-- Theme JS files form_validation.html-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<!--<script src="<?php //echo base_url();?>/public/theme/Template/global_assets/js/demo_pages/form_validation.js"></script>-->
	<!-- /theme JS files End-->
	
	<!-- Theme JS files datable_basic.html-->
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

	<!-- /theme JS files -->

	<!--UpDate-->
    <script>
        $(document).ready(function(){
			$('#DDC_UP').on('click', function() {
				swal({
					title: "ต้องการบันทึกข้อมูลแก้ไขหรือไม่",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#FF7043",
					confirmButtonText: "ยืนยันการบันทึก"
				},function(){
					var DDCB_TxtTh=$("#DDCB_TxtTh").val(); 
					var DDCB_TxtEh=$("#DDCB_TxtEh").val();
					var DDCB_Key=$("#DDC_UP").val();
					var DDCA_No=$("#DDCA_No").val();
					var code_run="update";

						if(DDCB_TxtTh==""){
							document.getElementById("DDCB_TxtTh-up").innerHTML=
								'<div class="form-group has-error has-feedback">'+
								'   <input type="text" name="DDCB_TxtTh" id="DDCB_TxtTh" class="form-control" maxlength="100" value="">'+
								'<div class="form-control-feedback">'+
								'   <i class="icon-cancel-circle2"></i>'+
								'</div>'+
								' <span>กรุณากรอบข้อมูล หมวดหมู่ย่อยภาษาไทย</span>'+
								'</div>';
						}else{
							document.getElementById("DDCB_TxtTh-up").innerHTML=
							'<input type="text" name="DDCB_TxtTh" id="DDCB_TxtTh" class="form-control" maxlength="100" value='+DDCB_TxtTh+'>';
						}

						if(DDCB_TxtTh!=""){
			
							$.post("<?php echo base_url();?>/ddc/ddcb",{
								DDCB_TxtTh:DDCB_TxtTh,
								DDCB_TxtEh:DDCB_TxtEh,
								DDCB_Key:DDCB_Key,
								code_run:code_run,
								DDCA_No:DDCA_No
							},function(add_ddcb){
								var Error_ddcb=add_ddcb;

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

											if(Error_ddcb.trim()==="NotError"){
												window.clearInterval(interval);
												options.title = "แก้ไขสำเร็จ";
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
														 '			<button type="submit"  class="btn btn-secondary" >กลับไปที่รายการแก้ไข</button>'+
														 '		</div>'+
														 '      <input type="hidden" name="JS_DDCA_No" id="JS_DDCA_No" value="'+DDCA_No+'"/>'+
														 '	</div>'+
														 '</form>'
        										});						
												
											}else if(Error_ddcb.trim()==="Error"){
												window.clearInterval(interval);
												options.title = "แก้ไขไม่สำเร็จ";
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
				});
    		});
        })
    </script>
	<!--UpDate-->