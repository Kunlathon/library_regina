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
	
	<!-- Theme JS files form_validation.html-->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<!-- /theme JS files End-->
	
	<!-- Theme JS files datable_basic.html-->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	
	<!-- Theme JS files components_notifications_pnotify.html-->
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/notifications/pnotify.min.js"></script>
	<!-- /theme JS files -->



<!--form-add-->
	<script>
		$(document).ready(function(){
			$('#save_add').on('click', function() {
				var manage="process_add";
				var lk_txtTh=$("#lk_txtTh").val();

					if(lk_txtTh!=""){

						if(lk_txtTh.length >=501){
							document.getElementById("lk_txtTh-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำกัดจำนวนตัวอักษร 500 ตัวอักษร</span>';
							lk_txtTh="";							
						}else if(lk_txtTh.length <=3){
							document.getElementById("lk_txtTh-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำนวนตัวอักษร 3 ตัวอักษรขึ้นไป</span>';	
							lk_txtTh="";
						}else{
							document.getElementById("lk_txtTh-null").innerHTML=
							'<div class="form-group has-success has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-checkmark-circle"></i>'
							+'</div>';						
						}

					}else{
						document.getElementById("lk_txtTh-null").innerHTML=
						'<div class="form-group has-error has-feedback">'
						+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
						+'	<div class="col-<?php echo $grid;?>-10">'
						+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
						+'	<div class="form-control-feedback">'
						+'	<i class="icon-cancel-circle2"></i>'
						+'</div>'
						+'<span class="help-block">กรุณากรอกข้อมูลในช่องนี้</span>';
					}

					if(lk_txtTh!=""){
						$.post("<?php echo base_url();?>keep/processing",{
							manage:manage,
							lk_txtTh:lk_txtTh
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
										options.title = "บันทึกไม่สำเร็จ";
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
<!--form-add end-->


<!--form-update-->
	<script>
		$(document).ready(function(){
			$('#save_up').on('click', function() {
				var manage="process_up";
				var lk_txtTh=$("#lk_txtTh").val();
				var keep_key=$("#keep_key").val();

					if(lk_txtTh!=""){

						if(lk_txtTh.length >=501){
							document.getElementById("lk_txtTh-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำกัดจำนวนตัวอักษร 500 ตัวอักษร</span>';
							lk_txtTh="";							
						}else if(lk_txtTh.length <=3){
							document.getElementById("lk_txtTh-null").innerHTML=
							'<div class="form-group has-warning has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-notification2"></i>'
							+'</div>'
							+'<span class="help-block">จำนวนตัวอักษร 3 ตัวอักษรขึ้นไป</span>';	
							lk_txtTh="";
						}else{
							document.getElementById("lk_txtTh-null").innerHTML=
							'<div class="form-group has-success has-feedback">'
							+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
							+'	<div class="col-<?php echo $grid;?>-10">'
							+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
							+'	<div class="form-control-feedback">'
							+'	<i class="icon-checkmark-circle"></i>'
							+'</div>';						
						}

					}else{
						document.getElementById("lk_txtTh-null").innerHTML=
						'<div class="form-group has-error has-feedback">'
						+'	<label class="control-label col-<?php echo $grid;?>-2">ที่เก็บหนังสือ <span class="text-danger">*</span></label>'
						+'	<div class="col-<?php echo $grid;?>-10">'
						+'		<input type="text" name="lk_txtTh" id="lk_txtTh" class="form-control" required="required" placeholder="พิมพ์ ที่เก็บหนังสือ..." minlength="3" maxlength="500" value="'+lk_txtTh+'">'
						+'	<div class="form-control-feedback">'
						+'	<i class="icon-cancel-circle2"></i>'
						+'</div>'
						+'<span class="help-block">กรุณากรอกข้อมูลในช่องนี้</span>';
					}

					if(lk_txtTh!=""){
						$.post("<?php echo base_url();?>keep/processing",{
							manage:manage,
							lk_txtTh:lk_txtTh,
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
										options.title = "บันทึกไม่สำเร็จ";
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
<!--form-update end-->
	
	<script>
		$(document).ready(function(){
			$("#Btnkeep").click(function(){
				$("#Modakeep").modal({backdrop: false});
			});			
		})
	</script>
	
<!--show-data-->
	<script>
		$(document).ready(function(){
			$.post("<?php echo base_url();?>keep",{

			},function(keep_data){
				$("#keep_show").html(keep_data)
			})
		})
	</script>
<!--show-data-->	