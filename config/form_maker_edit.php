<?php

///UPDATE FORM MAKER//////////////////////////////////////////

class edit {
    //update text
    function textbox($label,$name,$value){
            ?>
        <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                            <input type="text" class="form-control" value="<?php echo $value ?>" name="<?php echo $name ?>" />
                    </div>
            </div>
    <?php
    }

    //update email
    function emailbox($label,$name,$value){
            ?>
        <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                            <input type="email" value="<?php echo $value ?>" class="form-control" name="<?php echo $name ?>" />
                    </div>
            </div>
    <?php
    }

    //update date
    function datebox($label,$name,$type,$value){

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
                            <input type="text" value="<?php echo $value?>" name="<?php echo $name ?>" class="form-control datepicker" data-date-format="<?php echo $format ?>" placeholder="<?php echo $format ?>">
                    </div>
            </div>
    <?php
    }

    //uodate textarea
    function textarea($label,$name,$value){
            ?>
            <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                            <textarea name="<?php echo $name ?>" rows="5" class="form-control no-resize"><?php echo $value ?></textarea>
                    </div>
            </div>
    <?php
    }

    //update text area with limited text
    function textarea_limit($label,$name,$text_max,$value){

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
                            <textarea id="field" onkeyup="countChar(this)" name="<?php echo $name ?>" rows="5" maxlength="<?php echo $text_max ?>" class="form-control no-resize"><?php echo $value ?></textarea>
                            <div id="<?php echo $name ?>"></div>
                    </div>
            </div>
    <?php
    }

    //update combobox
    function combobox($label,$name,$query,$value,$option,$query_cari,$data,$dicari ){
            ?>
            <div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo $label ?></label>
                    <div class="col-lg-5">
                    <?php 
                    $qry = mysql_query($query) ;
                    $qry1 = mysql_query($query_cari);
                    $selected = "";
                    ?>
                            <select name="<?php echo $name ?>">
                                    <?php while ($kece = mysql_fetch_assoc($qry)) {
                                            while ($bgt = mysql_fetch_assoc($qry1)) {
                                                    if ($kece[$data] == $bgt[$dicari]) {
                                                            $selected = "selected";
                                                    }
                                            }
                                    ?>
                                    <option value="<?php echo $kece['$value']?>" <?php echo $selected ?>><?php echo $kece['$option'] ?></option>
                                    <?php
                                    } ?>										
                            </select>
                    </div>
            </div>
    <?php
    }

    //edit file gambar
    function file_gambar($folder_location,$gambar,$name,$bahasa){
            if ($bahasa=="") {
                    $output1 = "Gambar Lama";
                    $output2 = "Gantikan Gambar ?";
            }
            elseif ($bahasa == "english") {
                    $output1 = "Recent Image";
                    $output2 = "Replace Image ?";
            }
            elseif ($bahasa == "both") {
                    $output1 = "Gambar Lama / Recent Image";
                    $output2 = "Replace Image ? / Replace Image ?";
            }
            else{
                    $output1 = "Gambar Lama";
                    $output2 = "Gantikan Gambar ?";	
            }
            ?>
                    <div class="form-group">
                            <label class="col-lg-3 control-label"><?php echo $output1 ?></label>
                            <div class="col-lg-5">
                                    <img width="50%" height="50%" src="<?php echo $folder_location ?><?php echo $gambar ?>" alt="IMAGE">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-lg-3 control-label"> <?php echo $output2 ?></label>
                            <div class="col-lg-5">
                                    <div class="input-group">
                                    <input type="text" class="form-control" readonly>
                                    <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                    Browse&hellip; <input type="file" name="<?php echo $name ?>">
                                            </span>
                                    </span>
                            </div><!-- /.input-group -->
                            </div>
                    </div>
    <?php
    }
    
     //update hiden atau update hidden
    function hiddenbox($name,$value){
            ?>
            <input type="hidden" value="<?php echo $value ?>" name="<?php echo $name ?>" />
    <?php
    }
    
}

