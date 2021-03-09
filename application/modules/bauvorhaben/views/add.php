<form method="post" action="<?php echo site_url("bauvorhaben/addPost"); ?>">

    <input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"
           value="<?php echo $this->security->get_csrf_hash() ?>">

    <div id="headerbar">
<<<<<<< HEAD
        <h1 class="headerbar-title"><?php _trans('construction_project_add'); ?></h1>
=======
        <h1 class="headerbar-title"><?php _trans('Bauvorhaben Hinzufügen'); ?></h1>
>>>>>>> 35c98ae9acbc5b79827cb5ee4b8e317672cfc925
        <?php $this->layout->load_view('layout/header_buttons'); ?>
    </div>
<br>
 <div class="form-group row">
<<<<<<< HEAD
    <label for="bezeichnung" class="col-sm-2 col-form-label"><?php _trans("label"); ?></label>
=======
    <label for="bezeichnung" class="col-sm-2 col-form-label">Bezeichnung</label>
>>>>>>> 35c98ae9acbc5b79827cb5ee4b8e317672cfc925
    <div class="col-sm-4">
      <input type="text" name="bezeichnung" class="form-control" id="bezeichnung" placeholder="Bezeichnung">
    </div>
  </div>
</form>
