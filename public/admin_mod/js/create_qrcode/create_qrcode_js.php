<!--
    Develop By Kunlathon Saowakhon
    พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
    Tel 0932670639
    โทร 0932670639
    Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
-->
    <meta charset="utf-8">
    
    <script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>public/theme/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>

    <script>
        $(document).ready(function(){
// Default file input style
            $(".file-styled").uniform({
                fileButtonClass: 'action btn btn-default'
            });


// Primary file input
            $(".file-styled-primary").uniform({
                fileButtonClass: 'action btn bg-blue'
            });
        })
    </script>



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
            $("#CreateKey_Count").on("click",function(){
                var int_count=$("#int_count").val();
                var int_error=0;

                    if(!isNaN(int_count)){
                        if(int_count===0){
                            document.getElementById("int_count-null").innerHTML=
                            '<div id="int_count-null">'+
                            '   <div class="form-group has-warning has-feedback">'+
                            '       <label class="control-label col-<?php echo $grid;?>-2 text-semibold">จำนวน</label>'+
                            '       <div class="col-<?php echo $grid;?>-10">'+
                            '           <input type="number" name="int_count" id="int_count" value="'+int_count+'" class="form-control">'+
                            '           <div class="form-control-feedback">'+
                            '               <i class="icon-notification2"></i>'+
                            '           </div>'+
                            '           <span class="help-block">กรุณาระบุค่ามากกว่า 0</span>'+
                            '       </div>'+
                            '   </div>'+
                            '</div>';
                            int_error=int_error+1; 
                        }else if(int_count<=24){
                            document.getElementById("int_count-null").innerHTML=
                            '<div id="int_count-null">'+
                            '   <div class="form-group">'+
                            '   <label class="control-label col-<?php echo $grid;?>-2">จำนวน</label>'+
                            '   <div class="col-<?php echo $grid;?>-10">'+
                            '       <input type="number" name="int_count" id="int_count" value="'+int_count+'" class="form-control">'+
                            '   </div>'+
                            '   </div>'+
                            '</div>';
                            int_error=int_error+0;
                        }else{
                            document.getElementById("int_count-null").innerHTML=
                            '<div id="int_count-null">'+
                            '   <div class="form-group has-warning has-feedback">'+
                            '       <label class="control-label col-<?php echo $grid;?>-2 text-semibold">จำนวน</label>'+
                            '       <div class="col-<?php echo $grid;?>-10">'+
                            '           <input type="number" name="int_count" id="int_count" value="'+int_count+'" class="form-control">'+
                            '           <div class="form-control-feedback">'+
                            '               <i class="icon-notification2"></i>'+
                            '           </div>'+
                            '           <span class="help-block">จำนวนไม่เกิน 24</span>'+
                            '       </div>'+
                            '   </div>'+
                            '</div>';
                            int_error=int_error+1;                                
                        }
                    }else{
                        document.getElementById("int_count-null").innerHTML=
                        '<div id="int_count-null">'+
                        '   <div class="form-group has-error has-feedback">'+
                        '       <label class="control-label col-<?php echo $grid;?>-2 text-semibold">จำนวน</label>'+
                        '       <div class="col-<?php echo $grid;?>-10">'+
                        '           <input type="number" name="int_count" id="int_count" value="'+int_count+'" class="form-control">'+
                        '           <div class="form-control-feedback">'+
                        '               <i class="icon-cancel-circle2"></i>'+
                        '           </div>'+
                        '           <span class="help-block">กรุณาระบุค่าเป็นตัวเลข</span>'+
                        '       </div>'+
                        '   </div>'+
                        '</div>';
                        int_error=int_error+1;  
                    }

                    if(int_error>=1){
                        document.getElementById("#run_input_qrcode").innerHTML='<div id="run_input_qrcode"></div>';
                    }else{
                        $.post("<?php echo base_url();?>/create_qrcode/form_create/"+int_error,{
                            int_count:int_count
                        },function(show_input_qrcode){
                            if(show_input_qrcode!=""){
                                $("#run_input_qrcode").html(show_input_qrcode);
                            }else{
                                document.getElementById("#run_input_qrcode").innerHTML='<div id="run_input_qrcode"></div>';
                            }
                        })
                    }
            })
        })
    </script>
    
    <script>
        $(document).ready(function(){
            $("#rest_up").on("click",function(){
                var rest_up=$("#rest_up").val();
                if(rest_up==="rest_up"){
                   location.reload();
                }else{}
            })
        })
    </script>