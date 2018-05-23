<?php
/**
 * Name : Heru Setyiawan
 * Date : 16-04-2017
 * Time : 10:22
 */

if(!function_exists('notif')){
    function notif($status, $msg)
    {
        $btn = '<button  type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        if($status == 'success' || $status == 'sukses') {
            $icon = '<i class="mdi mdi-checkbox-marked-circle-outline"></i> ';
            $alert =  '<p class="alert alert-success"> <strong>'.$icon.' Sukses!</strong>';
           
        }elseif($status == 'error' || $status == 'gagal') {
            $icon = '<i class="mdi mdi-close"></i> ';
            $alert = '<p class="alert alert-danger"> <strong>'.$icon.' Error!</strong>';
            
        }

        $msg = $alert.' '.$msg.' '.$btn."</p>";
        return session()->flash('notif', $msg);
    }
}

if(!function_exists('rupiah')){
    function rupiah($rp)
    {
    	return number_format($rp,0,',','.');
    }
}

function tanggal($tanggal)
{
    $arr_bln = ["Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember"];
    $cek_time = explode(' ',$tanggal);
    if($cek_time[0]){
        $bln = explode('-',$cek_time[0]);
    }else{
        $bln = explode('-',$tanggal);
    }
     return $bln[2].' '.$arr_bln[$bln[1]-1].' '.$bln[0];
    
}

function AutoNum($id_num, $char)
{
    if($id_num)
    {
        $arr = explode($char, $id_num);
       // $num = $arr[1]+1;
        $num = $arr[1]+1;
    }
    else
    {
        $num = 1;
    }
    return $char.sprintf('%05s', $num);
   
}

function loop_date($start, $end)
{
    $begin = new DateTime(strtolower($start));
    $end = new DateTime(strtolower($end));
    $end = $end->modify( '+1 day' ); 

    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($begin, $interval ,$end);
    foreach($daterange as $rs){
        $new_daterange[] = $rs->format('Y-m-d');
    }
    return $new_daterange;
}

function inverse_tanggal($tanggal)
{
    if($tanggal == NULL){
        return'-';
    }else{
        $arr = explode(' ', $tanggal);
        $date = explode('-',$arr[0]);
        if(isset($arr[1]))
        {
            return $date[2].'-'.$date[1].'-'.$date[0].' '.$arr[1];
        }
        else
        {
            return $date[2].'-'.$date[1].'-'.$date[0];
        }
    }
}

function random_password()
{
    $length = 8;
    $char = '0123456789';
    $randomPass = substr(str_shuffle($char), 0, $length);

    return $randomPass;
}

function randomString()
{
    $length = 10;
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomPass = substr(str_shuffle($char), 0, $length);

    return $randomPass;
}
