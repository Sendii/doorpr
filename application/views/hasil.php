<?php
	$this->db->select('first_name as nama_lengkap, pemenang_ke');
	$this->db->from('data_pemenang m');
	$this->db->join('peserta p', 'm.id_peserta = p.id');
	$this->db->order_by('pemenang_ke');
	$data = $this->db->get()->result();
	foreach ($data as $rows) {?>
	    <div style="font-family:'Oswald', Arial;color: #fff;line-height:2.0; text-align: left;">
	    	<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
	        <?php if($rows->pemenang_ke == 1){echo "Pemenang";}
		        elseif($rows->pemenang_ke == 2){echo"Pemenang ke-2";}
		        elseif($rows->pemenang_ke == 3){echo"Pemenang ke-3";}else{}
		    ?> :
	    </div>
	    <div style="font-family:'Oswald', Arial;color: #fff;font-size: 25px;line-height:1.3; text-align: left;">
	        <?=$rows->nama_lengkap?></div>
	        <!--<hr></hr>-->
	    <!--<div style="font-family:'Oswald', Arial;color: #fff;line-height:0.8;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><br/>-->
	<?php
		}
	?>
