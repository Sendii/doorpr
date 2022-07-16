<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>DoorPrize</title>

<!--CSS-->
<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-light.css">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!--/CSS-->

<!--JS-->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.countdown.js"></script>
 --><!--/JS-->

</head>

<body>

<!--DARK OVERLAY-->
<div class="overlay"></div>
<!--/DARK OVERLAY-->

<!--WRAP-->
<div id="wrap">
	<!--CONTAINER-->
	<div class="container">
		<!-- <img src="images/paperplane.png" alt="Paper Plane" class="image-align" /> -->
		<h1>
			<!-- <span>We are</span><br/> -->
			<!-- Door<span class="yellow">Prize</span> --><p><br/><br/><br/><br/><br/><br/><br/></p>
		</h1>
		<!-- <p>Bincang Online <strong>Seputar</strong> Kebijakan Dan Implementasi<br/> <strong>Keselamatan Konstruksi.</strong><br/>Sabtu 4 Juli 2020</p> -->
		<!-- <div id="defaultCountdown"></div> -->
		<h1>
		<div id="demo">Nama Peserta</div>
		</h1>
		<!-- <form action="#"> -->
			<p id="button">
			<!-- <input type="text" name="email" id="email" value="Subscribe to fond out when we are done"> -->
			<!-- <div></div> -->
			<input type="submit" onclick="start();" style="background: #27ad0e" value="Mulai...!!!">
			</p>
		<!-- </form> -->
		<!-- <p class="copyright">Lembaga Pengembangan Dan Konsultasi Nasional (<a href="https://diklatonline.id" target="_blank">LPKN</a>)</p> -->
	</div>
	<!--/CONTAINER-->
</div>
<!--/WRAP-->
<script type="text/javascript">
var myArray = [<?=$peserta?>];

// document.body.innerHTML = randomItem;
function start(){
	function mulai(){
		t = setTimeout(mulai,10);
		var randomItem = myArray[Math.floor(Math.random()*myArray.length)];
		document.getElementById("demo").innerHTML = randomItem;
	}
	mulai();
	document.getElementById("button").innerHTML = '<input type="submit" onclick="stop();" style="background: #ff0303" value="Berhenti...!!!">';
}

function stop() {
  	clearTimeout(t);
	document.getElementById("button").innerHTML = '<input type="submit" onclick="start();" style="background: #27ad0e" value="Mulai...!!!">';
}


</script>
</body>
</html>
