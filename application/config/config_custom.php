<?php

$config['currency'] = '€';
$config['sizeunit'] = 'm<sup>2</sup>';
$config['salt'] = '$1$KPL2hzPq$TDXWtLG/xcs3wV90qKXSj.';

$config['rate']['loan'] = "0.023"; // 2.3 % p.a.
$config['rate']['agent'] = "0.030"; // because no VAT
$config['rate']['notary'] = "0.02";
$config['rate']['landregistry'] = "0.046";
$config['rate']['depreciation'] = "0.015";
$config['rate']['renttax'] = "0.10";
$config['rate']['profitetax'] = "0.25";
$config['rate']['paybacktimes'] = "1.33";
$config['rate']['paybackyears'] = "30";
$config['rate']['risk'] = "0.05";
$config['rate']['refurbishrate'] = "1";

// in case nothing is added
$config['rate']['overheads'] = "2";
$config['rate']['standardrent'] = "9";


// http://www.immopreise.at/

// monthly rent
// <= 50
$config['rent']['1010']['50'] = 21.7;
// 50-80
//$config['rent']['1010']['80'] = 19.0;
// 81-129
//$config['rent']['1010']['129'] = 18.4;
// >= 130
//$config['rent']['1010']['130'] = 19.6;
// AVG
$config['rent']['1010']['0'] = 19.3;
$config['buy']['1010']['0'] = 10970;

$config['rent']['1020']['50'] = 18.3;
$config['rent']['1020']['0'] = 14.9;
$config['buy']['1020']['0'] = 4403;

$config['rent']['1030']['50'] = 18.9;
$config['rent']['1030']['0'] = 16.0;
$config['buy']['1030']['0'] = 4797;

$config['rent']['1040']['50'] = 19.4;
$config['rent']['1040']['0'] = 16.8;
$config['buy']['1040']['0'] = 6642;

$config['rent']['1050']['50'] = 15.5;
$config['rent']['1050']['0'] = 14.4;
$config['buy']['1050']['0'] = 4237;

$config['rent']['1060']['50'] = 18.2;
$config['rent']['1060']['0'] = 15.5;
$config['buy']['1060']['0'] = 5106;

$config['rent']['1070']['50'] = 16.1;
$config['rent']['1070']['0'] = 15.0;
$config['buy']['1070']['0'] = 5020;

$config['rent']['1080']['50'] = 16.8;
$config['rent']['1080']['0'] = 15.1;
$config['buy']['1080']['0'] = 4885;

$config['rent']['1090']['50'] = 15.7;
$config['rent']['1090']['0'] = 14.7;
$config['buy']['1090']['0'] = 5826;

$config['rent']['1100']['50'] = 14.1;
$config['rent']['1100']['0'] = 12.5;
$config['buy']['1100']['0'] = 3753;

$config['rent']['1110']['50'] = 13.7;
$config['rent']['1110']['0'] = 12.4;
$config['buy']['1110']['0'] = 3158;

$config['rent']['1120']['50'] = 15.7;
$config['rent']['1120']['0'] = 14.5;
$config['buy']['1120']['0'] = 3931;

$config['rent']['1130']['50'] = 16.7;
$config['rent']['1130']['0'] = 15.0;
$config['buy']['1130']['0'] = 4753;

$config['rent']['1140']['50'] = 14.4;
$config['rent']['1140']['0'] = 13.1;
$config['buy']['1140']['0'] = 3947;

$config['rent']['1150']['50'] = 13.6;
$config['rent']['1150']['0'] = 13.1;
$config['buy']['1150']['0'] = 4071;

$config['rent']['1160']['50'] = 14.0;
$config['rent']['1160']['0'] = 12.9;
$config['buy']['1160']['0'] = 3610;

$config['rent']['1170']['50'] = 14.7;
$config['rent']['1170']['0'] = 13.5;
$config['buy']['1170']['0'] = 3922;

$config['rent']['1180']['50'] = 14.5;
$config['rent']['1180']['0'] = 14.4;
$config['buy']['1180']['0'] = 4980;

$config['rent']['1190']['50'] = 16.2;
$config['rent']['1190']['0'] = 15.3;
$config['buy']['1190']['0'] = 4703;

$config['rent']['1200']['50'] = 15.7;
$config['rent']['1200']['0'] = 13.4;
$config['buy']['1200']['0'] = 3916;

$config['rent']['1210']['50'] = 15.6;
$config['rent']['1210']['0'] = 13.7;
$config['buy']['1210']['0'] = 4327;

$config['rent']['1220']['50'] = 18.2;
$config['rent']['1220']['0'] = 16.2;
$config['buy']['1220']['0'] = 4398;

$config['rent']['1230']['50'] = 14.8;
$config['rent']['1230']['0'] = 13.9;
$config['buy']['1230']['0'] = 4198;

$config['rent']['2340']['50'] = 12.6;
$config['rent']['2340']['0'] = 12.6;
$config['buy']['2340']['0'] = 3615;

//http://immi.at/Immobilienpreise/Baden?bc=306
$config['rent']['2500']['50'] = 11.4;
$config['rent']['2500']['0'] = 11.4;
$config['buy']['2500']['0'] = 3188;



