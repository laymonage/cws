<?php
include("../../inc/conf.php");
include("../function.php") ;

if(empty($_GET['a'])){
	echo '
<html><head>
	
	<link href="'.$URL.'css/bootstrap.css" rel="stylesheet">
	<link href="'.$URL.'css/custom.css" rel="stylesheet">
	<link href="'.$URL.'font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="view">';
}

//=====
if(isset($_GET['file_no']) AND isset($_GET['id'])){
	$qry = mysql_query("SELECT * FROM `se` WHERE `file_no`='".$_GET['file_no']."' AND `se_id`='".$_GET['id']."' ") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count = mysql_num_rows($qry);
	
	$assessment = explode(";",$data['assessment_data']);
	$background = explode(";",$data['background_info']);
	$living_env = explode(";",$data['living_env']);
	$house=explode(",",$living_env[0]);
	$fur=explode(",",$living_env[1]);
	$living_cond = explode(";",$data['living_cond']);
	$sec_neigh=explode(";",$data['sec_neigh']);
	$sec=explode(",",$sec_neigh[0]);
	$neigh=explode(",",$sec_neigh[1]);
	$phnn = explode(";",$data['phnn']);
	$child_protect = explode(";",$data['child_protect']);
	$child = explode(",",$child_protect[0]);
	$support_system = explode(";",$data['support_system']);
	$household=explode(",",$support_system[0]);
	$expe=explode(",",$support_system[1]);
	$com=explode(",",$support_system[2]);
	$recommend=explode(";",$data['recommend']);
	$verification=explode(";",$data['verification']);
	
	$edit = 1;
	
	if($count>0){
?>
<h4>Socio Economic Assessment Report  </h4>
<hr>
<h5>Assessment Remaks</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td width="16%"><b>File Number:</b></td>
			<td width="16%"><?php if($edit==1){echo $data['file_no'];}?></td>
			
			<td width="16%"><b>Date of Assessment:</b></td>
			<td width="16%"><?php if($edit==1){echo $data['doa'];}?></td>
			
			<td width="16%"><b>Interviewer:</b></td>
			<td width="16%"><?php if($edit==1){echo $assessment[0];}?></td>
		</tr>
		<tr>
			<td ><b>Location: </b></td>
			<td ><?php if($edit==1){echo $assessment[1];}?></td>
			
			<td ><b>Date of last assessment:</b></td>
			<td ><?php if($edit==1){echo $assessment[2];}?></td>
			
			<td ><b>Assistance receiving since <i>(if any)</i>:</b></td>
			<td ><?php if($edit==1){echo $assessment[3];}?></td>
		</tr>
		<tr>
			<td ><b>Interpreter:</b></td>
			<td ><?php if($edit==1){echo $assessment[4];} ?></td>
			
			<td ><b># of home visit(s) and date:</b></td>
			<td ><?php if($edit==1){echo $assessment[5];} ?></td>
			
			<td ><b>Date of last home visit:</b></td>
			<td ><?php if($edit==1){echo $assessment[6];} ?></td>
		</tr>
	</table>
	
<h5>Background Information and Assessment Purpose</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td ><b>1. How PoC (and family) survived from date of arrival to the date of assessment?</b></td>
		</tr><tr>	
			<td ><p style="margin-left:15px"><?php if($edit==1){echo $background[0];} ?></p></td>
		</tr>
		<tr>
			<td ><b>2. Current Situation (Socio-economic):</b></td>
		</tr><tr>	
			<td ><p style="margin-left:15px"><?php if($edit==1){echo $background[1];} ?></p></td>
		</tr>
	</table>
<h5>Living Condition <small>(to be filled in after home visits)</small></h5>
<h5>A. GENERAL</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td ><b>House/Room condition:</b></td>
			<td >
				<b><input  type="checkbox" disabled id="room_1" value="1" <?php if($edit==1){if($house[0]==1){echo "checked='checked'";}} ?> > No repair</b><br>
				<b><input  type="checkbox" disabled id="room_2" value="1" <?php if($edit==1){if($house[1]==1){echo "checked='checked'";}} ?>> Medium repair</b><br>
				<b><input  type="checkbox" disabled id="room_3" value="1" <?php if($edit==1){if($house[2]==1){echo "checked='checked'";}} ?>> Leaking ceiling</b><br>
				<b><input  type="checkbox" disabled id="room_4" value="1" <?php if($edit==1){if($house[3]==1){echo "checked='checked'";}} ?>> Shared toilet/bathroom</b><br>
				<b><input  type="checkbox" disabled id="room_5" value="1" <?php if($edit==1){if($house[4]==1){echo "checked='checked'";}} ?>> No toilet/bathroom</b><br>
			</td><td >
				<b><input  type="checkbox" disabled id="room_6" value="1" <?php if($edit==1){if($house[5]==1){echo "checked='checked'";}} ?>> Air ventilation (windows, etc)</b><br>
				<b><input  type="checkbox" disabled id="room_7" value="1" <?php if($edit==1){if($house[6]==1){echo "checked='checked'";}} ?>> No air ventilation</b><br>
				<b><input  type="checkbox" disabled id="room_8" value="1" <?php if($edit==1){if($house[7]==1){echo "checked='checked'";}} ?>> Shared kitchen</b><br>
				<b><input  type="checkbox" disabled id="room_9" value="1" <?php if($edit==1){if($house[8]==1){echo "checked='checked'";}} ?>> No kitchen</b><br>
				<b><input  type="checkbox" disabled id="room_10" value="1" <?php if($edit==1){if($house[9]==1){echo "checked='checked'";}} ?>> Dampness </b><br>
				<b><input  type="checkbox" disabled id="room_11" value="1" <?php if($edit==1){if($house[10]==1){echo "checked='checked'";}} ?>> Smell</b><br>
			</td>
		</tr>
		<tr>
			<td ><b>Furniture / Equipment:</b></td>
			<td >
				<b><input  type="checkbox" disabled id="furni_1" value="1"  <?php if($edit==1){if($fur[0]==1){echo "checked='checked'";}} ?>> Bed</b><br>
				<b><input  type="checkbox" disabled id="furni_2" value="1" <?php if($edit==1){if($fur[1]==1){echo "checked='checked'";}} ?>> Sofa</b><br>
				<b><input  type="checkbox" disabled id="furni_3" value="1" <?php if($edit==1){if($fur[2]==1){echo "checked='checked'";}} ?>> Wardrobe/Cupboard</b><br>
				<b><input  type="checkbox" disabled id="furni_4" value="1" <?php if($edit==1){if($fur[3]==1){echo "checked='checked'";}} ?>> Table</b><br>
				<b><input  type="checkbox" disabled id="furni_5" value="1" <?php if($edit==1){if($fur[4]==1){echo "checked='checked'";}} ?>> Chairs</b><br>	
				<b><input  type="checkbox" disabled id="furni_6" value="1" <?php if($edit==1){if($fur[5]==1){echo "checked='checked'";}} ?>> Rice cooker</b><br>
				<b><input  type="checkbox" disabled id="furni_7" value="1" <?php if($edit==1){if($fur[6]==1){echo "checked='checked'";}} ?>> Refrigerator</b><br>
				<b><input  type="checkbox" disabled id="furni_8" value="1" <?php if($edit==1){if($fur[7]==1){echo "checked='checked'";}} ?>> Gas stove</b><br>
				<b><input  type="checkbox" disabled id="furni_9" value="1" <?php if($edit==1){if($fur[8]==1){echo "checked='checked'";}} ?>> Washing machine</b><br>
				<b><input  type="checkbox" disabled id="furni_10" value="1" <?php if($edit==1){if($fur[9]==1){echo "checked='checked'";}} ?>> TV set </b><br>
			</td><td  valign="top">		
				<b><input  type="checkbox" disabled id="furni_12" value="1" <?php if($edit==1){if($fur[10]==1){echo "checked='checked'";}} ?>> Iron</b><br>
				<b><input  type="checkbox" disabled id="furni_12" value="1" <?php if($edit==1){if($fur[11]==1){echo "checked='checked'";}} ?>> Computer (laptop, tablet)</b><br>
				<b><input  type="checkbox" disabled id="furni_13" value="1" <?php if($edit==1){if($fur[12]==1){echo "checked='checked'";}} ?>> DVD player</b><br>
				<b><input  type="checkbox" disabled id="furni_14" value="1" <?php if($edit==1){if($fur[13]==1){echo "checked='checked'";}} ?>> AC</b><br>
				<b><input  type="checkbox" disabled id="furni_15" value="1" <?php if($edit==1){if($fur[14]==1){echo "checked='checked'";}} ?>> Fan</b><br>
				<b><input  type="checkbox" disabled id="furni_16" value="1" <?php if($edit==1){if($fur[15]==1){echo "checked='checked'";}} ?>> Internet Connection</b><br>
				<b><input  type="checkbox" disabled id="furni_17" value="1" <?php if($edit==1){if($fur[16]==1){echo "checked='checked'";}} ?>> TV Cable</b><br>
				<b><input  type="checkbox" disabled id="furni_18" value="1" <?php if($edit==1){if($fur[17]==1){echo "checked='checked'";}} ?>> Piped Clean & Safe Water</b><br>
				<b><input  type="checkbox" disabled id="furni_19" value="1" <?php if($edit==1){if($fur[18]==1){echo "checked='checked'";}} ?>> Motorcycle</b><br>
				<b><input  type="checkbox" disabled id="furni_20" value="1" <?php if($edit==1){if($fur[19]==1){echo "checked='checked'";}} ?>> Mobile phone</b><br>
				<b><input  type="checkbox" disabled id="furni_21" value="1" <?php if($edit==1){if($fur[20]==1){echo "checked='checked'";}} ?>> Others</b><br>
			</td>
		</tr>
	</table>
	<br>
	<table border="1" class="table table-bordered">
		<tr>
			<td  width="16%"><b>Number of rooms: </b></td>
			<td  width="16%"><?php if($edit==1){echo $living_cond[0];}?></td>
			
			<td width="16%"><b>Living space in M2:</b></td>
			<td  width="16%"><?php if($edit==1){echo $living_cond[1];}?></td>
			
			<td width="16%"><b>Monthly rent fee:</b></td>
			<td  width="16%"><?php if($edit==1){echo $living_cond[2];}?></td>
		</tr>
		<tr>
			<td  colspan="6"><b>Notes/comments on general condition: </b></td>
		</tr>
		<tr>
			<td  colspan="6"><?php if($edit==1){echo $living_cond[3];}?></td>
		</tr>
	</table>
	 <br>
	<table border="1" class="table table-bordered">
		<tr>
			<td width="300px"><b>Security and Safety Measures:</b></td>
			<td  colspan="3">
				<b><input  type="checkbox" disabled id="sec_1" value="1" <?php if($edit==1){if($sec[0]==1){echo "checked='checked'";}} ?>> Fenced accommodation</b>
				<b><input  type="checkbox" disabled id="sec_2" value="1" <?php if($edit==1){if($sec[1]==1){echo "checked='checked'";}} ?>> Secure gate</b>
				<br><b><input  type="checkbox" disabled id="sec_3" value="1" <?php if($edit==1){if($sec[2]==1){echo "checked='checked'";}} ?>> Secure doors & windows</b>
				<b><input  type="checkbox" disabled id="sec_4" value="1" <?php if($edit==1){if($sec[3]==1){echo "checked='checked'";}} ?>> Multiple Entry/Exit points in the building</b>
				<br><b><input  type="checkbox" disabled id="sec_5" value="1" <?php if($edit==1){if($sec[4]==1){echo "checked='checked'";}} ?>> Fire Extinguisher</b>
			</td>
		</tr>
		<tr>
			<td ><b>Neighbourhood/Relationship with Around People:</b></td>
			<td  colspan="3">
				<b><input  type="checkbox" disabled id="neig_1" value="1" <?php if($edit==1){if($neigh[0]==1){echo "checked='checked'";}} ?>> Clean & healthy area</b>
				<b><input  type="checkbox" disabled id="neig_2" value="1" <?php if($edit==1){if($neigh[1]==1){echo "checked='checked'";}} ?>> Dense populated area</b>
				<br><b><input  type="checkbox" disabled id="neig_3" value="1" <?php if($edit==1){if($neigh[2]==1){echo "checked='checked'";}} ?>> Slum area</b>
				<b><input  type="checkbox" disabled id="neig_4" value="1" <?php if($edit==1){if($neigh[3]==1){echo "checked='checked'";}} ?>> Trading area</b>
				<br><b><input  type="checkbox" disabled id="neig_5" value="1" <?php if($edit==1){if($neigh[4]==1){echo "checked='checked'";}} ?>> Others</b>
			</td>
		</tr>
		<tr>
			<td width="25%"><b>Police station:</b></td>
			<td width="25%"><?php if($edit==1){echo $phnn[0];}?></td>
			
			<td width="25%"><b>Health facilities:</b></td>
			<td width="25%"><?php if($edit==1){echo $phnn[1];}?></td>
		</tr>
		<tr>
			<td ><b>Notes: </b></td>
			<td  colspan="3"><?php if($edit==1){echo $phnn[2];}?></td>
		</tr>
		<tr>
			<td ><b>Number of person living in same house:  </b></td>
			<td  colspan="3"><?php if($edit==1){echo $phnn[3];}?></td>
		</tr>
	</table>
	
<h5>B. PERSON WITH SPECIFIC NEEDS</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td ><b>Please specify more about the vulnerabilities: </b></td>
			<td  colspan="3"><?php if($edit==1){echo $data['vulnerabilities'];}; ?></td>
		</tr>
		<tr>
			<td  colspan="4"><b>1. CHILDREN </b></td>
		</tr>
		<tr>
			<td  width="300px">Unaccompanied minors:  </td>
			<td  >
				<b class="radio-inline"><input  type="radio" name="unaccompanied_minors"  value="1" <?php if($edit==1){if($child[0]==1){echo "checked='checked'"; }} ?>  >Yes</b><b class="radio-inline"><input  type="radio" name="unaccompanied_minors"  value="0" <?php if($edit==1){if($child[0]==0){echo "checked='checked'"; }} ?>>No</b>
			</td>
			<td  width="50px" align="center">
				<b>#</b><?php if($edit==1){echo $child[1];}?>
			</td>
			<!-- -->
			<td  rowspan="2">
				<b>Remarks:</b>
				<?php if($edit==1){echo $child[4];}?>
			</td>
		</tr>
		<tr>
			<td >Separated children:</td>
			<td >
				
				<b class="radio-inline"><input  type="radio" name="separated_children"  value="1" <?php if($edit==1){if($child[2]==1){echo "checked='checked'"; }} ?>>Yes</b><b class="radio-inline"><input  type="radio" name="separated_children"  value="0" <?php if($edit==1){if($child[2]==0){echo "checked='checked'"; }} ?>>No</b>
			
			</td>
			<td  width="50px" align="center">
				<b>#</b><?php if($edit==1){echo $child[3];}?>
			</td>
		</tr>
		<tr>
			<td ># of children attending school:</td>
			<td  colspan="3"><?php if($edit==1){echo $child[5];}?></td>
		</tr>
		<tr>
			<td ># of children not attending school:</td>
			<td  colspan="3"><?php if($edit==1){echo $child[6];}?></td>
		</tr>
		<tr>
			<td ># of children with specific education needs:</td>
			<td  colspan="3"><?php if($edit==1){echo $child[7];}?></td>
		</tr>
		<tr>
			<td  colspan="4"><b>2. PROTECTION NEEDS:</b></td>
		</tr>
		<tr>
			<td  colspan="4"><?php if($edit==1){echo $child_protect[1];}?></td>
		</tr>
		
	</table>
	
<h5>Financial And Other Support System Available To The Person Of Concern</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td  colspan="4" ><h5>Support System</h5></td>
		</tr>
		<tr>
			<td  colspan="4"><b>Approximate monthly household income</b></td>
		</tr>
		<tr>
			<td  width="30%"><b>CWS/UNHCR cash assistance:</b></td>
			<td   colspan="3"><?php if($edit==1){echo $household[0];} ?></td>
		</tr>
		<tr>
			<td ><b>Non-CWS/UNHCR assistance:</b></td>
			<td   colspan="3"><?php if($edit==1){echo $household[1];} ?></td>
		</tr>
		<tr>
			<td ><b>Other sources of income: <br><small>(e.g. IOM/JRS, etc)</small></b></td>
			<td   colspan="3"><?php if($edit==1){echo $household[2];} ?></td>
		</tr>
		<tr>
			<td ><b>Other sources of income: <br><small>(e.g. from relative in CoO/CoA/Abroad, etc.)</small></b></td>
			<td   colspan="3"><?php if($edit==1){echo $household[3];} ?></td>
		</tr>
		<tr>
			<td  colspan="4"><b>Approximate monthly expenditure</b></td>
		</tr>
		<tr>
			<td ><b>Rent fee:</b></td>
			<td ><?php if($edit==1){echo $expe[0];} ?></td>
			<td ><b>Food:</b></td>
			<td ><?php if($edit==1){echo $expe[1];} ?></td>
		</tr>
		<tr>
			<td ><b>Clothes:</b></td>
			<td ><?php if($edit==1){echo $expe[2];} ?></td>
			<td ><b>Transport:</b></td>
			<td ><?php if($edit==1){echo $expe[3];} ?></td>
		</tr>
		<tr>
			<td ><b>Other:</b></td>
			<td  colspan="3"><?php if($edit==1){echo $expe[4];} ?></td>
		</tr>
		<tr>
			<td ><b>Comments on available financial support system <br>(cash): </b></td>
			<td  colspan="3"><?php if($edit==1){echo $com[0];} ?></td>
		</tr>
		<tr>
			<td ><b>Comments on available other support system <br>(in kind): </b></td>
			<td  colspan="3"><?php if($edit==1){echo $com[1];} ?></td>
		</tr>
		
		<tr>
			<td  colspan="4"><h5>Recommendations:</h5></td>
		</tr>
		<tr>
			<td  width="300px"><b>Assistance Highly Recommended:  </b></td>
			<td  colspan="3">
				<b class="radio-inline"><input  type="radio" name="radioahr" value="1" <?php if($edit==1){if($recommend[0]==1){echo "checked='checked'";}}?>> YES</b>
				<b class="radio-inline"><input  type="radio" name="radioahr" value="0" <?php if($edit==1){if($recommend[0]==0){echo "checked='checked'";}}?>> NO</b>
			</td>
		</tr>
		<tr>
			<td ><b>Assistance Recommended:  </b></td>
			<td  colspan="3">
				
					<b class="radio-inline"><input  type="radio" name="radioar" value="1" <?php if($edit==1){if($recommend[1]==1){echo "checked='checked'";}}?>> YES</b>
					<b class="radio-inline"><input  type="radio" name="radioar" value="0" <?php if($edit==1){if($recommend[1]==0){echo "checked='checked'";}}?>> NO</b>
				
			</td>
		</tr>
		<tr>
			<td ><b>Assistance Not Recommended:  </b></td>
			<td  colspan="3">
				
					<b class="radio-inline"><input  type="radio" name="radioanr" value="1" <?php if($edit==1){if($recommend[2]==1){echo "checked='checked'";}}?>> YES</b>
					<b class="radio-inline"><input  type="radio" name="radioanr" value="0" <?php if($edit==1){if($recommend[2]==0){echo "checked='checked'";}}?>> NO</b>
				
			</td>
		</tr>
		<tr>
			<td  colspan="4"><b>Final remarks, including recommendation on cash, non-cash or other form of assistance</b><br><small>(if applicable):</small></td>
		</tr>
		<tr>
			<td  colspan="4"><?php if($edit==1){echo $recommend[3];}?></td>
		</tr>
		
	</table>
<h5>Assessment verified by:</h5>		
	<table border="1" class="table table-bordered">
		<tr>
			<td width="16%"><b>Name:</b></td>
			<td width="16%"><?php if($edit==1){echo $verification[0];} ?></td>
			
			<td width="16%"><b>Signature:</b></td>
			<td width="16%"><?php if($edit==1){echo $verification[1];} ?></td>
			
			<td width="16%"><b>Date:</b></td>
			<td width="16%"><?php if($edit==1){echo $verification[2];} ?></td>
		</tr>
		<tr>
			<td ><b>Remarks by reviewing officer: </b></td>
			<td  colspan="5"><?php if($edit==1){echo $verification[3];} ?></td>
		</tr>
	</table>

<?php
		echo '<b>Comment:</b>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';
		echo '<div class="page-break"></div>';
		
		//== panel
		if(empty($_GET['a'])){
			$link =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."&a=hide";
			$file = "SE_".$data['file_no']."_".$data['doa'];
			echo'
			<form action="../pdfin.php" method="post">
			<div class="atas">
				<input type="text" name="link" value="'.$link.'" hidden>
				<input type="text" name="file" value="'.$file.'" hidden>
			   <button class="btn print btn-sm btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				<button type="submit" class="btn btn-sm btn-default " ><i class="fa fa-download"></i> Get PDF</button>
			</div>
			</form>';
		}
		//==panel

	}
	else{
		echo "No data SE for File Number: ".$_GET['file_no'];
		echo '<div class="page-break"></div>';
		
	}	
}
if(empty($_GET['a'])){
	echo'</body>
</html>';
}

?>

