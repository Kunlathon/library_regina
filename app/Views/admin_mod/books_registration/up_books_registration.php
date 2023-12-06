<meta charset="utf-8">
<?php
	$session=session();
	$InputADBL=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include(APPPATH."Database-pdo/pdo_library.php");	
				include(APPPATH."Database-pdo/class_library.php");
				include(APPPATH."Database-pdo/class_data_library.php");
//************************************************************************				
				$BR_Key=$InputADBL->getPost('BR_Key');
				$BR_Adder=$InputADBL->getPost('BR_Adder');
				$BR_Status=$InputADBL->getPost('BR_Status');
				$BR_Time=$InputADBL->getPost('BR_Time');
//************************************************************************
				if((isset($BR_Key,$BR_Adder,$BR_Status,$BR_Time))){
					$UpDateBooks=new MD_Library_Listbooks("UpDateLi",$BR_Key,$BR_Time,"-",$BR_Adder,$BR_Status);
					$UBR_Error=$UpDateBooks->CallMLLError(); ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
		$(document).ready(function(){
			var UBR_Error="<?php echo $UBR_Error;?>";
			var percent = 0;
			var notice = new PNotify({
				text: "กำลังดำเนินการแก้ไขข้อมูล",
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
				
				if(percent == 80){
					if(UBR_Error=="NotError"){
						options.title = "แก้ไขข้อมูลสำเร็จ";
					}else if(UBR_Error=="Error"){
						options.title = "แก้ไขข้อมูลไม่สำเร็จ";
					}else{
						options.title ="พบข้อผิดพลาด";
					}
				}else{}
				
				if(percent >= 100){
					if(UBR_Error=="NotError"){
						document.location="<?php echo base_url();?>/Admin?library_mod=books_registration";
					}else if(UBR_Error=="Error"){
						window.clearInterval(interval);
						options.title = "แก้ไขข้อมูลไม่สำเร็จ";
						options.addclass = "bg-error";
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
						options.title = "พบข้อผิดพลาดไม่สามารถดำเนินการได้";
						options.addclass = "bg-error";
						options.type = "error";
						options.hide = true;
						options.buttons = {
							closer: true,
							sticker: true
						};
						options.icon = 'icon-checkmark3';
						options.opacity = 1;
						options.width = PNotify.prototype.options.width;
					}
					/*window.clearInterval(interval);
					options.title = "สำเร็จ";
					options.addclass = "bg-success";
					options.type = "success";
					options.hide = true;
					options.buttons = {
						closer: true,
						sticker: true
					};
					options.icon = 'icon-checkmark3';
					options.opacity = 1;
					options.width = PNotify.prototype.options.width;*/
				}else{}
				notice.update(options);
				}, 120);
			}, 2000);		
		})
	</script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php			}else{
					exit("<script>window.location='Admin?library_mod=books_registration';</script>");
				}
			}else{
				exit("<script>window.location='Admin?library_mod=books_registration';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=books_registration';</script>");
		}
?>