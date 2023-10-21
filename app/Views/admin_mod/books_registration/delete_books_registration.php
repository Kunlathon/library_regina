<meta charset="utf-8">
<?php
	$session=session();
	$InputDBR=\Config\Services::request();
		if(($session->has("IL_Key")>=1)){
			if(($_SESSION["IL_Status"]==1)){
				include("public/database/pdo_library.php");	
				//include("public/database/class_library.php");
				include("public/database/class_data_library.php");
				$BR_Key=$InputDBR->getPost('BR_Key');
				$Delete_Books=new MD_Library_Listbooks("Delete",$BR_Key,"-","-","-","-");
				$Error_Delete=$Delete_Books->CallMLLError(); ?>

<script>
		$(document).ready(function(){
			var Error_Delete="<?php echo $Error_Delete;?>";
			var percent = 0;
			var notice = new PNotify({
				text: "กำลังดำเนินการลบข้อมูล",
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
					if(Error_Delete=="NotError"){
						options.title = "ลบข้อมูลสำเร็จ";
					}else if(Error_Delete=="Error"){
						options.title = "ลบข้อมูลไม่สำเร็จ";
					}else{
						options.title = "พบข้อผิดพลาด";
					}
				}else{}
				
				if(percent >= 100){
					if(Error_Delete=="NotError"){
						document.location="<?php echo base_url();?>/Admin?library_mod=books_registration";
					}else if(Error_Delete=="Error"){
						window.clearInterval(interval);
						options.title = "ลบข้อมูลไม่สำเร็จ";
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
						options.title = "พบข้อผิดพลาด";
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

<?php		}else{
				exit("<script>window.location='Admin?library_mod=books_registration';</script>");
			}
		}else{
			exit("<script>window.location='Admin?library_mod=books_registration';</script>");
		}
?>
