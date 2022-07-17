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
    <!-- <div class="card"> -->
<div class="wrapper">
  <div class="content-wrapper" style="background-color: #000; background-repeat: no-repeat; background-size: auto;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container" style="padding-left: 50.5px;margin-left:0;max-width: 1300px;">
        <div class="row mb-2">
          <div class="col-sm-3">
            <br/>
            <br/>
            <br/>
            
            
            <br/>
            <br/>
            <!-- <br/>
              <div class="icheck-success d-inline" style="line-height:2;">
                <input type="radio" id="pertama" name="tuk" value="1" onclick="handleClick(this);"> 
                <label for="pertama">
                  <h4 class="m-0" style="font-family:'Oswald', Arial;color: #fff;">Pemenang ke-1</h4>
                </label>
              </div>
            <br/>
              <div class="icheck-success d-inline" style="line-height:2;">
                <input type="radio" id="kedua" name="tuk" value="2" onclick="handleClick(this);"> 
                <label for="kedua">
                  <h4 class="m-0" style="font-family:'Oswald', Arial;color: #fff;">Pemenang Ke-2</h4>
                </label>
              </div>
            <br/>
              <div class="icheck-success d-inline" style="line-height:2;">
                <input type="radio" id="ketiga" name="tuk" value="3" onclick="handleClick(this);"> 
                <label for="ketiga">
                  <h4 class="m-0" style="font-family:'Oswald', Arial;color: #fff;">Pemenang Ke-3</h4>
                </label>
              </div> -->
            <br/><br/><br/><br/>
          </div><!-- /.col -->
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
              <input type="hidden" name="ke" id="ke">
            </form>
            <div id="hasil_pemenang"><?php include "hasil.php"; ?></div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
              <!--<br/><br/><br/><br/><br/>-->
            <div class="text-center" style="color: #fff;line-height:1;">
              <!-- <h1 style="font-family:'Oswald', Arial;font-size: 75px;">--- --- ---/h1> -->
              <h1 style="font-family:'Oswald', Arial;font-size: 65px;line-height:1;" id="demo">---- ---- ----</h1>
            </div>
            <br/>
            <!--<br/>-->
            <!--<br/>-->
            <br/>
            <div class="text-center" id="button">
              <button class="btn btn-success btn-lg" onclick="start();" autofocus style="font-size: 25px;">Mulai...!!!</button>
            </div>
            <br/>
            <br/>
            <div class="text-center" style="color: #ffc107;">
              <!-- <h1 style="font-family:'Oswald', Arial;font-size: 75px;">--- --- ---/h1> -->
              <h1 style="font-family:'Oswald', Arial;font-size: 35px;" id="pemenang"></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->
  </div>
</div>

<audio id="myAudio">
  <source src="<?=base_url()?>assets/sorak.mp3" type="audio/mpeg">
</audio>
<script type="text/javascript">
  
  var myArray = [<?=$peserta?>];

  var myArray2 = [<?=$data_urutanpemenang?>];

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

  function start(){
    function mulai(){
      t = setTimeout(mulai,5);
      var randomItem = myArray[Math.floor(Math.random()*myArray.length)];
      document.getElementById("demo").innerHTML = randomItem;
      document.getElementById("nama").value = randomItem;

      // setTimeout(function(){
      //   stop()
      // }, 3000)
      var floor = Math.floor(Math.random()*myArray2.length)
      // console.log(floor)
      var ea2 = myArray2[floor]
      console.log(myArray[floor])
      if(typeof(ea2) !== "undefined" && ea2 == 1){
        document.getElementById("demo").innerHTML = myArray[floor];
        document.getElementById("nama").value = myArray[floor];
        stop()
      }
    }
    mulai();
    // document.getElementById("button").innerHTML = '<button id="stop" class="btn btn-danger btn-lg" onclick="stop();" autofocus style="font-size: 25px;">Stop...!!!</button>';
    document.getElementById("button").innerHTML = '<button class="btn" onclick="stop();" autofocus><img src="<?=base_url()?>assets/dist/img/stop.png"></button>';
    document.getElementById("stop").focus();
  }

  function stop() {
      clearTimeout(t);
    document.getElementById("button").innerHTML = '<button id="start" class="btn" onclick="start();" autofocus style="font-size: 25px;"><img src="<?=base_url()?>assets/dist/img/ulang.png"></button> <button type="submit" class="btn" form="myform"><img src="<?=base_url()?>assets/dist/img/simpan.png"></button>';
    document.getElementById("start").focus();
    document.getElementById("myAudio").play();
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
