<!-- datatable_basic -->

	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script src="<?php echo base_url();?>/public/theme/Template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>

<!-- /datatable_basic -->

	<script>
        $(document).ready(function(){
            var manage=$("#manage").val();
                if(manage==="show"){
                    $.post("<?php echo base_url();?>data_library",{
                        manage:manage
                    },function(run_show){
                        if(run_show!=""){
                            $("#load_data").html(run_show);
                        }else{}
                    })
                }else{}
        })
    </script>

    <script>
        $(document).ready(function(){
            var manage=$("#manage").val();
            var books_key=$("#books_key").val();
            var books_name=$("#books_name").val();
                if(manage==="title" && books_key!=="" && books_name!==""){
                    $.post("<?php echo base_url();?>data_library/notebook/"+books_key,{
                        manage:manage,
                        books_key:books_key,
                        books_name:books_name
                    },function(run_show){
                        if(run_show!=""){
                            $("#load_data").html(run_show);
                        }else{}
                    })
                }else{}
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

    