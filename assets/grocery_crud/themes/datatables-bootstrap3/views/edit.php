<?php
//$this->set_css($this->default_theme_path.'/datatables-bootstrap3/css/datatables.css');
//$this->set_css($this->default_theme_path . '/datatables-bootstrap3/css/dataTables.bootstrap.min.css');
$this->set_js($this->default_theme_path . '/datatables-bootstrap3/js/jquery.form.min.js');
$this->set_js_config($this->default_theme_path . '/datatables-bootstrap3/js/datatables-edit.js?v0.4');
//$this->set_css($this->default_theme_path.'/datatables-bootstrap3/css/jquery-ui-1.10.3.custom.css');
//$this->set_css($this->default_theme_path.'/datatables-bootstrap3/js/jquery-ui.min.js');
$this->set_js($this->default_theme_path . '/datatables-bootstrap3/js/jquery.noty.min.js');
$this->set_js($this->default_theme_path . '/datatables-bootstrap3/js/spectrum.min.js');
$this->set_js_lib($this->default_javascript_path . '/jquery_plugins/config/jquery.noty.config.js');


//$this->set_js_config($this->default_theme_path.'/datatables-bootstrap3/js/dataTables.bootstrap.min.js');
?>
<div class='box box-primary datatables'>
    <div class="box-header with-border">
        <?php echo $this->l('form_edit'); ?> <?php echo $subject ?>
    </div>
    <div class='form-container table-container form-content form-div'>
        <?php echo form_open($update_url, 'method="post" id="crudForm" enctype="multipart/form-data" class="form-horizontal"'); ?>
        <div class="box-body">
            <?php
            $counter = 0;
            foreach ($fields as $field) {
                ?>
                <div class="form-group">
                    <label for="<?php echo $field->field_name; ?>" class="col-sm-2 control-label">
                        <?php
                        echo strip_tags($input_fields[$field->field_name]->display_as);
                        echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : "";
                        ?>
                    </label>
                    <div class='col-sm-10' id="<?php echo $field->field_name; ?>_field_box">
    <?php echo $input_fields[$field->field_name]->input ?>
                    </div>
                </div>

            <?php } ?>
            <!-- Start of hidden inputs -->
            <?php
            foreach ($hidden_fields as $hidden_field) {
                echo $hidden_field->input;
            }
            ?>
            <!-- End of hidden inputs -->
<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php } ?>
            <div class="col-sm-12">
                <div id='report-error' class='report-div error callout callout-danger' style="display:none"></div>
                <div id='report-success' class='report-div success callout callout-success' style="display:none"></div>
            </div>
        </div>

        <div class='box-footer'>
            <button class="btn btn-success b10" type="submit" id="form-button-save">
                <i class="fa fa-check"></i>
            <?php echo $this->l('form_update_changes'); ?>
            </button>
<?php if (!$this->unset_back_to_list) { ?>
                <button class="btn btn-info b10" type="button" id="save-and-go-back-button">
                    <i class="fa fa-rotate-left"></i>
    <?php echo $this->l('form_update_and_go_back'); ?>
                </button>
                <button class="btn btn-default cancel-button b10" type="button" id="cancel-button">
                    <i class="fa fa-warning"></i>
                <?php echo $this->l('form_cancel'); ?>
                </button>
<?php } ?>

        </div>
        </form>

    </div>


    <script>
        var validation_url = '<?php echo $validation_url ?>';
        var list_url = '<?php echo $list_url ?>';

        var message_alert_edit_form = "<?php echo $this->l('alert_edit_form') ?>";
        var message_update_error = "<?php echo $this->l('update_error') ?>";
        function ciBsOnHandler(el) {
            console.log($(el).closest('form').attr('action'))
        }
        ;

        function ciBsOffHandler(el) {
            console.log($(el).closest('form').attr('action'))
        }
        ;
    </script>
