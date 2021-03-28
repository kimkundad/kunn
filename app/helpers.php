<?php

use Illuminate\Support\Facades\DB;

function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","January","February","March","April","May","June","July","August","September","October","November","December");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear ";
}

function setting(){

    $cat = DB::table('settings')
          ->where('id', 1)
          ->first();

    return $cat;
  }

  function himage(){

    $cat = DB::table('head_images')
          ->where('id', 1)
          ->first();

    return $cat;
  }