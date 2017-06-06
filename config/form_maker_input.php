<?php 
//INPUT FORM MAKER /////////////////////////////////////////
class input {

    //input text
    function textbox($label,$name,$placeholder){
            ?>
        <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                            <input type="text" placeholder="<?php echo $placeholder ?>" class="form-control" name="<?php echo $name ?>" />
                    </div>
            </div>
    <?php
    }

    //input email
    function emailbox($label,$name,$placeholder){
            ?>
        <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                            <input type="email" placeholder="<?php echo $placeholder ?>" class="form-control" name="<?php echo $name ?>" />
                    </div>
            </div>
    <?php
    }

    //input file
    function file_input($label,$name,$title){
            ?>
            <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                    <div class="input-group">
                            <input type="text" class="form-control" readonly title="<?php echo $title ?>" placeholder="<?php echo $title ?>">
                            <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                            Browse&hellip; <input type="file" name="<?php echo $name ?>" title="<?php echo $title ?>">
                                    </span>
                            </span>
                            </div>
                    </div>
            </div>
    <?php
    }

    //input combobox
    function combobox($label,$name,$query,$value,$option){
            ?>
            <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                    <?php $qry = mysql_query($query) ?>
                            <select name="<?php echo $name ?>">
                                    <?php while ($kece = mysql_fetch_assoc($qry)) {
                                    ?>
                                    <option value="<?php echo $kece[$value]?>"><?php echo $kece[$option] ?></option>
                                    <?php
                                    } ?>										
                            </select>
                    </div>
            </div>
    <?php
    }

    //input date
    function datebox($label,$name,$type){

            if ($type<>"") {
                    $format = $type;
            }
            else{
                    $format = "yyyy-mm-dd";
            }
            ?>
            <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                            <input type="text" name="<?php echo $name ?>" class="form-control datepicker" data-date-format="<?php echo $format ?>" placeholder="<?php echo $format ?>">
                    </div>
            </div>
    <?php
    }

    //input textarea
    function textarea($label,$name,$placeholder){
            ?>
            <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5"> 
                            <textarea placeholder="<?php echo $placeholder ?>" name="<?php echo $name ?>" rows="5" class="form-control no-resize"></textarea>
                    </div>
            </div>
    <?php
    }


    //input text area with limited text
    function textarea_limit($label,$name,$text_max,$placeholder){

            ?>
            <script>
          function countChar(val) {
            var len = val.value.length;
            var text_max = <?php echo $text_max ?>;
            if (len > text_max) {
              val.value = val.value.substring(0, text_max);
            } else {
              $('#<?php echo $name ?>').text(text_max - len + ' character remaining');
            }
          };
        </script>

            <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                            <textarea id="field" placeholder="<?php echo $placeholder ?>" onkeyup="countChar(this)" name="<?php echo $name ?>" rows="5" maxlength="<?php echo $text_max ?>" class="form-control no-resize"></textarea>
                            <div id="<?php echo $name ?>"></div>
                    </div>
            </div>
    <?php
    }

    //input hiden atau update hidden
    function hiddenbox($name,$value){
            ?>
            <input type="hidden" value="<?php echo $value ?>" name="<?php echo $name ?>" />
    <?php
    }

}




