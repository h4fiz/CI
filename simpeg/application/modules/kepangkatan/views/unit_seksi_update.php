<select class="form-control input-modals" name="seksi" id="seksi_update">
    <?php foreach($query_seksi->result() as $data) { ?>
    	<?php if ($data->IdSeksi == $id_seksi) {  ?>
    		<option value="<?=$data->IdSeksi;?>" selected><?=$data->Seksi;?></option>
    	<?php } else { ?>
    		<option value="<?=$data->IdSeksi;?>"><?=$data->Seksi;?></option>
    	<?php } ?>
    <?php } ?>
</select>