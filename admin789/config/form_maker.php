<?php 
//INPUT FORM MAKER /////////////////////////////////////////

//input text
function textbox($label,$name,$placeholder){
	?>
    <div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
			<input type="text" id="<?php echo $name ?>" placeholder="<?php echo $placeholder ?>" class="form-control" name="<?php echo $name ?>" />
		</div>
	</div>
<?php
}

//input file
function file_input($label,$name,$title){
	?>
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
		<div class="input-group">
			<input type="text" class="form-control" readonly title="<?php echo $title ?>" placeholder="<?php echo $title ?>">
			<span class="input-group-btn">
				<span class="btn btn-default btn-file">
					Browse&hellip; <input type="file" id="<?php echo $name ?>"  name="<?php echo $name ?>" title="<?php echo $title ?>">
				</span>
			</span>
			</div>
		</div>
	</div>
<?php
}

//input combobox
function combobox($label,$name,$query,$value,$option){
    global $con;
	?>
   	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
		<?php $qry = mysqli_query($con,$query) ?>
			<select name="<?php echo $name ?>">
				<?php while ($kece = mysqli_fetch_assoc($qry)) {
				?>
				<option  id="<?php echo $name ?>"  value="<?php echo $kece[$value]?>"><?php echo $kece[$option] ?></option>
				<?php
				} ?>										
			</select>
		</div>
	</div>
<?php
}

//input combobox with array
function combobox_array($label,$name,$option_in_array){
    global $con;
	?>
   	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">				

		<select id="<?php echo $name ?>"  name="<?php echo $name ?>">
		<?php
		
			foreach($option_in_array as $value => $text) {				
		?>
			<option value="<?php echo $value ?>"><?php echo $text ; ?></option>
		
		<?php
			}
		?>
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
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
			<input type="text" id="<?php echo $name ?>"  name="<?php echo $name ?>" class="form-control datepicker" data-date-format="<?php echo $format ?>" placeholder="<?php echo $format ?>">
		</div>
	</div>
<?php
}

function timebox($label,$name_hour,$name_minute){
?>
    <div class="form-group" id="<?php echo str_replace(' ', '_', $label).'_div' ?>" >
            <label class="col-lg-3 control-label"><?php echo $label ?></label>
            <div class="col-lg-5">

            <select name="<?php echo $name_hour ?>">
            <?php for ($j=1; $j <= 9 ; $j++) { ?>
                    <option value="0<?php echo $j ?>">0<?php echo $j ?></option>
            <?php	
            }								
            ?>

            <?php for ($j=10; $j <= 24 ; $j++) { ?>
                    <option value="<?php echo $j ?>"><?php echo $j ?></option>
            <?php	
            }								
            ?>

            </select>
            :
            <select name="<?php echo $name_minute ?>">
            <option value="00">00</option>
            <?php for ($m=15; $m <= 59 ; $m=$m+15) { ?>
                    <option value="<?php echo $m ?>"><?php echo $m ?></option>
            <?php	
            }								
            ?>
            </select>

            </div>
    </div>
<?php
}

//input textarea
function textarea($label,$name,$placeholder){
	?>
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5"> 
			<textarea id="<?php echo $name ?>"  placeholder="<?php echo $placeholder ?>" name="<?php echo $name ?>" rows="5" class="form-control no-resize"></textarea>
		</div>
	</div>
<?php
}

//input textarea
function textarea_summernote($label,$name,$placeholder){
	?>
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-7"> 
			<textarea placeholder="<?php echo $placeholder ?>" name="<?php echo $name ?>" class="summernote-lg"></textarea>
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

	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
			<textarea  id="<?php echo $name ?>" placeholder="<?php echo $placeholder ?>" onkeyup="countChar(this)" name="<?php echo $name ?>" rows="5" maxlength="<?php echo $text_max ?>" class="form-control no-resize"></textarea>
			<div id="<?php echo $name ?>"></div>
		</div>
	</div>
<?php
}

//input hiden atau update hidden
function hiddenbox($name,$value){
	?>
	<input type="hidden" id="<?php echo $name ?>"  value="<?php echo $value ?>" name="<?php echo $name ?>" />
<?php
}

//UPDATE FORM MAKER//////////////////////////////////////////

//update text
function textbox_update($label,$name,$value){
	?>
    <div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
			<input type="text" id="<?php echo $name ?>"  class="form-control" value="<?php echo $value ?>" name="<?php echo $name ?>" />
		</div>
	</div>
<?php
}

//update date
function datebox_update($label,$name,$type,$value){
 
	if ($type<>"") {
		$format = $type;
	}
	else{
		$format = "yyyy-mm-dd";
	}
	?>
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
			<input type="text" id="<?php echo $name ?>"  value="<?php echo $value?>" name="<?php echo $name ?>" class="form-control datepicker" data-date-format="<?php echo $format ?>" placeholder="<?php echo $format ?>">
		</div>
	</div>
<?php
}

