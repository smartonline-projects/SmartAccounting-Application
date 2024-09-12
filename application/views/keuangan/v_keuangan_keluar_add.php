<?php 
	$this->load->view('template/header');
    $this->load->view('template/body');    	  
?>	




			<div class="row">
				<div class="col-md-12">
					<h3 class="page-title">
					  Keuangan <small>Entri Pengeluaran Kas/Bank</small>
					</h3>
                    <ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo base_url();?>dashboard">
                               Awal
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo base_url();?>keuangan_keluar">
                               Daftar Pengeluaran Kas/Bank
                              							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>							
							<a href="">
                               Entri Pengeluaran Kas/Bank
							</a>
						</li>
					</ul>
				</div>
			</div>
            <div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Form Entri Pengeluaran
										</div>
										<!--div class="tools">
											 <span class="label label-sm label-danger">										
											  REGISTER : 
											</span>

										</div-->
										
							        </div>
									
									<div class="portlet-body form">
										<form id="frmkeuangan" class="form-horizontal" method="post">
											<div class="form-body">
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
                                                            <label class="col-md-3 control-label">Nomor Bukti</label>
													        <div class="col-md-4">
															    <input type="text" placeholder="Nomor Otomatis" class="form-control input-medium" name="nomorbukti"  id="nomorbukti" value="" readonly>																																															
																
													        </div>

														</div>
													</div>
													<!--/span-->
													<div class="col-md-4">
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Tgl Buat</label>
													        <div class="col-md-4">
														        <input id="tanggal" name="tanggal" class="form-control input-medium" type="date" value="<?php echo date('Y-m-d');?>" placeholder=""/>
													    	   
													        </div>
													        


														</div>
													</div>
													
													<div class="col-md-4">
                                                         <div class="form-group">
                                                           <label class="col-md-3 control-label">Kas/Bank</label>
													        <div class="col-md-4">
                                                              <select id="kasbank" name="kasbank" class="form-control input-medium select2me" data-placeholder="Pilih..." onkeypress="return tabE(this,event)">
            												 
                                                            <?php
                                                              foreach($bank as $row) { ?>
            													<option value="<?php echo $row->kodeakun;?>"><?php echo $row->namaakun;?></option>
                                                            <?php } ?>
            												</select>
													        </div>
													        </div>

														</div>
													</div>
												
												<div class="row">
												    <div class="col-md-4">
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Pembayaran</label>
													        <div class="col-md-4">
                                                              <select id="pembayaran" name="pembayaran" class="form-control input-medium select2me" data-placeholder="Pilih..." onkeypress="return tabE(this,event)">
            												 
															  <option value="T">Tunai</option>
															  <option value="C">Cek</option>
															  <option value="G">Giro</option>
                                                              
            												</select>
													        </div>

														</div>
													</div>
													
													<div class="col-md-4">
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Tgl Bayar</label>
													        <div class="col-md-4">
														        <input id="tanggalcek" name="tanggalcek" class="form-control date-picker input-medium" type="date" value="<?= date('Y-m-d')?>" placeholder="" />
													        </div>



														</div>
													</div>
													
													<div class="col-md-4">
														<div class="form-group">
                                                            <label class="col-md-3 control-label">Nomor</label>
													        <div class="col-md-4">
														        <input type="text" class="form-control input-medium" placeholder="" name="nomorcek" id="nomorcek" value="">
													        </div>

														</div>
													</div>
												
													
												</div>
												
												
												<div class="row">
												    <div class="col-md-4">
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Penerima</label>
													        <div class="col-md-4">
														        <input type="text" class="form-control input-medium" placeholder="" name="penerima" id="penerima" value="" onkeypress="return tabE(this,event)">
													        </div>

														</div>
													</div>
													
												    <div class="col-md-4">
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Keterangan</label>
													        <div class="col-md-4">
														        <input type="text" class="form-control input-medium" placeholder="" name="keterangan" id="keterangan" value="" onkeypress="return tabE(this,event)">
													        </div>

														</div>
													</div>
													
                                                    
													
													
													<div class="col-md-4">
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Cabang</label>
													        <div class="col-md-4">
                                                              <select id="unit" name="unit" class="form-control input-medium select2me" data-placeholder="Pilih..." onkeypress="return tabE(this,event)">
            												 
                                                            <?php
                                                              foreach($unit as $row)
            												  { ?>
            													<option value="<?php echo $row->kode;?>"><?php echo $row->nama;?></option>
                                                            <?php } ?>
            												</select>
													        </div>

														</div>
													</div>

												</div>

												<div class="row">
												 <div class="col-md-12">
                                                   	<div class="table-responsive" >
							                    	<table class="table table-bordered- table-condensed">
								                    <thead>
                                                      <tr>
                    									<th width="25%" style="text-align: center">Kode Akun</th>
                    									<th width="50%" style="text-align: center">Uraian</th>
                    									<th width="20%" style="text-align: center">Jumlah</th>
                    									
                    								</tr>
                    								<thead>
													</table>
													

													<div class="bodycontainer- scrollable-">
													<table id="datatable" class="table table-hoverx table-stripedx table-borderedx table-condensed table-scrollable">
													
													
                    								<tbody>
													<tr>													   
                                                        <td width="15%">
														        <select name="akun[]" id="akun0" class="select2_el form-control" style="width:300px" >
																  <option value="">--- Pilih Akun ---</option>
																</select>
																
																				                
														
														</td>
                                                       
                                                        <td width="50%" ><input name="ket[]"    id="ket0" type="text" class="form-control "  onkeypress="return tabE(this,event)"></td>
                                                        <td width="20%" ><input name="jumlah[]"  id="jumlah0"; type="text" class="form-control rightJustified" size="40%" value="0" onChange="total();formatCurrency(this)" onkeypress="return tabE(this,event);formatCurrency(this)"></td>
                                                       
								                      </tr>
                    								
								                    </tbody>
													</table>
													</div>
													<table class="table table-condensed">
								                    <tfoot>
                                                      <tr>
													    <td width="20%"><button type="button" onclick="tambah()" class="btn green"><i class="fa fa-plus"></i> </button>
												        <button type="button" onclick="hapus()" class="btn red"><i class="fa fa-trash-o"></i></button></td>
                                                         <td width="60%" align="right">TOTAL</td>
														<td width="20%" align="right"><font color="red">
														<b><input type="text" id="_jumlah" class="form-control rightJustified" disabled>
														</b></font></td>
														
														                                                        
														
                                                      </tr>
                                                     </tfoot>
								                    </table>
								                    </div>
								                   </div>
												</div>
												

											<div class="form-actions">
												
												<button type="button" onclick="save()" class="btn blue"><i class="fa fa-save"></i> Simpan</button>
												<div class="btn-group">
                                                <button type="button" class="btn green" onclick="this.form.reset();location.reload();"><i class="fa fa-edit"></i> Data Baru</button>
                														
										
											</div>
											<h4><span id="error" style="display:none; color:#F00">Terjadi Kesalahan... </span> <span id="success" style="display:none; color:#0C0">Data sudah disimpan...</span></h4>
                                          
										 
										
										
	
										</form>
									</div>
                                   </div>
		</div>
	</div>
