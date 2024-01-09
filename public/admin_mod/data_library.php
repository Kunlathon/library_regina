<?php
    //Develop By Kunlathon Saowakhon
    //พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    //Tel 0932670639
    //โทร 0932670639
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	

?>
    <div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<span class="text-semibold">ข้อมูลพื้นฐานหนังสือ</span>&nbsp;-&nbsp; ข้อมูลหนังสือ-ทั้งหมด
					<small class="display-block">Management&nbsp;Information&nbsp;System&nbsp;Regina&nbsp;Library</small>
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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php
        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST,'manage');
        }else{
            $manage="show";
        }
            if(($manage=="show")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <fieldset class="content-group">
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
			    		<div class="panel">
							<div class="panel-heading bg-orange-600">
								<div style="font-size: 18px;" class="panel-title">ตารางข้อมูลหนังสือ-ทั้งหมด <code>DataBase</code></div>
								<div class="heading-elements">
									<table border="1" >
										<tr>
											<td>
												<div><button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=data_library';" ><i class="icon-office"></i> หน้าหลัก</button></div>
											</td>
											<td>
												<div><button type="button" name="rest_up" id="rest_up" class="btn btn-success btn-icon"><i class="icon-list-unordered"></i> รายการ</button></div>
											</td>
										</tr>
									</table>
			                	</div>
							</div>
							<div class="panel-body">
                                <div id="load_data">
                                <fieldset class="content-group">
                                    <div class="row">
                                        <div class="col-<?php echo $grid;?>-12">
                                            <div><i class="icon-spinner2 spinner"></i> กำลังโหลดข้อมูล...</div>
                                        </div>
                                    </div>
                                </fieldset>
<input type="hidden" name="manage" id="manage" value="show">
                                </div>
							</div>
						</div>
                        </div>
                    </div>
                </fieldset>    
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }elseif(($manage=="title")){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php
				if((isset($_POST["books_key"]))){
					$books_key=filter_input(INPUT_POST,'books_key');
					
						if((isset($_POST["books_name"]))){
							$books_name=filter_input(INPUT_POST,'books_name');
						}else{
							$books_name=null;
						}
					
					?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
				<fieldset class="content-group">
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
							<div class="panel">
								<div class="panel-heading bg-orange-600">
									<div style="font-size: 18px;" class="panel-title">ตารางข้อมูลหนังสือ- <?php echo $books_name;?> (<?php echo $books_key;?>)</div>
									<div class="heading-elements">
										<table border="1" >
											<tr>
												<td>
													<div><button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=data_library';" ><i class="icon-office"></i> หน้าหลัก</button></div>
												</td>
												<td>
													<div><button type="button" name="rest_up" id="rest_up" class="btn btn-success btn-icon"><i class="icon-list-unordered"></i> รายการ</button></div>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="panel-body">

									<div id="load_data">
										<fieldset class="content-group">
											<div class="row">
												<div class="col-<?php echo $grid;?>-12">
													<div><i class="icon-spinner2 spinner"></i> กำลังโหลดข้อมูล...</div>
												</div>
											</div>
										</fieldset>

<input type="hidden" name="manage" id="manage" value="title">
<input type="hidden" name="books_key" id="books_key" value="<?php echo $books_key;?>">
<input type="hidden" name="books_name" id="books_name" value="<?php echo $books_name;?>">			

									</div>
								
								</div>
							</div>
                        </div>
                    </div>
                </fieldset>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php	}else{ ?>

				<fieldset class="content-group">
                    <div class="row">
                        <div class="col-<?php echo $grid;?>-12">
			    		<div class="panel">
							<div class="panel-heading bg-orange-600">
								<div style="font-size: 18px;" class="panel-title">ตารางข้อมูลหนังสือ- <?php echo $books_name;?> </div>
								<div class="heading-elements">
									<table border="1" >
										<tr>
											<td>
												<div><button type="button" class="btn btn-success btn-icon" onclick="location.href='<?php echo base_url();?>admin?library_mod=data_library';" ><i class="icon-office"></i> หน้าหลัก</button></div>
											</td>
											<td>
												<div><button type="button" name="rest_up" id="rest_up" class="btn btn-success btn-icon"><i class="icon-list-unordered"></i> รายการ</button></div>
											</td>
										</tr>
									</table>
			                	</div>
							</div>
							<div class="panel-body">

							</div>
						</div>
                        </div>
                    </div>
                </fieldset>   

		<?php   }?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php   }else{ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->    