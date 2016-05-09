<?php 
	require 'database.php';
	$vanid = null;
	if ( !empty($_GET['VANID'])) {
		$vanid = $_REQUEST['VANID'];
	}
	
	if ( null==$vanid ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM voters where VANID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($vanid));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;margin: 12px 0px 30px 23px;padding: 0px;border: none;width: 793px;}
#page_1 #id_1 {border:none;margin: 0px 0px 0px 13px;padding: 0px;border:none;width: 780px;overflow: hidden;}
#page_1 #id_2 {border:none;margin: 0px 0px 0px 12px;padding: 0px;border:none;width: 781px;overflow: hidden;}

#page_1 #dimg1 {position:absolute;top:45px;left:0px;z-index:-1;width:771px;height:966px;}
#page_1 #dimg1 #img1 {width:771px;height:966px;}




#page_2 {position:relative; overflow: hidden;margin: 0px 0px 0px 24px;padding: 0px;border: none;width: 1032px;}
#page_2 #id_1 {float:left;border:none;margin: 12px 0px 0px 0px;padding: 0px;border:none;width: 340px;overflow: hidden;}
#page_2 #id_2 {float:left;border:none;margin: 1px 0px 0px 0px;padding: 0px;border:none;width: 339px;overflow: hidden;}
#page_2 #id_3 {float:left;border:none;margin: 107px 0px 0px 59px;padding: 0px;border:none;width: 294px;overflow: hidden;}

#page_2 #dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:1032px;height:816px;}
#page_2 #dimg1 #img1 {width:1032px;height:816px;}




.dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

