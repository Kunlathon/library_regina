	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<forn style="font-family: surafont_sanukchang ; font-size: 16px; font-weight: bold;">
					<span class="text-semibold">หน้าแรก</span>&nbsp;-&nbsp;Welcome&nbsp;to&nbsp;MIS&nbsp;Regina&nbsp;Library
					<small class="display-block">Management&nbsp;Information&nbsp;System&nbsp;Regina&nbsp;Library</small>
</forn>
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
	
	<div class="page-container">
		<div class="page-content">

			<fieldset class="content-group">
				<div class="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-body border-top-primary">
							
							<fieldset class="content-group">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div style="font-family: surafont_sanukchang ; font-size: 16px; font-weight: bold;" class="no-margin text-semibold">ข้อมูลพื้นฐานห้องสมุด</div>
									</div>
								</div>
							</fieldset>

							<fieldset class="content-group">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=author'"><i class="icon-database-add"></i> <span>ผู้แต่ง</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=type'"><i class="icon-database-add"></i> <span>ประเภทหนังสือ</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=editor'"><i class="icon-database-add"></i> <span>ข้อมูลบรรณาธิการ</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=translator'"><i class="icon-database-add"></i> <span>ผู้แปล</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=publisher'"><i class="icon-database-add"></i> <span>สำนักพิมพ์</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=keep'"><i class="icon-database-add"></i> <span>ที่เก็บหนังสือ</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=ddc'"><i class="icon-database-refresh"></i> <span>DDC</span></button>

									</div>

									

								</div>
							</fieldset>

						</div>



					</div>
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-body border-top-primary">

							<fieldset class="content-group">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div style="font-family: surafont_sanukchang ; font-size: 16px; font-weight: bold;" class="no-margin text-semibold">ข้อมูลพื้นฐานหนังสือ</div>
									</div>
								</div>
							</fieldset>

							<fieldset class="content-group">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=books_register'"><i class="icon-folder-upload"></i> <span>ลงทะเบียนหนังสือ</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=books_library'"><i class="icon-folder-plus2"></i> <span>เพิ่มหนังสือเข้าห้องสมุด</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=books_registration'"><i class="icon-pencil4"></i> <span>การจัดการเลขทะเบียนหนังสือ</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=report_library'"><i class="icon-pencil4"></i> <span>การจัดการเลขทะเบียนหนังสือ</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=data_library'"><i class="icon-database4"></i> <span>ข้อมูลหนังสือ-ทั้งหมด</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=create_qrcode'"><i class="icon-shredder"></i> <span>จัดพิมพ์ QR Code และ Barcode หนังสือ</span></button>
									</div>
								</div>
							</fieldset>

						</div>				
					</div>
				</div>

				<div classs="row">
					<div class="col-<?php echo $grid;?>-6">
						<div class="panel panel-body border-top-primary">
							
							<fieldset class="content-group">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<div style="font-family: surafont_sanukchang ; font-size: 16px; font-weight: bold;" class="no-margin text-semibold">ระบบยืมคืนหนังสือ</div>
									</div>
								</div>
							</fieldset>

							<fieldset class="content-group">
								<div class="row">
									<div class="col-<?php echo $grid;?>-12">
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=borrow_book'"><i class="icon-qrcode"></i> <span>ยืมหนังสือ</span></button>
										<button type="button" class="btn btn-default btn-float btn-float-lg content-group" onClick="location.href='<?php echo base_url();?>admin?library_mod=return_book'"><i class="icon-barcode2"></i> <span>คืนหนังสือ</span></button>
									</div>
								</div>
							</fieldset>	

						</div>
			
					</div>
					<div class="col-<?php echo $grid;?>-6"></div>
				</div>

			</fieldset>



		</div>
	</div>