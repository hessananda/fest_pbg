<?php

function warna($tipe) {
	if ($tipe=="1") {
		echo "label-success";
	}
	elseif ($tipe=="2") {
		echo "label-info";
	}
	elseif ($tipe=="5") {
		echo "label-warning";
	}
	elseif ($tipe=="12") {
		echo "label-danger";
	}
	else{
		echo "label-default";
	}

}

function tautan($tipe,$id) {
	if ($tipe=="1") {
		echo "news-detail.php?id=$id";
	}
	elseif ($tipe=="2") {
		echo "lokal-detail.php?id=$id";
	}
	elseif ($tipe=="5") {
		echo "review-detail.php?id=$id";
	}
	elseif ($tipe=="12") {
		echo "komunitas-detail.php?id=$id";
	}
	else{
		echo "#";
	}

}

function article_show($image,$title,$link){
?>
  <article class="widget-post clearfix">  
        <div class="simple-thumb">
          <a href="<?=$link?>">
            <img src="img/article/<?=$image?>" alt="">
          </a>
        </div>
        <header>
          <h3>
            <a href="<?=$link?>"><?=$title?></a>
          </h3>

        </header>
      </article>

<?php
}


?>