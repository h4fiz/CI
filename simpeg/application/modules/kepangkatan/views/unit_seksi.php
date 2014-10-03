<select class="form-control input-modals" name="seksi">
    <?php foreach($query_seksi->result() as $data) { ?>
    <option value="<?=$data->IdSeksi;?>"><?=$data->Seksi;?></option>
    <?php } ?>
</select>