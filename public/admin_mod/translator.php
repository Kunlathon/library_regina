<?php
	include(APPPATH."Database-pdo/pdo_library.php");
	include(APPPATH."Database-pdo/class_library.php");
?>

<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold">ข้อมูลพื้นฐานห้องสมุด</span> - ข้อมูลผู้แปล
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
		@$manage=filter_input(INPUT_POST,'manage');
			if(($manage=="form_add")){ ?>

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel border-primary">
				<div class="panel-heading bg-primary">
					<h6 class="panel-title">เพิ่มข้อมูลผู้แปล</h6>
					<div class="heading-elements">
						<table border="1" >
							<tr>
								<td><div>
<form name="form_list" id="form_list">
	<button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=translator';" ><i class="icon-book3"></i> รายการ</button>
</form>
								</div></td>
								<td><div>
<form name="form_add" id="form_add" method="post" action="<?php echo base_url();?>admin?library_mod=translator">
	<button type="submit" name="but_add" id="but_add" class="btn btn-success btn-icon"><i class="icon-plus3"></i> เพิ่มข้อมูล</button>
	<input type="hidden" name="manage" id="manage" value="form_add">
</form>
								</div></td>
							</tr>
						</table>
				    </div>
				</div>

				<div class="panel-body">
<form name="FormAddtranslator" class="form-horizontal form-validate-jquery" accept-charset="UTF-8">	
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<fieldset class="content-group">
								<div id="LTr_Txt-null">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-2">ผู้แปลหนังสือ <span class="text-danger">*</span></label>
										<div class="col-<?php echo $grid;?>-10">
											<input type="text" name="LTr_Txt" id="LTr_Txt" class="form-control" required="required" placeholder="พิมพ์ ชื่อผู้แปลหนังสือ..." minlength="3" maxlength="500">
										</div>
									</div>									
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<button type="button" id="save_add" name="save_add" class="btn btn-success">บันทึกข้อมูล (Save)</button>
						</div>
					</div>	
</form>
				</div>






			</div>
		</div>
	</div>

	<?php	}elseif(($manage=="form_update")){ 

		$translator_key=filter_input(INPUT_POST,'translator_key');	
			if((isset($translator_key))){
				$data_translator=new ManagementTranslator($translator_key,"-","read_txt");
				$LTr_Key=$data_translator->CallMTTranslatorTxt();
			}else{
				$LTr_Key="-";
			}
		?>

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel border-primary">
				<div class="panel-heading bg-primary">
					<h6 class="panel-title">แก้ไขข้อมูลผู้แปล</h6>
					<div class="heading-elements">
						<table border="1" >
							<tr>
								<td><div>
<form name="form_list" id="form_list">
	<button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=translator';" ><i class="icon-book3"></i> รายการ</button>
</form>
								</div></td>
								<td><div>
<form name="form_add" id="form_add" method="post" action="<?php echo base_url();?>admin?library_mod=translator">
	<button type="submit" name="but_add" id="but_add" class="btn btn-success btn-icon"><i class="icon-plus3"></i> เพิ่มข้อมูล</button>
	<input type="hidden" name="manage" id="manage" value="form_add">
</form>
								</div></td>
							</tr>
						</table>
				    </div>
				</div>

				<div class="panel-body">
<form name="FormUptranslator" class="form-horizontal form-validate-jquery" accept-charset="UTF-8">	
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<fieldset class="content-group">
								<div id="LTr_Txt-null">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-2">ผู้แปลหนังสือ <span class="text-danger">*</span></label>
										<div class="col-<?php echo $grid;?>-10">
											<input type="text" name="LTr_Txt" id="LTr_Txt" class="form-control" required="required" value="<?php echo $LTr_Key;?>" placeholder="พิมพ์ ผู้แปลหนังสือ..." minlength="3" maxlength="500">
										</div>
									</div>									
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<button type="button" id="save_up" name="save_up" class="btn btn-success">บันทึกข้อมูล (Save)</button>
						</div>
					</div>	
<input type="hidden" name="translator_key" id="translator_key" value="<?php echo $translator_key;?>">					
</form>
				</div>

			</div>
		</div>
	</div>

	<?php   }else{ ?>

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel border-primary">
				<div class="panel-heading bg-primary">
					<h5 class="panel-title">ข้อมูลผู้แปลหนังสือทั้งหมดจาก <code>ฐานข้อมูล</code></h5>
					<div class="heading-elements">
						<table border="1" >
							<tr>
								<td><div>
<form name="form_list" id="form_list">
	<button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=translator';" ><i class="icon-book3"></i> รายการ</button>
</form>
								</div></td>
								<td><div>
<form name="form_add" id="form_add" method="post" action="<?php echo base_url();?>admin?library_mod=translator">
	<button type="submit" name="but_add" id="but_add" class="btn btn-success btn-icon"><i class="icon-plus3"></i> เพิ่มข้อมูล</button>
	<input type="hidden" name="manage" id="manage" value="form_add">
</form>
								</div></td>
							</tr>
						</table>
				    </div>
				</div>

				<div class="panel-body">
					<div id="translator_show">โหลดข้อมูล...</div>		
				</div>

			</div>
		</div>
	</div>



	<?php	} ?>

		</div>
<!-- /main content -->
	</div>
<!-- /page content -->
</div>
<!-- /page container -->