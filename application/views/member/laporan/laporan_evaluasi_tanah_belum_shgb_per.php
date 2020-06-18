<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>  
  <meta charset="UTF-8"> 
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/fav.png" type="image/ico">   
  <title>PT Argopuro</title>    
  <meta name="author" content="Paber">   
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap/css/bootstrap.css" />
  <?php $this->load->view('komponen/css'); ?>
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/magnific-popup/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/select2/select2.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/skins/default.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/theme-custom.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/stylesheets/admin.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.css" />


  <!-- Head Libs -->
  <script src="<?php echo base_url()?>/assets/vendor/modernizr/modernizr.js"></script>
</head>
<body class="bgbody">
  <section class="body">

     <?php $this->load->view("komponen/header.php") ?>
     <div class="inner-wrapper"> 
        <?php $this->load->view("komponen/sidebar.php") ?>
        <section role="main" class="content-body">
           <header class="page-header">  
              <h2>Master Data Tanah</h2>
          </header>  
          <!-- start: page -->
                   <!-- start: page -->
          <section class="panel">
            <header class="panel-heading">    
                <div class="row">
                    <div class="col-sm-3" align="left"><h2 class="panel-title">LAND BANK</h2></div>
                    <form action="" method="get">
                        <div class="form-group mt-lg nama_supplier">
                            <div class="col-sm-5">
                                <select data-plugin-selectTwo class="form-control" onchange='this.form.submit()' required name="id_perumahan">  
                                    <option value="">Pilih Lokasi</option>
                                    <?php foreach ($perumahan as $aa): ?>
                                        <option value="<?php echo $aa->id;?>" <?php if ($id_perumahan == $aa->id ) echo 'selected' ; ?> ><?php echo $aa->nama_regional;?></option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                        </div>
                    </form>
                </div>
            </header>

            <div id="kontendata">

            </div>

        </section>
    </section>
</div>
</section>


<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="detailData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <section class="panel panel-primary">   
                <header class="panel-heading">
                    <h2 class="panel-title">Detail Obat / Alkes</h2>
                </header>
                <div class="panel-body" id="showdetail"> 
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </footer> 
            </section>
        </div>
    </div>
</div>

<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <section class="panel panel-primary">
                <?php echo form_open('master/updatemasteritem',' id="FormulirEdit"  enctype="multipart/form-data"');?>  
                <input type="hidden" name="idd" id="idd">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Data Tanah/Aset</h2>
                </header>
                <div class="panel-body">
                  
                <div class="form-group mt-lg nama_supplier">
                    <label class="col-sm-3 control-label">Status Order Akta<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select data-plugin-selectTwo class="form-control" required name="status_order_akta" id="status_order_akta">  
                            <option value="">Pilih status</option>
                                <option value="belum">Belum</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                        </select> 
                    </div>
                </div>
               
                <div class="form-group keterangan">
                    <label class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea rows="2" class="form-control" name="keterangan" id="keterangan"></textarea>
                    </div>
                </div>
                
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-confirm" type="submit" id="submitformEdit">Submit</button>
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </footer>
        </form>
    </section>
</div>
</div>
</div>
 

<!-- Vendor -->
<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="<?php echo base_url()?>assets/vendor/select2/select2.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/admin.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        refresh();
    });
</script>
<script type="text/javascript">
     function edit(elem){
      var dataId = $(elem).data("id");   
      document.getElementById("idd").setAttribute('value', dataId);
      $('#editData').modal();        
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url()?>master/itemdetail',
        data: 'id=' + dataId,
        dataType    : 'json',
        success: function(response) {  
            $.each(response, function(i, item) { 
             document.getElementById("keterangan").value = item.keterangan; 
             $("#status_order_akta").select2("val", item.status_order_akta);
         }); 
        }
    });  
      return false;
  }
  document.getElementById("FormulirEdit").addEventListener("submit", function (e) {  
   blurForm();       
   $('.help-block').hide();
   $('.form-group').removeClass('has-error');
   document.getElementById("submitformEdit").setAttribute('disabled','disabled');
   $('#submitformEdit').html('Loading ...');
   var form = $('#FormulirEdit')[0];
   var formData = new FormData(form);
   var xhrAjax = $.ajax({
       type       : 'POST',
       url        : $(this).attr('action'),
       data       : formData, 
       processData: false,
       contentType: false,
       cache: false, 
       dataType   : 'json'
   }).done(function(data) { 
       if ( ! data.success) {  
        $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
        document.getElementById("submitformEdit").removeAttribute('disabled');  
        $('#submitformEdit').html('Submit');    
        var objek = Object.keys(data.errors);  
        for (var key in data.errors) {
            if (data.errors.hasOwnProperty(key)) { 
                var msg = '<div class="help-block" for="'+key+'">'+data.errors[key]+'</span>';
                $('.'+key).addClass('has-error');
                $('input[name="' + key + '"]').after(msg);  
            }
            if (key == 'fail') {   
                new PNotify({
                    title: 'Notifikasi',
                    text: data.errors[key],
                    type: 'danger'
                }); 
            }
        }
    } else { 
        $('input[name=<?php echo $this->security->get_csrf_token_name();?>]').val(data.token);
        PNotify.removeAll();
        document.getElementById("submitformEdit").removeAttribute('disabled'); 
        $('#editData').modal('hide');        
        document.getElementById("FormulirEdit").reset();    
        $('#submitformEdit').html('Submit');   
        new PNotify({
            title: 'Notifikasi',
            text: data.message,
            type: 'success'
        });  
        refresh();    

    }
}).fail(function(data) { 
    new PNotify({
        title: 'Notifikasi',
        text: "Request gagal, browser akan direload",
        type: 'danger'
    }); 
                    //window.settimeout(function() {  location.reload();}, 2000);
                }); 
e.preventDefault(); 
}); 
	  function refresh() { 

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url(); ?>laporan/pageevaluasishgbper/',
        data: 'id_perumahan=<?php echo $id_perumahan ?>',
        success: function (html) { 
            $('#kontendata').html(html); 
        }
    }); 
}
</script>
</body>
</html>