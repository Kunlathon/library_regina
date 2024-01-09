<?php
	//Develop By Kunlathon Saowakhon
	//พัฒนาเว็บระบบโดย นายกุลธร เสาวคนธ์
	//Tel 0932670639
	//โทร 0932670639
	//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
?>
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<li class="active"><a href="<?php echo base_url();?>admin"><i class="icon-display4 position-left"></i>&nbsp;หน้าแรก</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-strategy position-left"></i>&nbsp;ข้อมูลพื้นฐานห้องสมุด<span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li class="dropdown-header">การจัดการ</li>
							<li><a href="<?php echo base_url();?>admin?library_mod=author"><i class="icon-align-center-horizontal"></i> ผู้แต่ง</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=type"><i class="icon-align-center-horizontal"></i> ประเภทหนังสือ</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=editor"><i class="icon-align-center-horizontal"></i> บรรณาธิการ</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=translator"><i class="icon-align-center-horizontal"></i> ผู้แปล</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=publisher"><i class="icon-align-center-horizontal"></i> สำนักพิมพ์</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=keep"><i class="icon-align-center-horizontal"></i> ที่เก็บหนังสือ</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=ddc"><i class="icon-align-center-horizontal"></i> หมวดหมู่ระบบทศนิยมดิวอี้</a></li>

							
							
							
							
						<li class="dropdown-header">รายงาน</li>
							<li><a href="#"><i class="icon-align-center-horizontal"></i> Fixed width</a></li>
							<li><a href="#"><i class="icon-flip-vertical3"></i> Sticky sidebar</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-strategy position-left"></i> ข้อมูลพื้นฐานหนังสือ<span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li class="dropdown-header">การจัดการ</li>
							<li><a href="<?php echo base_url();?>admin?library_mod=books_register"><i class="icon-align-center-horizontal"></i>&nbsp;ลงทะเบียนหนังสือ</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=books_library"><i class="icon-align-center-horizontal"></i>&nbsp;เพิ่มหนังสือเข้าห้องสมุด</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=books_registration"><i class="icon-align-center-horizontal"></i>&nbsp;การจัดการเลขทะเบียนหนังสือ</a></li>
						<li class="dropdown-header">รายงาน</li>
							<li><a href="<?php echo base_url();?>admin?library_mod=report_library"><i class="icon-align-center-horizontal"></i>&nbsp;ข้อมูลหนังสือ-ค้นหา</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=data_library"><i class="icon-align-center-horizontal"></i>&nbsp;ข้อมูลหนังสือ-ทั้งหมด</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=create_qrcode"><i class="icon-align-center-horizontal"></i>&nbsp;จัดพิมพ์ QR Code และ Barcode หนังสือ</a></li>
					</ul>
				</li>				
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-strategy position-left"></i> ระบบยืมคืนหนังสือ<span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li class="dropdown-header">การจัดการ</li>
							<li><a href="<?php echo base_url();?>admin?library_mod=borrow_book"><i class="icon-align-center-horizontal"></i>&nbsp;ยืมหนังสือ</a></li>
							<li><a href="<?php echo base_url();?>admin?library_mod=return_book"><i class="icon-align-center-horizontal"></i>&nbsp;คืนหนังสือ</a></li>
						<li class="dropdown-header">รายงาน</li>
							<li><a href="<?php echo base_url();?>admin?library_mod=#"><i class="icon-align-center-horizontal"></i>&nbsp;</a></li>
					</ul>
				</li>			
				
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-history position-left"></i>
						Version
						<span class="label label-inline position-right bg-success-400">UpDate 20240109001</span>
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right">Share</span>
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
						<!--<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>-->
						<!--<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>-->
						<!--<li class="divider"></li>-->
						<!--<li><a href="#"><i class="icon-gear"></i> All settings</a></li>-->
					</ul>
				</li>
			</ul>
		</div>
	</div>