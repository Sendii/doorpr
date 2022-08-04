<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DoorPrize</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />

	<link href="<?=base_url()?>assets/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jquery.fireworks.js"></script>
</head>
<script>
	$(document).ready(function() {
		$('form.jsform').on('submit', function(form){
			form.preventDefault();
			$.post('<?=base_url()?>welcome/simpan', $('form.jsform').serialize(), function(data){
				$('#hasil_pemenang').html(data);
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function() {
			$('#imgs').fireworks();
		});
	});
</script>
<body class="hold-transition layout-top-nav">
	<div class="wrapper">
		<audio id="myAudio"><source src="<?=base_url()?>assets/sorak.mp3" type="audio/mpeg"></audio>
			<div class="content-wrapper" style="background-color: #000; background-repeat: no-repeat; background-size: auto;">
				<div class="content-header">

					<div class="container" style="padding-left: 50.5px;margin-left:0;max-width: 1300px;">
						<div class="row mb-2">
							<div class="col-sm-3">
								<form action="" id="formCustom">
									<!-- <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea> -->
									<input type="file" class="form-control" name="list_nama" required>
									<button class="btn btn-primary btn-sm mt-1 float-right" id="btnUpload">Upload</button>
								</form>
							</div>
							<div class="col-sm-6" id="imgs">

							</div>
							<div class="col-sm-3">
								<br/>
								<br/>
								<br/>
								<br/>
								<h5 class="m-0" style="font-family:'Oswald', Arial;color: #fff;font-size: 35px;line-height:1.2; text-align: left;">Pemenang :</h5>
								<form action="<?=base_url()?>welcome/simpan" method="post" class="jsform" id="myform">
									<input type="hidden" name="nama" id="nama">
									<input type="hidden" name="nama_alias" id="nama_alias">
									<input type="hidden" name="ke" id="ke">
								</form>
								<div id="hasil_pemenang"><?php include "hasil.php"; ?></div>
							</div>
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
					<div class="container">
						<div class="row mb-2">
							<div class="col-sm-12">
								<div class="text-center" style="color: #fff;line-height:1;">
									<h1 style="font-family:'Oswald', Arial;font-size: 65px;line-height:1;" id="demo">---- ---- ----</h1>
								</div>
								<br/>
								<br/>
								<div class="text-center" id="button">
									<button class="btn btn-success btn-lg" onclick="start();" autofocus style="font-size: 25px;">Mulai...!!!</button>
								</div>
								<br/>
								<br/>
								<div class="text-center" style="color: #ffc107;">
									<h1 style="font-family:'Oswald', Arial;font-size: 35px;" id="pemenang"></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</body>
	<script type="text/javascript">
		var myArray = [];

		var myArray2 = [<?=$data_urutanpemenang?>];
		console.log(myArray2);

		function handleClick(tuk) {
			var pemenang = tuk.value;
			if(pemenang == 3){
				document.getElementById("pemenang").innerHTML = 'Pemenang ke-3 :<br/>';
				document.getElementById("demo").innerHTML = "---- ---- ----";
				document.getElementById("button").innerHTML = '<button class="btn" autofocus><img onclick="start();" src="<?=base_url()?>assets/dist/img/start.png"></button>';
				document.getElementById("ke").value = 3;
			}else if(pemenang == 2){
				document.getElementById("pemenang").innerHTML = 'Pemenang ke-2 :<br/><br/>';
				document.getElementById("demo").innerHTML = "---- ---- ----";
				document.getElementById("button").innerHTML = '<button class="btn" autofocus><img onclick="start();" src="<?=base_url()?>assets/dist/img/start.png"></button>';
				document.getElementById("ke").value = 2;
			}else if(pemenang == 1){
				document.getElementById("pemenang").innerHTML = 'Pemenang ke-1 :<br/> <br/>';
				document.getElementById("demo").innerHTML = "---- ---- ----";
				document.getElementById("button").innerHTML = '<button class="btn" autofocus><img onclick="start();" src="<?=base_url()?>assets/dist/img/start.png"></button>';
				document.getElementById("ke").value = 1;
			}else{
				document.getElementById("pemenang").innerHTML = '';
				document.getElementById("demo").innerHTML = "---- ---- ----";
			}
		}
		$('#btnUpload').click(function(e){
			$('#btnUpload').prop('disabled', true).text('Loading...')
			e.preventDefault();
			insertData()
		})

		function getData(){
			$.ajax({
				type: 'get',
				url: " <?= base_url('/') ?>",
				data: {
					method: 'fetch'
				},
				beforeSend: function(){
				},
				success: function(res) {					
					var res = JSON.parse(res)
					var arr = []
					$.each(res, function(ke, va){
						arr.push(va.first_name)
					})
					myArray = arr
					console.log(myArray)
				},
				error: function(err){
				}
			});
		}

		function insertData(){
			var form_data = new FormData($('#formCustom')[0]);
			form_data.append('file', $('[name="list_nama"]').prop('files')[0]);
			form_data.append('method', 'create');

			$.ajax({
				type: 'post',
				url: " <?= base_url('/') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				beforeSend: function(){
                  // console.log(11)
              },
              success: function(res) {
              	let res22 = JSON.parse(res)
              	console.log(res22.code)
              	if(res22.code == 400){
              		var msg = res22.message.replace('<p>', '')
              		msg = msg.replace('</p>', '')
              		alert(msg)
              	}else{
              		alert('sukses upload')    
              		getData()          	
              	}              	
              },
              error: function(err){
                  // console.log(err.responseText)
              },
              complete: function(){
              	$('#btnUpload').prop('disabled', false).text('Upload')
              }
          });
		}

		const maskify = (names, limit=8) => {
			let _prNames = names.slice(0, limit) + names.slice(limit, names.length).replace(/[a-zA-Z0-9]/g, '*')
			_prNames = _prNames.replace(/[~|!|@|#|$|%|^|&|(|)|_|=|+|\|'|"|;|:|/|?|.|>|,|<]/g, '*').replace('[', '*').replace(']', '*').replace('|', '*').replace('{', '*').replace('}', '*').replace('\\', '*').replace('-', '*')
			return _prNames
		}

		function start(){
			getData()

			setTimeout(function(){
				function mulai(){
					t = setTimeout(mulai,5);
					var floor = Math.floor(Math.random()*myArray2.length)
					let _nama = myArray[floor].split(' ')
					console.log(_nama.length)
					let _rahasia = '*'
					var _fix = maskify(myArray[floor])
					// if(_nama.length == 1){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3))
					// }
					// if(_nama.length == 2){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length)
					// }
					// if(_nama.length == 3){
					// 	console.log(_nama[0].length)
					// 	if(_nama[0].length != 3){
					// 		_fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length)
					// 	}else{
					// 		_fix = _nama[0].replace(_nama[0].slice(2), _rahasia.repeat(2)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length)
					// 	}
					// }
					// if(_nama.length == 4){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length)
					// }
					// if(_nama.length == 5){
					// 	if (_nama[0].length != 3) {
					// 		var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length) + ' ' + _rahasia.repeat(_nama[4].length)
					// 	}else{
					// 		var _fix = _nama[0] + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length) + ' ' + _rahasia.repeat(_nama[4].length)
					// 	}
					// }
					// if(_nama.length == 6){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length) + ' ' + _rahasia.repeat(_nama[4].length) + ' ' + _rahasia.repeat(_nama[5].length)
					// }

					// if(_nama.length == 7){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length) + ' ' + _rahasia.repeat(_nama[4].length) + ' ' + _rahasia.repeat(_nama[5].length) + ' ' + _rahasia.repeat(_nama[6].length)
					// }

					// if(_nama.length == 8){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length) + ' ' + _rahasia.repeat(_nama[4].length) + ' ' + _rahasia.repeat(_nama[5].length) + ' ' + _rahasia.repeat(_nama[6].length) + ' ' + _rahasia.repeat(_nama[7].length)
					// }

					// if(_nama.length == 9){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length) + ' ' + _rahasia.repeat(_nama[4].length) + ' ' + _rahasia.repeat(_nama[5].length) + ' ' + _rahasia.repeat(_nama[6].length) + ' ' + _rahasia.repeat(_nama[7].length) + ' ' + _rahasia.repeat(_nama[8].length)
					// }

					// if(_nama.length == 10){
					// 	var _fix = _nama[0].replace(_nama[0].slice(3), _rahasia.repeat(3)) + ' ' + _rahasia.repeat(_nama[1].length) + ' ' + _rahasia.repeat(_nama[2].length) + ' ' + _rahasia.repeat(_nama[3].length) + ' ' + _rahasia.repeat(_nama[4].length) + ' ' + _rahasia.repeat(_nama[5].length) + ' ' + _rahasia.repeat(_nama[6].length) + ' ' + _rahasia.repeat(_nama[7].length) + ' ' + _rahasia.repeat(_nama[8].length) + ' ' + _rahasia.repeat(_nama[9].length)
					// }

					document.getElementById("demo").innerHTML = _fix;
					document.getElementById("nama").value = myArray[floor];

					var ea2 = myArray2[floor]              
					setTimeout(function(){
						if(typeof(ea2) !== "undefined" && ea2 == 1 || ea2 == 2 || ea2 == 3){
							document.getElementById("demo").innerHTML = _fix;
							document.getElementById("nama_alias").value = _fix;
							document.getElementById("nama").value = myArray[floor];
							stop()
						}
					}, 3000)      
				}
				mulai();
			}, 300)
    // document.getElementById("button").innerHTML = '<button id="stop" class="btn btn-danger btn-lg" onclick="stop();" autofocus style="font-size: 25px;">Stop...!!!</button>';
    // document.getElementById("button").innerHTML = '<button class="btn" onclick="stop();" autofocus><img src="<?=base_url()?>assets/dist/img/stop.png"></button>';
    document.getElementById("button").innerHTML = '';
    document.getElementById("stop").focus();
}

function stop() {
	clearTimeout(t);
	document.getElementById("button").innerHTML = '<button id="start" class="btn" onclick="start();" autofocus style="font-size: 25px;"><img src="<?=base_url()?>assets/dist/img/ulang.png"></button> <button type="submit" class="btn" form="myform"><img src="<?=base_url()?>assets/dist/img/simpan.png"></button>';
	document.getElementById("start").focus();
	// document.getElementById("myAudio").play();
}

</script>


<!-- jQuery -->

<!-- <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
