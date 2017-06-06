<?php

function hesa_date($event_start_date,$event_finish_date){

	$tanggal_m = intval(substr($event_start_date,8,2));
	$bulan_m = substr($event_start_date,5,2);
	$tahun_m = substr($event_start_date,0,4);

	$tanggal_s = intval(substr($event_finish_date,8,2));
	$bulan_s = substr($event_finish_date,5,2);
	$tahun_s = substr($event_finish_date,0,4);

	if ($tanggal_m <> $tanggal_s AND $bulan_m == $bulan_s AND $tahun_m == $tahun_s) {
		echo $tanggal_m." - ".$tanggal_s." ".getBulan($bulan_s)." ".$tahun_s ;
	}
	elseif ($bulan_m <> $bulan_s AND $tahun_m == $tahun_s) {
		echo $tanggal_m." ".getBulan($bulan_m)." - ".$tanggal_s." ".getBulan($bulan_s)." ".$tahun_s ;	
	}
	elseif ($tahun_m <> $tahun_s) {
		echo tgl_indo($event_start_date)." - ".tgl_indo($event_finish_date);
	}
	elseif ($event_start_date == $event_finish_date) {
		echo tgl_indo($event_start_date);
	}

}

function hesa_date_singkat($event_start_date,$event_finish_date){

	$tanggal_m = intval(substr($event_start_date,8,2));
	$bulan_m = substr($event_start_date,5,2);
	$tahun_m = substr($event_start_date,0,4);

	$tanggal_s = intval(substr($event_finish_date,8,2));
	$bulan_s = substr($event_finish_date,5,2);
	$tahun_s = substr($event_finish_date,0,4);

	if ($tanggal_m <> $tanggal_s AND $bulan_m == $bulan_s AND $tahun_m == $tahun_s) {
		echo $tanggal_m." - ".$tanggal_s." ".getBulanSingkat($bulan_s)." ".$tahun_s ;
	}
	elseif ($bulan_m <> $bulan_s AND $tahun_m == $tahun_s) {
		echo $tanggal_m." ".getBulanSingkat($bulan_m)." - ".$tanggal_s." ".getBulanSingkat($bulan_s)." ".$tahun_s ;	
	}
	elseif ($tahun_m <> $tahun_s) {
		echo tgl_indo_singkat($event_start_date)." - ".tgl_indo_singkat($event_finish_date);
	}
	elseif ($event_start_date == $event_finish_date) {
		echo tgl_indo($event_start_date);
	}

}

?>