function timebox_update($label,$name_hour,$name_minute,$query,$hour,$minute){
    global $con;
    $event_time = mysqli_fetch_assoc(mysqli_query($con,$query));
?>      
    <div class="form-group" id="<?php echo str_replace(" ", "_", $label).'_div' ?>" >
            <label class="col-lg-3 control-label"><?php echo $label ?></label>
            <div class="col-lg-5">

            <select name="<?php echo $name_hour ?>">
            <option value="<?php echo $event_time["$hour"] ?>"><?php echo $event_time["$hour"] ?></option>
            <?php for ($j=1; $j <= 9 ; $j++) { ?>
                    <option value="0<?php echo $j ?>">0<?php echo $j ?></option>
            <?php	
            }								
            ?>

            <?php for ($j=10; $j <= 24 ; $j++) { ?>
                    <option value="<?php echo $j ?>"><?php echo $j ?></option>
            <?php	
            }								
            ?>

            </select>
            :
            <select name="<?php echo $name_minute ?>">
            <?php 
                    if ($event_time["$minute"] <> 0) {
                            $event_minute = $event_time["$minute"];
                    }
                    else
                    {
                            $event_minute = '00';	
                    }
            ?>

            <option value="<?php echo $event_minute ?>"><?php echo $event_minute ?></option>
            <option value="00">00</option>
            <?php for ($m=15; $m <= 59 ; $m=$m+15) { ?>
                    <option value="<?php echo $m ?>"><?php echo $m ?></option>
            <?php	
            }								
            ?>
            </select>

            </div>
    </div>  
<?php        
}

//uodate textarea
function textarea_update($label,$name,$value){
	?>
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
			<textarea id="<?php echo $name ?>"  name="<?php echo $name ?>" rows="5" class="form-control no-resize"><?php echo $value ?></textarea>
		</div>
	</div>
<?php
}

//input textarea
function textarea_summernote_update($label,$name,$value){
	?>
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-7"> 
			<textarea  id="<?php echo $name ?>" name="<?php echo $name ?>" class="summernote-lg"><?php echo $value ?></textarea>
		</div>
	</div>
<?php
}

//update text area with limited text
function textarea_limit_update($label,$name,$text_max,$value){
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

	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
			<textarea  id="<?php echo $name ?>"  onkeyup="countChar(this)" name="<?php echo $name ?>" rows="5" maxlength="<?php echo $text_max ?>" class="form-control no-resize"><?php echo $value ?></textarea>
			<div id="<?php echo $name ?>"></div>
		</div>
	</div>
<?php
}

//update combobox
function combobox_update($label,$name,$query,$value,$option,$query_cari,$data,$dicari ){
    global $con;
    ?>
   	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">
		<?php 
		$qry = mysqli_query($con,$query) ;
		$qry1 = mysqli_query($con,$query_cari);
		$bgt = mysqli_fetch_assoc($qry1);
               
		?>
			<select  id="<?php echo $name ?>" name="<?php echo $name ?>">
				<?php while ($kece = mysqli_fetch_assoc($qry)) {
				?>
				<option value="<?php echo $kece[$value]?>" <?php echo ($kece[$data] == $bgt[$dicari])?'selected':'' ?>><?php echo $kece[$option] ?></option>
				<?php
				} ?>										
			</select>
		</div>
	</div>
<?php
}

//input combobox with array
function combobox_array_update($label,$name,$option_in_array,$original_value){
    global $con;
	?>
   	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">	

		<select  id="<?php echo $name ?>" name="<?php echo $name ?>">
		<?php
		
			foreach($option_in_array as $value => $text) {				
		?>
			<option <?php echo $value==$original_value?'selected':''; ?> value="<?php echo $value ?>"><?php echo $text ; ?></option>
		
		<?php
			}
		?>
		</select>

		</div>
	</div>
<?php
}


//edit radio button with array
function radio_array_update($label,$name,$option_in_array,$original_value){
?>
	<div class="form-group" id="<?php echo $name.'_div' ?>" >
		<label class="col-lg-3 control-label"><?php echo $label ?></label>
		<div class="col-lg-5">

		<?php
		
			foreach($option_in_array as $value => $text) {				
		?>
			<div class="radio">
				<label>
					<input id="<?php echo $name ?>"  <?php echo $value==$original_value?'checked':''; ?> type="radio" value="<?php echo $value ; ?>" required name="<?php echo $name ?>" /><?php echo $text ; ?></label>
			</div>
		<?php
			}

		?>

		</div>
	</div>

<?php
}

//edit file gambar
function file_gambar_update($folder_location,$gambar,$name,$bahasa){
	if ($bahasa="") {
		$output1 = "Gambar Lama";
		$output2 = "Gantikan Gambar ?";
	}
	elseif ($bahasa = "english") {
		$output1 = "Recent Image";
		$output2 = "Replace Image ?";
	}
	elseif ($bahasa = "both") {
		$output1 = "Gambar Lama / Recent Image";
		$output2 = "Replace Image ? / Replace Image ?";
	}
	else{
		$output1 = "Gambar Lama";
		$output2 = "Gantikan Gambar ?";	
	}

	?>
		<div class="form-group" id="<?php echo $name.'_div' ?>" >
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

//ACTION FORM MAKER

//upload semua jenis file tanpa batasan atau filtering
function upload_file($lokasi,$nama_file){
	
	global $nama_final;
	
	$loc=$_FILES["$nama_file"]['tmp_name'];
	$acak = rand(10000,99999);
	$nama = $_FILES["$nama_file"]['name'];
	$nama_final = $acak.$nama;
	$path="$lokasi"."/".$nama_final;
	$hai = move_uploaded_file($loc,$path);
	
}

function delete_file($column,$table,$lokasi,$primary,$id){
global $con;	
	$sqlfetchhapus = mysqli_fetch_assoc(mysqli_query($con,"SELECT $column from $table WHERE ".$primary." = '$id' "));	
	@ unlink("$lokasi/$sqlfetchhapus[$column]");
}

?>