<?php
 
  $id=$_GET['modal_id'];
  $modal=$this->M_input->getSKeputusanId($id);
  if($r=$modal->row_array()){
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit <?=$judul?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        <div class="modal-body">
          <form action="<?=base_url()?>C_input/sKeputusanEdit_save" name="modal_popup" enctype="multipart/form-data" method="POST">
          
    <table class="table1" width="100%">
      <tr>
        <td width="25%"><b>No :</b></td>
        <td width="75%"><b>Indeks Surat :</b></td>
      </tr>
      <tr>
        <td width="25%"><input type="text" name="txtno"  class="form-control" value="<?php echo $r['no_urut']; ?>" disabled /></td>
        <td width="75%">
          <input type="hidden" name="txtindeks"  class="form-control" value="<?php echo $r['indeks_surat_keputusan']; ?>" />
          <input type="text" name="txtindeks1"  class="form-control" value="<?php echo $r['indeks_surat_keputusan']; ?>" disabled />
        </td>
      </tr>
      <tr>
        <td colspan="2"><b>Bidang/Unit :</b></td>
      </tr>
      <tr>
        <td colspan="2">
                        <select name="cbobidang" id="cbobidang" class="form-control">
          <option value=0>-Pilih Bidang/Unit-</option>
            <?php
              $sql_row=$this->M_master->getBidang();
              foreach ($sql_row->result_array() as $row1){
                $k_id           = $row1['kd_bidang'];
                $k_opis         = $row1['nm_bidang'];
            ?>
                <option value='<?php echo $k_id; ?>' <?php if ($k_id == $r['kd_bidang']){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2"><b>Tentang :</b></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="txttentang"  class="form-control" value="<?php echo $r['tentang']; ?>" /></td>
      </tr>     
      <tr>
        <td colspan="2"><b>Keterangan :</b></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="txtketerangan"  class="form-control" value="<?php echo $r['keterangan']; ?>" /></td>
      </tr>

      <!-- <tr>
        <td width="25%"><b>Upload Dokumen :</b></td>
        <td width="75%"><b>Dokumen Saat Ini :</b></td>
      </tr>
      <tr>
        <td width="25%"><input name="nama_file" id="nama_file" type="file" /></td>
        <td width="75%">
          <input type="text" name="txtdok"  class="form-control" value="<?php echo $r['file_dok']; ?>" readonly />
        </td>
      </tr> -->

      <tr>
      <td><b>Link Dokumen :</b></td>
      <td width="40%"><b>Dokumen Saat Ini :</b></td>
      </tr>
      <tr>
        <td>
          <input type="url" name="link_file"  class="form-control" value="<?php echo $r['link']; ?>"  />
          <!-- <input name="nama_file" id="nama_file" type="file" /> -->
          <!-- <small class="text-danger">Format file harus .PDF</small> -->
          <input type="hidden" name="txtdok"  class="form-control" value="<?php echo $r['file_dok']; ?>"/>
        </td>
        <td>
          <a target="_blank" href="<?php echo $r['link']; ?>">Lihat Dokumen</a>
        </td>
      </tr>
    </table>

<br>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

             <?php } ?>

            </div>

           
        </div>
    </div>

    <style>
    .datepicker{z-index:1151;}
      </style>
      <script>
    $(function(){
        $("#tanggal1, #tanggal2").datepicker({
      format:'dd/mm/yyyy'
        });
                });
      </script>