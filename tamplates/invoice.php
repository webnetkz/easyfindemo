<?php
	
	require_once '../app/DB.php';
	$id = trim($_GET['doc']);
	$id = htmlspecialchars($id);

	$id = 1;
	// Получение данных документа
	$sql = 'SELECT * FROM INVOICE WHERE id ='.$id;
	$result = $pdo->query($sql);
	$result = $result->fetchAll(PDO::FETCH_ASSOC);
	$items = $result[0]['items'];
	$value = $result[0]['value_1'];
	$agent = $result[0]['agent'];
	
	// Получение личных данных
	$sqlMy = 'SELECT * FROM users';
	$resultMy = $pdo->query($sqlMy);
	$resultMy = $resultMy->fetchAll(PDO::FETCH_ASSOC);

	// Получение данных агента
	$sqlAgent = 'SELECT * FROM agents WHERE name = "'.$agent.'"';
	$resultAgent = $pdo->query($sqlAgent);
	$resultAgent = $resultAgent->fetchAll(PDO::FETCH_ASSOC);

	// Получение данных услуги\товара
	$sqlItems = 'SELECT * FROM items WHERE name = "'.$items.'"';
	$resultItems = $pdo->query($sqlItems);
	$resultItems = $resultItems->fetchAll(PDO::FETCH_ASSOC);
		
	$price = $resultItems[0]['price'] * (int)$value;

    require_once 'lineOfNumber.php';
    $priceLine = lineOfNumber($price);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<title>Invoice</title>
	<meta name="changedby" content="asus"/>
	
	<style type="text/css">
		body {
			margin-bottom: 200px;
		}
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:xx-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>
<table cellspacing="0" border="0">
	<colgroup span="6" width="21"></colgroup>
	<colgroup width="1"></colgroup>
	<colgroup width="20"></colgroup>
	<colgroup span="9" width="21"></colgroup>
	<colgroup span="2" width="11"></colgroup>
	<colgroup span="2" width="21"></colgroup>
	<colgroup span="2" width="11"></colgroup>
	<colgroup width="21"></colgroup>
	<colgroup width="17"></colgroup>
	<colgroup width="4"></colgroup>
	<colgroup span="4" width="21"></colgroup>
	<colgroup span="2" width="11"></colgroup>
	<colgroup span="4" width="21"></colgroup>
	<colgroup width="13"></colgroup>
	<colgroup width="6"></colgroup>
	<tr>
		<td colspan=5 rowspan=6 height="90" align="left"><br>
		</td>
		<td colspan=33 rowspan=6 align="center" valign=middle> &#1042;&#1085;&#1080;&#1084;&#1072;&#1085;&#1080;&#1077;! &#1054;&#1087;&#1083;&#1072;&#1090;&#1072; &#1076;&#1072;&#1085;&#1085;&#1086;&#1075;&#1086; &#1089;&#1095;&#1077;&#1090;&#1072; &#1086;&#1079;&#1085;&#1072;&#1095;&#1072;&#1077;&#1090; &#1089;&#1086;&#1075;&#1083;&#1072;&#1089;&#1080;&#1077; &#1089; &#1091;&#1089;&#1083;&#1086;&#1074;&#1080;&#1103;&#1084;&#1080; &#1087;&#1086;&#1089;&#1090;&#1072;&#1074;&#1082;&#1080; &#1090;&#1086;&#1074;&#1072;&#1088;&#1072;. &#1059;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1077; &#1086;&#1073; &#1086;&#1087;&#1083;&#1072;&#1090;&#1077;<br> &#1086;&#1073;&#1103;&#1079;&#1072;&#1090;&#1077;&#1083;&#1100;&#1085;&#1086;, &#1074; &#1087;&#1088;&#1086;&#1090;&#1080;&#1074;&#1085;&#1086;&#1084; &#1089;&#1083;&#1091;&#1095;&#1072;&#1077; &#1085;&#1077; &#1075;&#1072;&#1088;&#1072;&#1085;&#1090;&#1080;&#1088;&#1091;&#1077;&#1090;&#1089;&#1103; &#1085;&#1072;&#1083;&#1080;&#1095;&#1080;&#1077; &#1090;&#1086;&#1074;&#1072;&#1088;&#1072; &#1085;&#1072; &#1089;&#1082;&#1083;&#1072;&#1076;&#1077;. &#1058;&#1086;&#1074;&#1072;&#1088; &#1086;&#1090;&#1087;&#1091;&#1089;&#1082;&#1072;&#1077;&#1090;&#1089;&#1103; &#1087;&#1086; &#1092;&#1072;&#1082;&#1090;&#1091;  &#1087;&#1088;&#1080;&#1093;&#1086;&#1076;&#1072; &#1076;&#1077;&#1085;&#1077;&#1075; &#1085;&#1072; &#1088;/&#1089; &#1055;&#1086;&#1089;&#1090;&#1072;&#1074;&#1097;&#1080;&#1082;&#1072;, &#1089;&#1072;&#1084;&#1086;&#1074;&#1099;&#1074;&#1086;&#1079;&#1086;&#1084;, &#1087;&#1088;&#1080; &#1085;&#1072;&#1083;&#1080;&#1095;&#1080;&#1080; &#1076;&#1086;&#1074;&#1077;&#1088;&#1077;&#1085;&#1085;&#1086;&#1089;&#1090;&#1080; &#1080; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1086;&#1074; &#1091;&#1076;&#1086;&#1089;&#1090;&#1086;&#1074;&#1077;&#1088;&#1103;&#1102;&#1097;&#1080;&#1093; &#1083;&#1080;&#1095;&#1085;&#1086;&#1089;&#1090;&#1100;.</td>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		<td height="15" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><b><font size=2>&#1054;&#1073;&#1088;&#1072;&#1079;&#1077;&#1094; &#1087;&#1083;&#1072;&#1090;&#1077;&#1078;&#1085;&#1086;&#1075;&#1086; &#1087;&#1086;&#1088;&#1091;&#1095;&#1077;&#1085;&#1080;&#1103;</font></b></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=20 height="16" align="left" valign=top><b><font size=2>&#1041;&#1077;&#1085;&#1077;&#1092;&#1080;&#1094;&#1080;&#1072;&#1088;: </font></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=10 align="center" valign=top><b><font size=2>&#1048;&#1048;&#1050;</font></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" valign=top><b><font size=2>&#1050;&#1073;&#1077;</font></b></td>
		</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=20 height="31" align="left" valign=top><b><font size=2><?=$resultMy[0]['name'];?></font></b></td>
		<td style="border-left: 1px solid #000000" colspan=10 rowspan=2 align="center" valign=middle><b><font size=2><?=$resultMy[0]['iik'];?></font></b></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 rowspan=2 align="center" valign=middle sdnum="1033;0;0"><b><font size=2><?=$resultMy[0]['kbe'];?></font></b></td>
		</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=20 height="16" align="left" valign=top><font size=2><?=$resultMy[0]['bin_iin'];?></font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=20 height="16" align="left" valign=top><font size=2>&#1041;&#1072;&#1085;&#1082; &#1073;&#1077;&#1085;&#1077;&#1092;&#1080;&#1094;&#1080;&#1072;&#1088;&#1072;:</font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=8 align="center" valign=top><b><font size=2>&#1041;&#1048;&#1050;</font></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="center" valign=top><b><font size=2>&#1050;&#1086;&#1076; &#1085;&#1072;&#1079;&#1085;&#1072;&#1095;&#1077;&#1085;&#1080;&#1103; &#1087;&#1083;&#1072;&#1090;&#1077;&#1078;&#1072;</font></b></td>
		</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=20 height="16" align="left" valign=top><font size=2><?=$resultMy[0]['bank'];?></font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=8 align="center" valign=top><b><font size=2><?=$resultMy[0]['bik'];?></font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="center" valign=top sdnum="1033;0;0"><b><font size=2><?=$resultItems[0]['code_price'];?></font></b></td>
		</tr>
	<tr>
		<td height="15" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="15" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=38 rowspan=2 height="30" align="left" valign=middle><b><font size=4>&#1057;&#1095;&#1077;&#1090; &#1085;&#1072; &#1086;&#1087;&#1083;&#1072;&#1090;&#1091; <?=$result[0]['id'];?> &#1086;&#1090; <?=$result[0]['today'];?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-bottom: 2px solid #000000" colspan=38 height="9" align="left"><br></td>
		</tr>
	<tr>
		<td height="9" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=4 height="49" align="left" valign=top><font size=2>&#1055;&#1086;&#1089;&#1090;&#1072;&#1074;&#1097;&#1080;&#1082;:</font></td>
		<td colspan=34 align="left" valign=top><b><font size=2><?=$resultMy[0]['bin_iin'];?>, <?=$resultMy[0]['name'];?>, <?=$resultMy[0]['adres'];?>, <?=$resultMy[0]['contacts'];?></font></b></td>
		</tr>
	<tr>
		<td height="9" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=4 height="49" align="left" valign=top><font size=2>&#1055;&#1086;&#1082;&#1091;&#1087;&#1072;&#1090;&#1077;&#1083;&#1100;:</font></td>
		<td colspan=34 align="left" valign=top><b><font size=2><?=$resultAgent[0]['bin_iin'];?>, <?=$resultAgent[0]['name'];?>, <?=$resultAgent[0]['adres'];?>, <?=$resultAgent[0]['contacts'];?></font></b></td>
		</tr>
	<tr>
		<td height="9" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=4 height="17" align="left"><font size=2>&#1044;&#1086;&#1075;&#1086;&#1074;&#1086;&#1088;:</font></td>
		<td colspan=34 align="left"><b><font size=2>&#1041;&#1077;&#1079; &#1076;&#1086;&#1075;&#1086;&#1074;&#1086;&#1088;&#1072;</font></b></td>
		</tr>
	<tr>
		<td height="9" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000" colspan=2 height="17" align="center" valign=middle><b><font size=2>&#8470;</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000" colspan=5 align="center" valign=middle><b><font size=2>&#1050;&#1086;&#1076;</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000" colspan=11 align="center" valign=middle><b><font size=2>&#1053;&#1072;&#1080;&#1084;&#1077;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077;</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000" colspan=4 align="center" valign=middle><b><font size=2>&#1050;&#1086;&#1083;-&#1074;&#1086;</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000" colspan=3 align="center" valign=middle><b><font size=2>&#1045;&#1076;.</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000" colspan=6 align="center" valign=middle><b><font size=2>&#1062;&#1077;&#1085;&#1072;</font></b></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=6 align="center" valign=middle><b><font size=2>&#1057;&#1091;&#1084;&#1084;&#1072;</font></b></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 2px solid #000000" colspan=2 height="57" align="center" valign=top sdval="1" sdnum="1033;0;0">1</td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=top><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=top><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=top><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=top><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=top><br></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=11 align="left" valign=top><?=$items;?></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=4 align="right" valign=top sdnum="1033;0;0.000"><?=$value;?></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="left" valign=top><?=$resultItems[0]['unit'];?></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=6 align="right" valign=top sdnum="1033;0;#,##0.00"><?=$resultItems[0]['price'];?></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=6 align="right" valign=top sdnum="1033;0;#,##0.00"><?=$price;?></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000" height="9" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td style="border-top: 2px solid #000000" align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="right" valign=top><b><font size=2><br></font></b></td>
		<td align="right" valign=top><b><font size=2><br></font></b></td>
		<td align="right" valign=top><b><font size=2><br></font></b></td>
		<td align="right" valign=top><b><font size=2><br></font></b></td>
		<td align="right" valign=top><b><font size=2><br></font></b></td>
		<td align="right" valign=top><b><font size=2>&#1048;&#1090;&#1086;&#1075;&#1086;:<?=$price;?></font></b></td>
		<td colspan=6 align="right" valign=top sdnum="1033;0;#,##0.00"><b><font size=2><br></font></b></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td colspan=38 height="17" align="left"><font size=2>&#1042;&#1089;&#1077;&#1075;&#1086; &#1085;&#1072;&#1080;&#1084;&#1077;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1081; <?=$value;?>, &#1085;&#1072; &#1089;&#1091;&#1084;&#1084;&#1091; <?=$price;?> KZT</font></td>
		</tr>
	<tr>
		<td colspan=36 height="17" align="left" valign=top><b><font size=2>&#1042;&#1089;&#1077;&#1075;&#1086; &#1082; &#1086;&#1087;&#1083;&#1072;&#1090;&#1077;: <?=$priceLine;?></font></b></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-bottom: 2px solid #000000" height="9" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
		<td style="border-bottom: 2px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td height="11" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><b><font size=2>&#1048;&#1089;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;</font></b></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" colspan=16 align="left"><br></td>
		<td colspan=12 align="left">/&#1041;&#1091;&#1093;&#1075;&#1072;&#1083;&#1090;&#1077;&#1088;/</td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>
