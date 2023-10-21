<?php
	include("public/database/pdo_library.php");
	include("public/database/class_library.php");
?>

<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4>
				<span class="text-semibold">ข้อมูลพื้นฐานห้องสมุด</span> - ข้อมูลสำนักพิมพ์
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
					<h6 class="panel-title">เพิ่มข้อมูลสำนักพิมพ์</h6>
					<div class="heading-elements">
						<table border="1" >
							<tr>
								<td><div>
<form name="form_list" id="form_list">
	<button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=publisher';" ><i class="icon-book3"></i> รายการ</button>
</form>
								</div></td>
								<td><div>
<form name="form_add" id="form_add" method="post" action="<?php echo base_url();?>admin?library_mod=publisher">
	<button type="submit" name="but_add" id="but_add" class="btn btn-success btn-icon"><i class="icon-plus3"></i> เพิ่มข้อมูล</button>
	<input type="hidden" name="manage" id="manage" value="form_add">
</form>
								</div></td>
							</tr>
						</table>
				    </div>
				</div>

				<div class="panel-body">
<form name="FormAddpublisher" class="form-horizontal form-validate-jquery" accept-charset="UTF-8">	
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<fieldset class="content-group">
								<div id="LP_Name-null">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์หนังสือ <span class="text-danger">*</span></label>
										<div class="col-<?php echo $grid;?>-10">
											<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" placeholder="พิมพ์ ชื่อสำนักพิมพ์หนังสือ..." minlength="3" maxlength="500">
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

		$publisher_key=filter_input(INPUT_POST,'publisher_key');	
			if((isset($publisher_key))){
				$data_publisher=new ManagementPublisher($publisher_key,"-","read_txt");
				$LTr_Key=$data_publisher->CallMP_PublisherTxt();
			}else{
				$LTr_Key="-";
			}
		?>

	<div class="row">
		<div class="col-<?php echo $grid;?>-12">
			<div class="panel border-primary">
				<div class="panel-heading bg-primary">
					<h6 class="panel-title">แก้ไขข้อมูลสำนักพิมพ์</h6>
					<div class="heading-elements">
						<table border="1" >
							<tr>
								<td><div>
<form name="form_list" id="form_list">
	<button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=publisher';" ><i class="icon-book3"></i> รายการ</button>
</form>
								</div></td>
								<td><div>
<form name="form_add" id="form_add" method="post" action="<?php echo base_url();?>admin?library_mod=publisher">
	<button type="submit" name="but_add" id="but_add" class="btn btn-success btn-icon"><i class="icon-plus3"></i> เพิ่มข้อมูล</button>
	<input type="hidden" name="manage" id="manage" value="form_add">
</form>
								</div></td>
							</tr>
						</table>
				    </div>
				</div>

				<div class="panel-body">
<form name="FormUppublisher" class="form-horizontal form-validate-jquery" accept-charset="UTF-8">	
					<div class="row">
						<div class="col-<?php echo $grid;?>-12">
							<fieldset class="content-group">
								<div id="LP_Name-null">
									<div class="form-group">
										<label class="control-label col-<?php echo $grid;?>-2">สำนักพิมพ์หนังสือ <span class="text-danger">*</span></label>
										<div class="col-<?php echo $grid;?>-10">
											<input type="text" name="LP_Name" id="LP_Name" class="form-control" required="required" value="<?php echo $LTr_Key;?>" placeholder="พิมพ์ สำนักพิมพ์หนังสือ..." minlength="3" maxlength="500">
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
<input type="hidden" name="publisher_key" id="publisher_key" value="<?php echo $publisher_key;?>">					
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
					<h5 class="panel-title">ข้อมูลสำนักพิมพ์หนังสือทั้งหมดจาก <code>ฐานข้อมูล</code></h5>
					<div class="heading-elements">
						<table border="1" >
							<tr>
								<td><div>
<form name="form_list" id="form_list">
	<button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=publisher';" ><i class="icon-book3"></i> รายการ</button>
</form>
								</div></td>
								<td><div>
<form name="form_add" id="form_add" method="post" action="<?php echo base_url();?>admin?library_mod=publisher">
	<button type="submit" name="but_add" id="but_add" class="btn btn-success btn-icon"><i class="icon-plus3"></i> เพิ่มข้อมูล</button>
	<input type="hidden" name="manage" id="manage" value="form_add">
</form>
								</div></td>
							</tr>
						</table>
				    </div>
				</div>

				<div class="panel-body">
					<div id="publisher_show">โหลดข้อมูล...</div>		
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