</div>

<?php
  $this->load->view('template/footer');
?>

<script>

var idrow = 1;

function tambah(){
    var x=document.getElementById('datatable').insertRow(idrow);
    var td1=x.insertCell(0);
    var td2=x.insertCell(1);
    var td3=x.insertCell(2);
     
	var akun1="<select name='akun[]' class='select2_el form-control select2me' id='akun'"+idrow+" style='width:300px' ><option value=''>--- Pilih Akun ---</option></select>";
	
	td1.innerHTML=akun1;
	td2.innerHTML="<input name='ket[]'    type='text' class='form-control'>";
	td3.innerHTML="<input name='jumlah[]'  type='text' class='form-control rightJustified' size='40%' value='0' onChange='total();formatCurrency(this)'>";
	
	
    initailizeSelect2();
	
	idrow++;
	
}

function save()
{	           
    var tanggal   = $('[name="tanggal"]').val();  
	$.ajax({				
		url:'<?php echo site_url('keuangan_keluar/pengeluaran_save/1')?>',				
		data:$('#frmkeuangan').serialize(),				
		type:'POST',
		success:function(data){        		
		swal({
					  title: "PENGELUARAN KAS/BANK",
					  html: "<p> No. Bukti   : <b>"+data+"</b> </p>"+ 
					  "Tanggal :  " + tanggal,
					  type: "info",
					  confirmButtonText: "OK" 
					 }).then((value) => {
							location.href = "<?php echo base_url()?>keuangan_keluar";
		         });									
	
		},
		error:function(data){
			$("#error").show().fadeOut(5000);
		}
		});
}	

	function hapus(){
		if(idrow>1){
			var x=document.getElementById('datatable').deleteRow(idrow-1);
			idrow--;
			total();
		}
	}

  function total()
  {
    
   var table = document.getElementById('datatable');
   var rowCount = table.rows.length;

   tjumlah=0;
  
   
   for(var i=0; i<rowCount; i++) 
   {
    var row = table.rows[i];
    
	jumlah      = row.cells[2].children[0].value;
    var jumlah1 = Number(jumlah.replace(/[^0-9\.]+/g,""));

   	tjumlah  = tjumlah  + eval(jumlah1);
		  
    
   }
   document.getElementById("_jumlah").value=formatCurrency1(tjumlah);


  }
  
  

</script>



							
</body>
</html>

