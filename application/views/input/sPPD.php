<style type="text/css">
  .setkol{
    background-color: gainsboro;text-align:center; font-size: 13px;
  }
</style>
<div class="page-wrapper">
        
            <div class="page-breadcrumb">
                <div class="d-flex align-items-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-0"><?=$judul?></h4>
                    <div class="ml-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item text-muted active" aria-current="page">Beranda</li>
                                <li class="breadcrumb-item text-muted" aria-current="page"><?=$judul?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <br>
              <div class="well">
              <p>Total Surat : <?=$sql->num_rows()?><br>
                Surat Hari ini : <?=$this->M_input->getsNow('tbsurat_spt_dtl','tgl_mulai_sppd')?></p>
              </div>
                            <div class="card-body">
                              <?php
                              $message = $this->session->flashdata('pesan');
                              echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
                              ?>
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered setkol">
                                    <tr>    
                                            <th colspan="13">
                                                <div class="row">
                                                  <div class="col-md-8">
                                                      <form method="get">
                                                        <div class="input-group">
                                                          <input type="Search" class="form-control" name="strnama" placeholder="Perihal Surat...">
                                                          <span class="input-group-btn">
                                                            <button  class="btn btn-primary" type="submit">Cari</button>
                                                          </span>
                                                        </div><!-- /input-group -->
                                                        </form>
                                                  </div>
                                                  <div class="col-md-4 pull-left">
                                                    
                                                </div>
                                                </div>
                                        
                                        
                                        </th>
                                          </tr>
                                          <tr >
                                            <th ><font size="">No</font></th>
                                            <th ><font size="">Nama</font></th>
                                            <th ><font size="">NIP</font></th>
                                            <th ><font size="">Dalam Rangka/Keperluan</font></th>
                                            <th ><font size="">Bidang</font></th>
                                            <th ><font size="">Kegiatan</font></th>
                                            <th ><font size="">Tgl Brgkt</font></th>
                                            <th ><font size="">Tgl Kmbli</font></th>
                                            <th ><font size="">Menu</font></th>  
                                          </tr>

                                          <?php 
                                            foreach ($sql->result_array() as $tampil){
                                              $kd_bidang=$tampil['kd_bidang'];

                                              $gidpeg=$this->M_master->getKdBidang($kd_bidang);
                                              $tm_cari=$gidpeg->row_array();
                                              $nm_bidang = $tm_cari['nm_bidang'];

                                              $getIdKegiatan=$this->M_master->getIdKegiatan($tampil['id_kegiatan']);
                                              $tm_cari=$getIdKegiatan->row_array();
                                              $nm_kegiatan = $tm_cari['nm_kegiatan'];

                                              $nip=$tampil['id_nip'];
                                              $tm_cari=$this->M_master->getPegawaiId($nip)->row_array();
                                              $nama = $tm_cari['nama'];
                                              $nip1 = $tm_cari['nip'];
                                             ?> 
                                                <tr>
                                                  <td align="center"><font size="2"><?php echo $tampil['no_sppd']?></font></td>
                                                  <td><font><?php echo $nama?></font></td>
                                                  <td><font><?php echo $nip1?></font></td>
                                                  <td><font><?php echo $tampil['perihal']?></font></td>
                                                  <td><font><?php echo $nm_bidang?></font></td>
                                                  <td><font><?php echo $nm_kegiatan?></font></td>
                                                  <td><font><?php echo $tampil['tgl1']?></font></td>
                                                  <td><font><?php echo $tampil['tgl2']?></font></td>
                                                  
                                                  <td>
                                                    <a href="<?=base_url('C_input/ubahSPPD/?id='.$tampil['no_sppd'])?>">
                                                      <font size="2"><i>Update</i></font>
                                                    </a>
                                                  </td>
                                                </tr>
                                             <?php
                                            }
                                          ?>
                                        </table>
                                      </div>
                            </div>
        </div>
<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Hapus <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
      
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      
      
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a   class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>

      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "<?=base_url()?>C_input/sPTAEdit",
             type: "GET",
             data : {modal_id: m,},
             success: function (ajaxData){
               $("#ModalEdit").html(ajaxData);
               $("#ModalEdit").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>