.ft0{font: bold 32px 'Arial';color: #002285;line-height: 37px;}
.ft1{font: bold 22px 'Arial';color: #002285;line-height: 26px;}
.ft2{font: 1px 'Arial';line-height: 1px;}
.ft3{font: italic bold 8px 'Arial';color: #fa1721;line-height: 10px;}
.ft4{font: italic bold 13px 'Arial';color: #002285;line-height: 16px;}
.ft5{font: bold 17px 'Arial';color: #002285;line-height: 19px;}
.ft6{font: 12px 'Arial';color: #002285;line-height: 13px;}
.ft7{font: 1px 'Arial';line-height: 12px;}
.ft8{font: bold 11px 'Arial';color: #002285;line-height: 12px;}
.ft9{font: 12px 'Arial';color: #002285;line-height: 12px;}
.ft10{font: bold 27px 'Arial';color: #ffffff;line-height: 32px;}
.ft11{font: bold 8px 'Arial';color: #002285;line-height: 9px;}
.ft12{font: 1px 'Arial';line-height: 9px;}
.ft13{font: 9px 'Wingdings';color: #002285;line-height: 10px;}
.ft14{font: 9px 'Arial';color: #002285;line-height: 12px;}
.ft15{font: 1px 'Arial';line-height: 7px;}
.ft16{font: 13px 'Wingdings';color: #002285;line-height: 15px;}
.ft17{font: 13px 'Arial';color: #002285;line-height: 16px;}
.ft18{font: 10px 'Arial';color: #002285;line-height: 12px;}
.ft19{font: 1px 'Arial';line-height: 10px;}
.ft20{font: 11px 'Wingdings';color: #002285;line-height: 12px;}
.ft21{font: 11px 'Arial';color: #002285;line-height: 14px;}
.ft22{font: 11px 'Arial';color: #ffffff;line-height: 14px;}
.ft23{font: 15px 'Arial';color: #002285;line-height: 15px;}
.ft24{font: 1px 'Arial';line-height: 6px;}
.ft25{font: 1px 'Arial';line-height: 5px;}
.ft26{font: 12px 'Arial';color: #002285;line-height: 15px;position: relative; bottom: -4px;}
.ft27{font: 6px 'Arial';color: #002285;line-height: 6px;}
.ft28{font: 12px 'Arial';color: #002285;line-height: 15px;}
.ft29{font: 1px 'Arial';line-height: 3px;}
.ft30{font: bold 12px 'Arial';color: #002285;line-height: 14px;}
.ft31{font: 1px 'Arial';line-height: 11px;}
.ft32{font: bold 12px 'Arial';color: #002285;line-height: 15px;}
.ft33{font: italic 9px 'Arial';color: #002285;line-height: 12px;}
.ft34{font: 1px 'Arial';line-height: 4px;}
.ft35{font: 1px 'Arial';line-height: 8px;}
.ft36{font: italic 9px 'Arial';color: #002285;line-height: 11px;}
.ft37{font: 8px 'Arial';color: #002285;line-height: 10px;position: relative; bottom: 3px;}
.ft38{font: italic 8px 'Arial';color: #002285;line-height: 11px;}
.ft39{font: bold 19px 'Arial';color: #002285;line-height: 22px;}
.ft40{font: 13px 'Arial';color: #002285;line-height: 13px;}
.ft41{font: bold 31px 'Arial';color: #fa1721;line-height: 36px;}
.ft42{font: bold 20px 'Arial';color: #002285;line-height: 24px;}
.ft43{font: bold 16px 'Arial';color: #ffffff;line-height: 19px;}
.ft44{font: italic bold 12px 'Arial';color: #002285;line-height: 15px;}
.ft45{font: italic 12px 'Arial';color: #002285;line-height: 15px;}
.ft46{font: bold 27px 'Arial';color: #ffffff;line-height: 25px;}
.ft47{font: bold 19px 'Arial';color: #fa1721;line-height: 22px;}
.ft48{font: bold 13px 'Arial';color: #002285;line-height: 16px;}
.ft49{font: bold 8px 'Arial';color: #fa1721;line-height: 10px;}
.ft50{font: italic 13px 'Arial';color: #002285;line-height: 16px;}
.ft51{font: bold 22px 'Arial';color: #ffffff;line-height: 26px;}
.ft52{font: 6px 'Arial';color: #002285;line-height: 6px;position: relative; bottom: 5px;}
.ft53{font: bold 16px 'Arial';color: #fa1721;line-height: 19px;}
.ft54{font: 15px 'Arial';color: #002285;line-height: 17px;}
.ft55{font: bold 15px 'Arial';color: #002285;line-height: 18px;}
.ft56{font: bold 15px 'Arial';color: #ffffff;line-height: 18px;}
.ft57{font: bold 26px 'Arial';color: #ffffff;line-height: 30px;}
.ft58{font: bold 21px 'Arial';color: #fa1721;line-height: 24px;position: relative; bottom: -3px;}
.ft59{font: bold 14px 'Arial';color: #ffffff;line-height: 16px;}
.ft60{font: italic bold 15px 'Arial';color: #002285;line-height: 17px;}
.ft61{font: 1px 'Arial';line-height: 13px;}
.ft62{font: italic 5px 'Arial Narrow';color: #002285;line-height: 6px;}
.ft63{font: bold 13px 'Arial';color: #fa1721;line-height: 16px;}
.ft64{font: bold 11px 'Arial';color: #002285;line-height: 14px;}
.ft65{font: 11px 'Arial';color: #002285;margin-left: 3px;line-height: 14px;}
.ft66{font: bold 11px 'Arial';color: #002285;margin-left: 3px;line-height: 14px;}
.ft67{font: italic 11px 'Arial';color: #ffffff;line-height: 14px;}
.ft68{font: bold 13px 'Arial';color: #002285;line-height: 16px;position: relative; bottom: -3px;}
.ft69{font: italic 9px 'Arial';color: #ffffff;line-height: 12px;}
.ft70{font: bold 11px 'Arial';color: #002285;line-height: 13px;}
.ft71{font: bold 15px 'Arial';color: #fa1721;line-height: 18px;}
.ft72{font: 11px 'Arial';color: #002285;margin-left: 4px;line-height: 19px;}
.ft73{font: 11px 'Arial';color: #002285;line-height: 19px;}
.ft74{font: 11px 'Arial';color: #002285;margin-left: 4px;line-height: 17px;}
.ft75{font: 11px 'Arial';color: #002285;line-height: 17px;}
.ft76{font: 11px 'Arial';color: #002285;margin-left: 4px;line-height: 18px;}
.ft77{font: 11px 'Arial';color: #002285;line-height: 18px;}
.ft78{font: 11px 'Arial';color: #002285;margin-left: 2px;line-height: 14px;}
.ft79{font: 11px 'Arial';color: #002285;margin-left: 4px;line-height: 20px;}
.ft80{font: bold 11px 'Arial';color: #002285;line-height: 20px;}
.ft81{font: 11px 'Arial';color: #002285;line-height: 20px;}
.ft82{font: italic bold 11px 'Arial';color: #ffffff;line-height: 18px;}
.ft83{font: 8px 'Arial';color: #002285;line-height: 10px;}
.ft84{font: bold 25px 'Arial';color: #fa1721;line-height: 30px;}
.ft85{font: bold 21px 'Arial';color: #fa1721;line-height: 24px;}
.ft86{font: 13px 'Arial';color: #002285;line-height: 11px;}
.ft87{font: bold 40px 'Arial';color: #fa1721;line-height: 46px;}
.ft88{font: bold 28px 'Arial';color: #002285;line-height: 33px;}
.ft89{font: bold 28px 'Arial';color: #fa1721;line-height: 33px;}
.ft90{font: bold 40px 'Arial';color: #fa1721;line-height: 49px;}
.ft91{font: bold 28px 'Arial';color: #002285;line-height: 36px;}
.ft92{font: bold 28px 'Arial';color: #fa1721;line-height: 36px;}

.p0{text-align: left;padding-left: 84px;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p2{text-align: left;padding-left: 10px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p3{text-align: left;padding-left: 31px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p4{text-align: left;padding-left: 5px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p5{text-align: left;padding-left: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p6{text-align: right;padding-right: 5px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p7{text-align: left;padding-left: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p8{text-align: left;padding-left: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p9{text-align: right;padding-right: 24px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 39px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p11{text-align: right;padding-right: 35px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p12{text-align: left;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p13{text-align: left;padding-left: 6px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p14{text-align: center;padding-right: 72px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p15{text-align: center;padding-right: 73px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p16{text-align: right;padding-right: 11px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p17{text-align: center;padding-right: 24px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p18{text-align: center;padding-right: 9px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p19{text-align: right;padding-right: 10px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p20{text-align: right;padding-right: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p21{text-align: right;padding-right: 37px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p22{text-align: right;padding-right: 52px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p23{text-align: right;padding-right: 84px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p24{text-align: left;padding-left: 27px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p25{text-align: right;padding-right: 13px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p26{text-align: right;padding-right: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p27{text-align: right;padding-right: 70px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p28{text-align: left;padding-left: 85px;margin-top: 4px;margin-bottom: 0px;}
.p29{text-align: left;padding-left: 36px;margin-top: 2px;margin-bottom: 0px;}
.p30{text-align: left;padding-left: 36px;padding-right: 84px;margin-top: 4px;margin-bottom: 0px;}
.p31{text-align: left;padding-left: 36px;padding-right: 43px;margin-top: 0px;margin-bottom: 0px;text-indent: -34px;}
.p32{text-align: left;padding-left: 36px;margin-top: 0px;margin-bottom: 0px;}
.p33{text-align: left;padding-left: 49px;margin-top: 10px;margin-bottom: 0px;}
.p34{text-align: left;padding-left: 49px;margin-top: 3px;margin-bottom: 0px;}
.p35{text-align: right;padding-right: 6px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p36{text-align: right;padding-right: 49px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p37{text-align: right;padding-right: 18px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p38{text-align: left;padding-left: 49px;margin-top: 0px;margin-bottom: 0px;}
.p39{text-align: justify;padding-left: 49px;padding-right: 41px;margin-top: 1px;margin-bottom: 0px;}
.p40{text-align: left;padding-left: 68px;margin-top: 0px;margin-bottom: 0px;}
.p41{text-align: left;padding-left: 47px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p42{text-align: right;padding-right: 20px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p43{text-align: right;padding-right: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p44{text-align: right;padding-right: 33px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p45{text-align: left;padding-left: 19px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p46{text-align: right;padding-right: 21px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p47{text-align: right;padding-right: 31px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p48{text-align: left;padding-left: 25px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p49{text-align: center;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p50{text-align: center;padding-right: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p51{text-align: right;padding-right: 28px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p52{text-align: right;padding-right: 30px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p53{text-align: right;padding-right: 19px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p54{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p55{text-align: justify;padding-left: 12px;margin-top: 7px;margin-bottom: 0px;}
.p56{text-align: justify;padding-left: 12px;margin-top: 2px;margin-bottom: 0px;}
.p57{text-align: justify;padding-left: 21px;margin-top: 4px;margin-bottom: 0px;}
.p58{text-align: left;padding-left: 24px;margin-top: 0px;margin-bottom: 0px;}
.p59{text-align: left;padding-left: 27px;margin-top: 0px;margin-bottom: 0px;}
.p60{text-align: left;padding-left: 55px;margin-top: 0px;margin-bottom: 0px;}
.p61{text-align: left;margin-top: 7px;margin-bottom: 0px;}
.p62{text-align: justify;padding-left: 16px;padding-right: 34px;margin-top: 8px;margin-bottom: 0px;text-indent: -16px;}
.p63{text-align: justify;padding-left: 16px;padding-right: 31px;margin-top: 0px;margin-bottom: 0px;text-indent: -16px;}
.p64{text-align: justify;margin-top: 0px;margin-bottom: 0px;}
.p65{text-align: justify;padding-left: 16px;padding-right: 34px;margin-top: 0px;margin-bottom: 0px;text-indent: -16px;}
.p66{text-align: left;margin-top: 19px;margin-bottom: 0px;}
.p67{text-align: justify;padding-right: 34px;margin-top: 8px;margin-bottom: 0px;text-indent: 11px;}
.p68{text-align: justify;padding-right: 34px;margin-top: 0px;margin-bottom: 0px;text-indent: 14px;}
.p69{text-align: left;padding-left: 10px;margin-top: 0px;margin-bottom: 0px;}
.p70{text-align: justify;padding-right: 34px;margin-top: 0px;margin-bottom: 0px;}
.p71{text-align: left;padding-left: 106px;margin-top: 43px;margin-bottom: 0px;}
.p72{text-align: justify;padding-left: 12px;padding-right: 58px;margin-top: 18px;margin-bottom: 0px;}
.p73{text-align: left;margin-top: 0px;margin-bottom: 0px;-webkit-transform: rotate(270deg);-moz-transform: rotate(270deg);filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);direction: rtl;block-progression: lr;width:62px;height:78px;}
.p74{text-align: left;margin-top: 0px;margin-bottom: 0px;-webkit-transform: rotate(270deg);-moz-transform: rotate(270deg);filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);direction: rtl;block-progression: lr;width:102px;height:30px;}
.p75{text-align: left;margin-top: 0px;margin-bottom: 0px;-webkit-transform: rotate(270deg);-moz-transform: rotate(270deg);filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);direction: rtl;block-progression: lr;width:352px;height:24px;}
.p76{text-align: left;margin-top: 0px;margin-bottom: 0px;-webkit-transform: rotate(270deg);-moz-transform: rotate(270deg);filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);direction: rtl;block-progression: lr;width:275px;height:91px;}
.p77{text-align: left;padding-left: 7px;margin-top: 0px;margin-bottom: 0px;}
.p78{text-align: center;padding-right: 56px;margin-top: 3px;margin-bottom: 0px;}
.p79{text-align: left;padding-left: 1px;margin-top: 489px;margin-bottom: 0px;}

.td0{border-left: #002285 1px solid;border-right: #002285 1px solid;border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 28px;vertical-align: bottom;}
.td1{border-top: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 5px;vertical-align: bottom;}
.td2{border-top: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 365px;vertical-align: bottom;}
.td3{border-top: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
.td4{border-right: #002285 1px solid;border-top: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
.td5{border-top: #002285 1px solid;border-bottom: #e2e1ee 1px solid;padding: 0px;margin: 0px;width: 15px;vertical-align: bottom;background: #e2e1ee;}
.td6{border-top: #002285 1px solid;border-bottom: #e2e1ee 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;background: #e2e1ee;}
.td7{border-right: #002285 1px solid;border-top: #002285 1px solid;border-bottom: #e2e1ee 1px solid;padding: 0px;margin: 0px;width: 306px;vertical-align: bottom;background: #e2e1ee;}
.td8{border-left: #002285 1px solid;border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 28px;vertical-align: bottom;}
.td9{padding: 0px;margin: 0px;width: 370px;vertical-align: bottom;}
.td10{padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
.td11{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
.td12{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 328px;vertical-align: bottom;background: #e2e1ee;}
.td13{padding: 0px;margin: 0px;width: 95px;vertical-align: bottom;}
.td14{padding: 0px;margin: 0px;width: 65px;vertical-align: bottom;}
.td15{padding: 0px;margin: 0px;width: 11px;vertical-align: bottom;}
.td16{padding: 0px;margin: 0px;width: 23px;vertical-align: bottom;}
.td17{padding: 0px;margin: 0px;width: 37px;vertical-align: bottom;}
.td18{padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
.td19{padding: 0px;margin: 0px;width: 85px;vertical-align: bottom;}
.td20{padding: 0px;margin: 0px;width: 19px;vertical-align: bottom;}
.td21{padding: 0px;margin: 0px;width: 18px;vertical-align: bottom;}
.td22{padding: 0px;margin: 0px;width: 3px;vertical-align: bottom;}
.td23{padding: 0px;margin: 0px;width: 5px;vertical-align: bottom;}
.td24{padding: 0px;margin: 0px;width: 189px;vertical-align: bottom;}
.td25{padding: 0px;margin: 0px;width: 184px;vertical-align: bottom;}
.td26{padding: 0px;margin: 0px;width: 15px;vertical-align: bottom;background: #e2e1ee;}
.td27{border-right: #e2e1ee 1px solid;padding: 0px;margin: 0px;width: 196px;vertical-align: bottom;background: #e2e1ee;}
.td28{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 116px;vertical-align: bottom;background: #e2e1ee;}
.td29{padding: 0px;margin: 0px;width: 155px;vertical-align: bottom;}
.td30{padding: 0px;margin: 0px;width: 68px;vertical-align: bottom;}
.td31{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 91px;vertical-align: bottom;}
.td32{border-right: #002285 1px solid;border-bottom: #e2e1ee 1px solid;padding: 0px;margin: 0px;width: 328px;vertical-align: bottom;background: #e2e1ee;}
.td33{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 19px;vertical-align: bottom;}
.td34{padding: 0px;margin: 0px;width: 49px;vertical-align: bottom;}
.td35{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 41px;vertical-align: bottom;}
.td36{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 65px;vertical-align: bottom;}
.td37{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 11px;vertical-align: bottom;}
.td38{padding: 0px;margin: 0px;width: 125px;vertical-align: bottom;}
.td39{border-right: #002285 1px solid;border-top: #e2e1ee 1px solid;border-bottom: #e2e1ee 1px solid;padding: 0px;margin: 0px;width: 328px;vertical-align: bottom;background: #e2e1ee;}
.td40{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 160px;vertical-align: bottom;}
.td41{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 23px;vertical-align: bottom;}
.td42{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 37px;vertical-align: bottom;}
.td43{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
.td44{border-right: #002285 1px solid;border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 5px;vertical-align: bottom;}
.td45{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 125px;vertical-align: bottom;}
.td46{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
.td47{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 15px;vertical-align: bottom;}
.td48{border-right: #002285 1px solid;border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 35px;vertical-align: bottom;}
.td49{border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 3px;vertical-align: bottom;}
.td50{border-right: #002285 1px solid;border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 150px;vertical-align: bottom;}
.td51{border-right: #002285 1px solid;border-top: #002285 1px solid;padding: 0px;margin: 0px;width: 116px;vertical-align: bottom;}
.td52{border-left: #002285 1px solid;border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 28px;vertical-align: bottom;}
.td53{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 5px;vertical-align: bottom;}
.td54{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 49px;vertical-align: bottom;}
.td55{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 117px;vertical-align: bottom;}
.td56{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 60px;vertical-align: bottom;}
.td57{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 13px;vertical-align: bottom;}
.td58{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 85px;vertical-align: bottom;}
.td59{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 18px;vertical-align: bottom;}
.td60{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 3px;vertical-align: bottom;}
.td61{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
.td62{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 22px;vertical-align: bottom;}
.td63{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
.td64{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 35px;vertical-align: bottom;}
.td65{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 64px;vertical-align: bottom;}
.td66{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 41px;vertical-align: bottom;}
.td67{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 45px;vertical-align: bottom;}
.td68{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 116px;vertical-align: bottom;}
.td69{padding: 0px;margin: 0px;width: 325px;vertical-align: bottom;}
.td70{padding: 0px;margin: 0px;width: 19px;vertical-align: bottom;background: #002285;}
.td71{padding: 0px;margin: 0px;width: 18px;vertical-align: bottom;background: #002285;}
.td72{padding: 0px;margin: 0px;width: 132px;vertical-align: bottom;}
.td73{padding: 0px;margin: 0px;width: 41px;vertical-align: bottom;}
.td74{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 162px;vertical-align: bottom;}
.td75{padding: 0px;margin: 0px;width: 99px;vertical-align: bottom;}
.td76{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;}
.td77{padding: 0px;margin: 0px;width: 37px;vertical-align: bottom;background: #002285;}
.td78{padding: 0px;margin: 0px;width: 140px;vertical-align: bottom;}
.td79{padding: 0px;margin: 0px;width: 46px;vertical-align: bottom;}
.td80{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 116px;vertical-align: bottom;}
.td81{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 37px;vertical-align: bottom;background: #002285;}
.td82{padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
.td83{padding: 0px;margin: 0px;width: 61px;vertical-align: bottom;}
.td84{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 46px;vertical-align: bottom;}
.td85{padding: 0px;margin: 0px;width: 64px;vertical-align: bottom;}
.td86{padding: 0px;margin: 0px;width: 76px;vertical-align: bottom;}
.td87{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 65px;vertical-align: bottom;}
.td88{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 11px;vertical-align: bottom;}
.td89{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 23px;vertical-align: bottom;}
.td90{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;}
.td91{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
.td92{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 22px;vertical-align: bottom;}
.td93{padding: 0px;margin: 0px;width: 45px;vertical-align: bottom;}
.td94{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 5px;vertical-align: bottom;}
.td95{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 19px;vertical-align: bottom;background: #002285;}
.td96{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 18px;vertical-align: bottom;background: #002285;}
.td97{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 50px;vertical-align: bottom;}
.td98{padding: 0px;margin: 0px;width: 15px;vertical-align: bottom;}
.td99{padding: 0px;margin: 0px;width: 39px;vertical-align: bottom;}
.td100{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 105px;vertical-align: bottom;}
.td101{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 22px;vertical-align: bottom;}
.td102{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 37px;vertical-align: bottom;}
.td103{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 5px;vertical-align: bottom;}
.td104{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 15px;vertical-align: bottom;}
.td105{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;}
.td106{padding: 0px;margin: 0px;width: 90px;vertical-align: bottom;}
.td107{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 33px;vertical-align: bottom;background: #002285;}
.td108{padding: 0px;margin: 0px;width: 176px;vertical-align: bottom;}
.td109{padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;background: #002285;}
.td110{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 22px;vertical-align: bottom;background: #002285;}
.td111{padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;background: #002285;}
.td112{padding: 0px;margin: 0px;width: 144px;vertical-align: bottom;}
.td113{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 95px;vertical-align: bottom;}
.td114{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;background: #002285;}
.td115{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;background: #002285;}
.td116{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 90px;vertical-align: bottom;}
.td117{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 414px;vertical-align: bottom;}
.td118{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 41px;vertical-align: bottom;background: #002285;}
.td119{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 414px;vertical-align: bottom;}
.td120{padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;}
.td121{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 288px;vertical-align: bottom;}
.td122{padding: 0px;margin: 0px;width: 251px;vertical-align: bottom;}
.td123{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
.td124{padding: 0px;margin: 0px;width: 47px;vertical-align: bottom;}
.td125{padding: 0px;margin: 0px;width: 69px;vertical-align: bottom;}
.td126{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 288px;vertical-align: bottom;}
.td127{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 79px;vertical-align: bottom;}
.td128{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 172px;vertical-align: bottom;}
.td129{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
.td130{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 47px;vertical-align: bottom;}
.td131{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 69px;vertical-align: bottom;}
.td132{padding: 0px;margin: 0px;width: 29px;vertical-align: bottom;}
.td133{padding: 0px;margin: 0px;width: 289px;vertical-align: bottom;}
.td134{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 35px;vertical-align: bottom;}
.td135{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 42px;vertical-align: bottom;}
.td136{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 171px;vertical-align: bottom;}
.td137{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
.td138{padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
.td139{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 29px;vertical-align: bottom;}
.td140{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 289px;vertical-align: bottom;}
.td141{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 42px;vertical-align: bottom;}
.td142{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 171px;vertical-align: bottom;}
.td143{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 39px;vertical-align: bottom;}
.td144{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
.td145{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
.td146{padding: 0px;margin: 0px;width: 203px;vertical-align: bottom;}
.td147{padding: 0px;margin: 0px;width: 262px;vertical-align: bottom;}
.td148{padding: 0px;margin: 0px;width: 50px;vertical-align: bottom;}
.td149{padding: 0px;margin: 0px;width: 84px;vertical-align: bottom;}
.td150{padding: 0px;margin: 0px;width: 66px;vertical-align: bottom;}
.td151{padding: 0px;margin: 0px;width: 172px;vertical-align: bottom;}
.td152{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 2px;vertical-align: bottom;}
.td153{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 40px;vertical-align: bottom;}
.td154{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 92px;vertical-align: bottom;}
.td155{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 154px;vertical-align: bottom;}
.td156{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 1px;vertical-align: bottom;}
.td157{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 58px;vertical-align: bottom;}
.td158{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 13px;vertical-align: bottom;}
.td159{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 31px;vertical-align: bottom;}
.td160{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 57px;vertical-align: bottom;}
.td161{padding: 0px;margin: 0px;width: 134px;vertical-align: bottom;}
.td162{padding: 0px;margin: 0px;width: 1px;vertical-align: bottom;}
.td163{padding: 0px;margin: 0px;width: 58px;vertical-align: bottom;}
.td164{padding: 0px;margin: 0px;width: 13px;vertical-align: bottom;}
.td165{padding: 0px;margin: 0px;width: 31px;vertical-align: bottom;}
.td166{padding: 0px;margin: 0px;width: 81px;vertical-align: bottom;}
.td167{padding: 0px;margin: 0px;width: 57px;vertical-align: bottom;}
.td168{padding: 0px;margin: 0px;width: 2px;vertical-align: bottom;}
.td169{padding: 0px;margin: 0px;width: 40px;vertical-align: bottom;}
.td170{padding: 0px;margin: 0px;width: 341px;vertical-align: bottom;}
.td171{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 81px;vertical-align: bottom;}
.td172{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 12px;vertical-align: bottom;}
.td173{padding: 0px;margin: 0px;width: 164px;vertical-align: bottom;}
.td174{padding: 0px;margin: 0px;width: 92px;vertical-align: bottom;}
.td175{padding: 0px;margin: 0px;width: 154px;vertical-align: bottom;}
.td176{padding: 0px;margin: 0px;width: 299px;vertical-align: bottom;}
.td177{padding: 0px;margin: 0px;width: 381px;vertical-align: bottom;}
.td178{padding: 0px;margin: 0px;width: 305px;vertical-align: bottom;}
.td179{padding: 0px;margin: 0px;width: 286px;vertical-align: bottom;}
.td180{padding: 0px;margin: 0px;width: 174px;vertical-align: bottom;}
.td181{padding: 0px;margin: 0px;width: 1px;vertical-align: bottom;background: #002285;}
.td182{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 1px;vertical-align: bottom;background: #002285;}
.td183{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 12px;vertical-align: bottom;}
.td184{padding: 0px;margin: 0px;width: 17px;vertical-align: bottom;}
.td185{padding: 0px;margin: 0px;width: 83px;vertical-align: bottom;}
.td186{padding: 0px;margin: 0px;width: 21px;vertical-align: bottom;}
.td187{padding: 0px;margin: 0px;width: 16px;vertical-align: bottom;}
.td188{padding: 0px;margin: 0px;width: 32px;vertical-align: bottom;}
.td189{padding: 0px;margin: 0px;width: 44px;vertical-align: bottom;}
.td190{padding: 0px;margin: 0px;width: 110px;vertical-align: bottom;}
.td191{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 83px;vertical-align: bottom;}
.td192{border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 16px;vertical-align: bottom;background: #002285;}
.td193{border-right: #002285 1px solid;padding: 0px;margin: 0px;width: 16px;vertical-align: bottom;}
.td194{border-right: #002285 1px solid;border-bottom: #002285 1px solid;padding: 0px;margin: 0px;width: 82px;vertical-align: bottom;}
.td195{padding: 0px;margin: 0px;width: 16px;vertical-align: bottom;background: #002285;}
.td196{padding: 0px;margin: 0px;width: 100px;vertical-align: bottom;}

.tr0{height: 25px;}
.tr1{height: 24px;}
.tr2{height: 13px;}
.tr3{height: 12px;}
.tr4{height: 38px;}
.tr5{height: 9px;}
.tr6{height: 16px;}
.tr7{height: 7px;}
.tr8{height: 19px;}
.tr9{height: 10px;}
.tr10{height: 15px;}
.tr11{height: 6px;}
.tr12{height: 5px;}
.tr13{height: 14px;}
.tr14{height: 37px;}
.tr15{height: 3px;}
.tr16{height: 30px;}
.tr17{height: 11px;}
.tr18{height: 18px;}
.tr19{height: 36px;}
.tr20{height: 4px;}
.tr21{height: 8px;}
.tr22{height: 58px;}
.tr23{height: 57px;}
.tr24{height: 44px;}
.tr25{height: 46px;}
.tr26{height: 22px;}
.tr27{height: 21px;}
.tr28{height: 17px;}
.tr29{height: 20px;}
.tr30{height: 45px;}
.tr31{height: 35px;}
.tr32{height: 34px;}
.tr33{height: 27px;}
.tr34{height: 28px;}
.tr35{height: 23px;}
.tr36{height: 82px;}
.tr37{height: 81px;}
.tr38{height: 102px;}
.tr39{height: 352px;}
.tr40{height: 275px;}
.tr41{height: 240px;}
.tr42{height: 48px;}

.t0{width: 743px;margin-top: 3px;font: 12px 'Arial';color: #002285;}
.t1{width: 742px;margin-left: 2px;font: 12px 'Arial';color: #002285;}
.t2{width: 665px;margin-left: 49px;font: 12px 'Arial';color: #002285;}
.t3{width: 744px;font: 12px 'Arial';color: #002285;}
.t4{width: 339px;font: 8px 'Arial';color: #002285;}

</STYLE>
</HEAD>

<BODY>
<DIV id="page_1">
<DIV id="dimg1">
<IMG src="vote-mail-ballot-012712_images/vote-mail-ballot-0127121x1.jpg" id="img1">
</DIV>


<DIV id="id_1">
<P class="p0 ft1"><SPAN class="ft0">A</SPAN>pplication <SPAN class="ft0">F</SPAN>or <SPAN class="ft0">V</SPAN>ote by <SPAN class="ft0">M</SPAN>ail <SPAN class="ft0">B</SPAN>allot</P>
<TABLE cellpadding=0 cellspacing=0 class="t0">
<TR>
	<TD class="tr0 td0"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td1"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=12 class="tr1 td2"><P class="p2 ft3">Please type or print clearly in ink. All information required unless marked optional.</P></TD>
	<TD class="tr1 td3"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td4"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td5"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td6"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=6 class="tr1 td7"><P class="p3 ft4">MILITARY/OVERSEAS VOTER ONLY</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=13 rowspan=2 class="tr0 td9"><P class="p4 ft5">I hereby apply for a <NOBR>Mail-In</NOBR> Ballot for the:</P></TD>
	<TD class="tr2 td10"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td11"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=8 class="tr2 td12"><P class="p5 ft6">I request <NOBR>Vote-By-Mail</NOBR> Ballots for all elections in which I am</P></TD>
</TR>
<TR>
	<TD class="tr3 td8"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td10"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td11"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=8 class="tr3 td12"><P class="p5 ft9">eligible to vote and I am <SPAN class="ft8">(MARK ONLY ONE)</SPAN></P></TD>
</TR>
<TR>
	<TD rowspan=4 class="tr4 td8"><P class="p6 ft10">1</P></TD>
	<TD colspan=3 class="tr5 td13"><P class="p4 ft11">(CHECK ONLY ONE)</P></TD>
	<TD class="tr5 td14"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td15"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td16"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td17"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td10"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td18"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td19"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td20"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td21"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td22"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td10"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td11"><P class="p1 ft12">&nbsp;</P></TD>
	<TD colspan=8 rowspan=2 class="tr6 td12"><P class="p5 ft14"><SPAN class="ft13">r </SPAN>A Member of the Uniformed Services or Merchant Marine on active</P></TD>
</TR>
<TR>
	<TD class="tr7 td23"><P class="p1 ft15">&nbsp;</P></TD>
	<TD colspan=5 rowspan=2 class="tr8 td24"><P class="p1 ft17"><SPAN class="ft16">r</SPAN>General (November) <SPAN class="ft16">r</SPAN>Primary</P></TD>
	<TD colspan=8 rowspan=2 class="tr8 td25"><P class="p7 ft17"><SPAN class="ft16">r</SPAN>Municipal <SPAN class="ft16">r</SPAN>School <SPAN class="ft16">r</SPAN>Fire</P></TD>
	<TD class="tr7 td11"><P class="p1 ft15">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr3 td23"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td11"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td26"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=6 class="tr3 td27"><P class="p8 ft18">duty, or an eligible spouse or dependent.</P></TD>
	<TD class="tr3 td28"><P class="p1 ft7">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr9 td23"><P class="p1 ft19">&nbsp;</P></TD>
	<TD colspan=3 rowspan=2 class="tr6 td29"><P class="p1 ft22"><SPAN class="ft20">r</SPAN><SPAN class="ft21">Special </SPAN>_______________</P></TD>
	<TD class="tr9 td15"><P class="p1 ft19">&nbsp;</P></TD>
	<TD colspan=3 rowspan=2 class="tr6 td30"><P class="p5 ft21">To be held on</P></TD>
	<TD colspan=2 rowspan=2 class="tr10 td31"><P class="p9 ft23">/ /</P></TD>
	<TD class="tr9 td20"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td21"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td22"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td10"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td11"><P class="p1 ft19">&nbsp;</P></TD>
	<TD colspan=8 rowspan=2 class="tr10 td32"><P class="p5 ft21"><SPAN class="ft20">r </SPAN>A U.S. Citizen residing outside the U.S. and I intend to return.</P></TD>
</TR>
<TR>
	<TD class="tr11 td8"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td23"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td15"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr12 td33"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr11 td21"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td22"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td10"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td11"><P class="p1 ft24">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr6 td8"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr6 td23"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr6 td34"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr10 td35"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr10 td36"><P class="p1 ft14">(Specify)</P></TD>
	<TD class="tr10 td37"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr6 td16"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr6 td17"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr6 td10"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr6 td18"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=4 class="tr6 td38"><P class="p10 ft14">(Date)</P></TD>
	<TD class="tr6 td10"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr6 td11"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=8 class="tr13 td39"><P class="p5 ft14"><SPAN class="ft13">r </SPAN>A U.S. Citizen residing outside the U.S. and I do not intend to return.</P></TD>
</TR>
<TR>
	<TD class="tr4 td8"><P class="p6 ft10">2</P></TD>
	<TD colspan=4 class="tr14 td40"><P class="p7 ft27"><SPAN class="ft26">Last Name </SPAN>(Type or Print)</P></TD>
	<TD class="tr14 td37"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td41"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td42"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td43"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td44"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=4 class="tr14 td45"><P class="p7 ft27"><SPAN class="ft26">First Name </SPAN>(Type or Print)</P></TD>
	<TD class="tr14 td43"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td46"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td47"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td46"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td48"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr14 td49"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=3 class="tr14 td50"><P class="p11 ft21">Middle Name or Initial</P></TD>
	<TD class="tr14 td51"><P class="p7 ft28">Suffx (Jr., Sr., III)</P></TD>
</TR>
<TR>
	<TD class="tr15 td52"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td53"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td54"><P class="p1 ft29">&nbsp;</P></TD>
	<TD colspan=3 class="tr15 td55"><P class="p1 ft29">&nbsp;</P></TD>
	<TD colspan=2 class="tr15 td56"><P class="p1 ft29">&nbsp;</P></TD>
	<TD colspan=2 class="tr15 td57"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td58"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td33"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td59"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td60"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td61"><P class="p1 ft29">&nbsp;</P></TD>
	<TD colspan=2 class="tr15 td62"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td63"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td64"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td60"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td65"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td66"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td67"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td68"><P class="p1 ft29">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr13 td8"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr13 td23"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=9 class="tr13 td69"><P class="p1 ft30">Address at which you are registered to vote</P></TD>
	<TD class="tr13 td70"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr13 td71"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr13 td22"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr13 td10"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=6 class="tr13 td72"><P class="p12 ft30">Mail my ballot to</P></TD>
	<TD class="tr13 td73"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=2 rowspan=3 class="tr16 td74"><P class="p13 ft28">Same Address as Section 3</P></TD>
</TR>
<TR>
	<TD class="tr17 td8"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td23"><P class="p1 ft31">&nbsp;</P></TD>
	<TD colspan=3 rowspan=3 class="tr0 td29"><P class="p1 ft28">Street Address or RD#</P></TD>
	<TD class="tr17 td15"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td16"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td17"><P class="p1 ft31">&nbsp;</P></TD>
	<TD colspan=3 rowspan=3 class="tr0 td75"><P class="p14 ft28">Apt.</P></TD>
	<TD class="tr17 td70"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td71"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td22"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td10"><P class="p1 ft31">&nbsp;</P></TD>
	<TD colspan=6 rowspan=2 class="tr6 td72"><P class="p12 ft32">the following address:</P></TD>
	<TD class="tr17 td73"><P class="p1 ft31">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr12 td8"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td23"><?php echo $data['Address'];?><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td15"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td16"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td76"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td70"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td71"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td22"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td10"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td73"><P class="p1 ft25">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr5 td8"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td23"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td15"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td16"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td76"><P class="p1 ft12">&nbsp;</P></TD>
	<TD colspan=2 class="tr5 td77"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td22"><P class="p1 ft12">&nbsp;</P></TD>
	<TD colspan=7 rowspan=2 class="tr18 td78"><P class="p15 ft33">Please include</P></TD>
	<TD class="tr5 td73"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td79"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td80"><P class="p1 ft12">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr5 td8"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td23"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td34"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td73"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td14"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td15"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td16"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td76"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td10"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td18"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td19"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td70"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td71"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td22"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td73"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td79"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td80"><P class="p1 ft12">&nbsp;</P></TD>
</TR>
<TR>
	<TD rowspan=4 class="tr14 td8"><P class="p6 ft10">3</P></TD>
	<TD class="tr12 td23"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td34"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td73"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td14"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td15"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td16"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td76"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td10"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td18"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td19"><P class="p1 ft25">&nbsp;</P></TD>
	<TD colspan=2 rowspan=4 class="tr19 td81"><P class="p16 ft10">4</P></TD>
	<TD class="tr12 td22"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td10"><P class="p1 ft25">&nbsp;</P></TD>
	<TD class="tr12 td82"><P class="p1 ft25">&nbsp;</P></TD>
	<TD colspan=4 rowspan=2 class="tr2 td83"><P class="p17 ft33">any</P></TD>
	<TD class="tr20 td65"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td66"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td84"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td68"><P class="p1 ft34">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr21 td23"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td34"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td73"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td14"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td15"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td16"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td76"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td10"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td18"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td19"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td22"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td10"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td82"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td85"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td73"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td79"><P class="p1 ft35">&nbsp;</P></TD>
	<TD class="tr21 td80"><P class="p1 ft35">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr2 td23"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td34"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td73"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td14"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td15"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td16"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td76"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td10"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td18"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td19"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr2 td22"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=6 class="tr2 td86"><P class="p18 ft33">PO Box, RD#,</P></TD>
	<TD class="tr3 td65"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td66"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td84"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td68"><P class="p1 ft7">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr17 td23"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr9 td54"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td66"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td87"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td88"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td89"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td90"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td61"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td91"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr9 td58"><P class="p1 ft19">&nbsp;</P></TD>
	<TD class="tr17 td22"><P class="p1 ft31">&nbsp;</P></TD>
	<TD colspan=7 class="tr17 td78"><P class="p5 ft36">State/Province,</P></TD>
	<TD class="tr17 td73"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td79"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td80"><P class="p1 ft31">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr3 td8"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td23"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=3 rowspan=2 class="tr18 td29"><P class="p8 ft28">Municipality <SPAN class="ft37">(City/Town)</SPAN></P></TD>
	<TD class="tr3 td15"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td92"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=2 rowspan=2 class="tr18 td93"><P class="p7 ft28">State</P></TD>
	<TD class="tr3 td94"><P class="p1 ft7">&nbsp;</P></TD>
	<TD rowspan=2 class="tr18 td19"><P class="p12 ft28">Zip</P></TD>
	<TD colspan=2 class="tr17 td81"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr3 td22"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=6 rowspan=2 class="tr18 td86"><P class="p12 ft33">Zip/Postal Code</P></TD>
	<TD class="tr17 td65"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td66"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td84"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td68"><P class="p1 ft31">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr11 td8"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td23"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td15"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td92"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td94"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td70"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td71"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td22"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td85"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td73"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td79"><P class="p1 ft24">&nbsp;</P></TD>
	<TD class="tr11 td80"><P class="p1 ft24">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr3 td8"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td23"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td34"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td73"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td14"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td15"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td92"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td17"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td10"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td94"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td19"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td70"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td71"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td22"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td10"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td82"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=5 class="tr3 td38"><P class="p1 ft33">& Country</P></TD>
	<TD class="tr3 td73"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td79"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td80"><P class="p1 ft7">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr20 td8"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td23"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td34"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td73"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td14"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td15"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td92"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td17"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td10"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td94"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td19"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr15 td95"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td96"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr20 td22"><P class="p1 ft34">&nbsp;</P></TD>
	<TD colspan=6 rowspan=2 class="tr2 td86"><P class="p18 ft38">(if outside US)</P></TD>
	<TD class="tr15 td65"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td66"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td84"><P class="p1 ft29">&nbsp;</P></TD>
	<TD class="tr15 td68"><P class="p1 ft29">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr5 td8"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td23"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td34"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td73"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td14"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td15"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td92"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td17"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td10"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td94"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td19"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td70"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td71"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td22"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td85"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td73"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td79"><P class="p1 ft12">&nbsp;</P></TD>
	<TD class="tr5 td80"><P class="p1 ft12">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr3 td8"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td23"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td34"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td73"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td14"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td15"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td92"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=3 class="tr3 td97"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td19"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr17 td95"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td96"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr3 td22"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td10"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td82"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td98"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td82"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=2 class="tr3 td99"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=2 class="tr17 td100"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td84"><P class="p1 ft31">&nbsp;</P></TD>
	<TD class="tr17 td68"><P class="p1 ft31">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr20 td52"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td53"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td54"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td66"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td87"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td88"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td101"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td102"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td61"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td103"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td58"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td95"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td96"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td60"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td61"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td63"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td104"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td63"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td105"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td60"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td65"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td66"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td84"><P class="p1 ft34">&nbsp;</P></TD>
	<TD class="tr20 td68"><P class="p1 ft34">&nbsp;</P></TD>
</TR>
<TR>
	<TD rowspan=2 class="tr19 td52"><P class="p6 ft10">5</P></TD>
	<TD class="tr3 td23"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=2 class="tr3 td106"><P class="p12 ft9">Date of Birth</P></TD>
	<TD class="tr3 td14"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=2 rowspan=2 class="tr19 td107"><P class="p19 ft10">6</P></TD>
	<TD colspan=7 class="tr3 td108"><P class="p13 ft9">Day Time Phone Number</P></TD>
	<TD class="tr3 td109"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=2 rowspan=2 class="tr19 td110"><P class="p20 ft10">7</P></TD>
	<TD class="tr3 td111"><P class="p1 ft7">&nbsp;</P></TD>
	<TD colspan=4 class="tr3 td112"><P class="p8 ft9"><NOBR>E-Mail</NOBR> Address <SPAN class="ft37">(Optional)</SPAN></P></TD>
	<TD class="tr3 td79"><P class="p1 ft7">&nbsp;</P></TD>
	<TD class="tr3 td80"><P class="p1 ft7">&nbsp;</P></TD>
</TR>
<TR>
	<TD colspan=3 class="tr1 td113"><P class="p21 ft39">/</P></TD>
	<TD class="tr1 td87"><P class="p22 ft39">/</P></TD>
	<TD class="tr1 td102"><P class="p4 ft39">(</P></TD>
	<TD class="tr1 td61"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=2 class="tr1 td31"><P class="p23 ft39">)</P></TD>
	<TD class="tr1 td33"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td59"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td60"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td114"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td115"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td105"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td60"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td65"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td66"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td84"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td68"><P class="p1 ft2">&nbsp;</P></TD>
</TR>
<TR>
	<TD rowspan=2 class="tr22 td8"><P class="p6 ft10">8</P></TD>
	<TD class="tr2 td23"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=2 rowspan=2 class="tr23 td116"><P class="p1 ft39">Signature</P></TD>
	<TD colspan=17 class="tr2 td117"><P class="p24 ft6">Please sign your name as it appears in the Poll Book.</P></TD>
	<TD rowspan=2 class="tr23 td118"><P class="p25 ft10">9</P></TD>
	<TD colspan=2 class="tr2 td74"><P class="p4 ft6"><SPAN class="ft40">T</SPAN>oday’s Date</P></TD>
</TR>
<TR>
	<TD class="tr24 td53"><P class="p1 ft2">&nbsp;</P></TD>
	<TD colspan=17 class="tr24 td119"><P class="p17 ft42"><SPAN class="ft41">X </SPAN>______________________________</P></TD>
	<TD class="tr24 td84"><P class="p26 ft39">/</P></TD>
	<TD class="tr24 td68"><P class="p27 ft39">/</P></TD>
</TR>
</TABLE>
  </body>
</html>