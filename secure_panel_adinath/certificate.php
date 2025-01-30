<?php
include_once("inc/header.php");
include_once("com/User.php");
include_once("com/PS_Pagination.php");
include_once("inc/checksession.inc.php");
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'view' )
{
	$rec_id=$_REQUEST['id'];
$sel_adm=$db->fetchAssoc($db->fireQuery("select b.*,m.name as pname,u.name as username,u.aadharno from booking as b join membership as m on b.serviceid=m.id 
join user as u on b.userid=u.id
 where b.id='".$rec_id."' order by b.id desc"));
}
if(isset($_POST["update"])){
$temp = new User();
$temp->updatePhoto( $_POST );
$temp->Resize($_POST);
}
?>
<html>
    <head>
        <style type='text/css'>
            
            .container {     margin: 0;
                padding: 0;    color: black;
                display: table;
                font-family: Georgia, serif;
                font-size: 18px;
                text-align: center;
                border: 10px solid #0250a3;
                width: 900px;
                height:610px;
                display: table-cell;
                vertical-align: middle;
            }
			   .container1 {
                border: 7px solid #f16d25;
                width: 900px;
                height: 610px;
                display: table-cell;
                vertical-align: middle;
            }
            .logo {
                color: tan;
            }

            .marquee {
                color: tan;
                font-size: 48px;
                margin: 20px;
            }
            .assignment {
                margin: 20px;
            }
            .person {
                border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 400px;
            }
            .reason {
                margin: 20px;
            }
			  .reason1 {
                margin: 20px;width:380px;float:left;display:inline-block;font-size:14px;text-align:left;
            }
			
.ribbon-2 {
  --f: 10px; /* control the folded part*/
  --r: 15px; /* control the ribbon shape */
  --t: 15px; /* the top offset */
  
  position: absolute;
  inset: var(--t) calc(-1*var(--f)) auto auto;
  padding: 0 10px var(--f) calc(10px + var(--r));
  clip-path: 
    polygon(0 0,100% 0,100% calc(100% - var(--f)),calc(100% - var(--f)) 100%,
      calc(100% - var(--f)) calc(100% - var(--f)),0 calc(100% - var(--f)),
      var(--r) calc(50% - var(--f)/2));
  background-color: #FA1515;
  box-shadow: 0 calc(-1*var(--f)) 0 inset #0005;color:#fff;
}


.box {
  position:relative;
}
        </style>
    </head>
	<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>
<script>
function goBack() {
    window.history.back();
}
</script>
<input type="button" onclick="printDiv('challan1')" value="print a div!" />

    <body id="challan1">
        <div class="container"  >
		<div class="box">
  <div class="ribbon-2" style="background-color: #FA1515;font-style:cursive;border:2px solid #FA1515"><?php echo $member[0]['name'];?></div>
</div>
        <div class="container1">
            <div class="logo">
              <img src="https://www.insofy.in/assets/img/logo.png" style="width:200px;display:inline-block;margin:0px auto;"/>
            </div>

            <div class="marquee">
                Certificate of Membership
            </div>

            <div class="assignment">
               This certificate is issued to 
            </div>

            <div class="person">
              <?php echo $sel_adm[0]['name'];?>
            </div>

            <div class="reason">
            with Aadhaar No. <?php echo $sel_adm[0]['aadharno'];?> for enrolling as member of elite customer club which will entitle him/her for host of financial services either free of cost or at a nominal price. This certificate is valid for a period of 12 months from date of issue.
            </div>

<div class="reason1" style="margin-top:-10px;">
<h4>Adeeshwara</h4>
(Owned by insofy.in)<br/>
Contact no. 9810325157, 9319983890<br/>
E-mail Id: info@insofy.in<br/>
		
        </div>
					<div class="reason1" style="text-align:right;">
Membership Certificate No:-			<b>	ADEEH<?php echo str_replace('-','',$sel_adm[0]['date']);?><?php echo $sel_adm[0]['id'];?></b>	<br/>
Valid from		<?php echo $sel_adm[0]['date'];?>	To	<?php echo $effectiveDate = date('Y-m-d', strtotime($sel_adm[0]['date'] . "+12 months") );?>	<br/><br/><br/>
					
</div>
        </div>
		
    </body>
</html>  
