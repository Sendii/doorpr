<?php
	$this->db->select('concat(first_name, " ", last_name) as nama_lengkap, pemenang_ke, email, instansi');
	$this->db->from('data_pemenang m');
	$this->db->join('peserta p', 'm.id_peserta = p.id');
	$this->db->order_by('pemenang_ke');
	$data = $this->db->get()->result();
	foreach ($data as $rows) {?>
	    <div style="font-family:'Oswald', Arial;color: #000;line-height:0.2;">
	        <?php if($rows->pemenang_ke == 1){echo "Pemenang Pertama";}
		        elseif($rows->pemenang_ke == 2){echo"Pemenang Kedua";}
		        elseif($rows->pemenang_ke == 3){echo"Pemenang Ketiga";}else{}
		    ?> :
	    </div>
	    <div style="font-family:'Oswald', Arial;color: #000;font-size: 25px;line-height:1.5;">&nbsp;&nbsp;&nbsp;
	        <?=$rows->nama_lengkap?></div>
	    <div style="font-family:'Oswald', Arial;color: #000;line-height:0.8;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rows->email?></div><br/>
	<?php
		}
	?>
