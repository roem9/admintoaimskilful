<?php
    function day($n) {
        $n = intval($n);
        if ($n >= 11 && $n <= 13) {
            return "{$n}<sup>th</sup>";
        }
        switch ($n % 10) {
            case 1:  return "{$n}<sup>st</sup>";
            case 2:  return "{$n}<sup>nd</sup>";
            case 3:  return "{$n}<sup>rd</sup>";
            default: return "{$n}<sup>th</sup>";
        }
    }

    function tgl_sertifikat($tgl){
        $data = explode("-", $tgl);
        $hari = day($data[0]);
        $bulan = $data[1];
        $tahun = $data[2];

        if($bulan == "01") $bulan = "January";
        if($bulan == "02") $bulan = "February";
        if($bulan == "03") $bulan = "March";
        if($bulan == "04") $bulan = "April";
        if($bulan == "05") $bulan = "May";
        if($bulan == "06") $bulan = "June";
        if($bulan == "07") $bulan = "July";
        if($bulan == "08") $bulan = "August";
        if($bulan == "09") $bulan = "September";
        if($bulan == "10") $bulan = "October";
        if($bulan == "11") $bulan = "November";
        if($bulan == "12") $bulan = "December";

        return $hari . " of " . $bulan . " " . $tahun;
    }

    function tgl_lahir($tgl){
        $data = explode("-", $tgl);
        $tahun = $data[0];
        $bulan = $data[1];
        $hari = $data[2];

        if($bulan == "01") $bulan = "January";
        if($bulan == "02") $bulan = "February";
        if($bulan == "03") $bulan = "March";
        if($bulan == "04") $bulan = "April";
        if($bulan == "05") $bulan = "May";
        if($bulan == "06") $bulan = "June";
        if($bulan == "07") $bulan = "July";
        if($bulan == "08") $bulan = "August";
        if($bulan == "09") $bulan = "September";
        if($bulan == "10") $bulan = "October";
        if($bulan == "11") $bulan = "November";
        if($bulan == "12") $bulan = "December";

        return $bulan . " " . $hari . ", " . $tahun;
    }
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .logo{
            /* width: 210px; */
			position: absolute;
            left: 50px;
			top: 18px;
        }

        .qrcode{
            /* width: 210px; */
			position: absolute;
            right: 112px;
			bottom: 33px;
            font-size: 35px;
            word-spacing: 3px;
        }
        
        .no_doc{
            /* background-color: red; */
            width: 140px;
			position: absolute;
            right: 15px;
			top: 24px; 
            font-size: 12px;
            font-family: 'times';
            word-spacing: 3px;
        }

        .nama{
            /* background-color: red; */
            width: 470px;
			position: absolute;
            left: 160px;
			top: 148px;
            font-size: 24px;
            font-family: 'rockb';
            word-spacing: 3px;
        }

        .ttl{
            /* background-color: red; */
            width: 129px;
			position: absolute;
            left: 310px;
			top: 189px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }

        .gender{
            /* background-color: red; */
            width: 129px;
			position: absolute;
            left: 310px;
			top: 206px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }
        
        .country{
            /* background-color: red; */
            width: 129px;
			position: absolute;
            left: 310px;
			top: 223px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }

        .language{
            /* background-color: red; */
            width: 129px;
			position: absolute;
            left: 310px;
			top: 241px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }

        .t4{
            /* background-color: red; */
			position: absolute;
            <?php if(strlen($t4_lahir) < 12 ) echo 'width: 129px;';?>
            /* right: 229px; */
            left : 888px;
			top: 355px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }
        
        .listening{
            /* background-color: red; */
            width: 135px;
			position: absolute;
            right: 263px;
			top: 333px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }
        
        .structure{
            /* background-color: red; */
            width: 135px;
			position: absolute;
            right: 263px;
			top: 353px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }
        
        .reading{
            /* background-color: red; */
            width: 135px;
			position: absolute;
            right: 263px;
			top: 372px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }

        .nilai{
            /* background-color: red; */
            width: 135px;
			position: absolute;
            right: 263px;
			top: 392px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }

        .tgl{
			position: absolute;
            left: 155px;
			/* bottom: 65px; */
			bottom: 38px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }

        .tgl_akhir{
			position: absolute;
            left: 155px;
			bottom: 21px;
            font-size: 14px;
            font-family: 'times';
            word-spacing: 3px;
        }

        @page :first {
            background-image: url("<?= base_url()?>assets/img/sertifikat.jpg");
            background-image-resize: 6;
        }
        
    </style>
</head>
    <body style="text-align: center">
        <div class="logo">
            <img src="<?= base_url()?>/assets/logo/<?= $id_tes?>.png" width=<?= $size_logo?> alt="">
        </div>
        <div class="qrcode">
            <img src="<?= base_url()?>/assets/qrcode/<?= $id?>.png" width=75 alt="">
        </div>
        <div class="nilai"><p style="text-align: center; margin: 0px"><b><?= round($skor)?></b></p></div>
        <div class="nama"><p style="text-align: center; margin: 0px"><?= strtoupper($nama)?></p></div>
        <div class="ttl"><p style="margin: 0px"><?= tgl_lahir(date("Y-m-j", strtotime($tgl_lahir)))?></p></div>
        <div class="t4"><p style="text-align: center; margin: 0px;"><?= $t4_lahir?></p></div>
        <div class="gender"><p style="margin: 0px"><?= $jk?></p></div>
        <div class="country"><p style="margin: 0px"><?= $country?></p></div>
        <div class="language"><p style="margin: 0px"><?= $language?></p></div>
        <div class="listening"><p style="text-align: center; margin: 0px"><?= $listening?></p></div>
        <div class="structure"><p style="text-align: center; margin: 0px"><?= $structure?></p></div>
        <div class="reading"><p style="text-align: center; margin: 0px"><?= $reading?></p></div>
        <div class="no_doc"><p style="margin: 0px"><?= $no_doc?></p></div>
        <div class="tgl"><p style="text-align: center; margin: 0px"><b><?= tgl_sertifikat(date("d-m-Y", strtotime($tgl_tes)))?></b></p></div>
        <div class="tgl_akhir"><p style="text-align: center; margin: 0px"><b><?= tgl_sertifikat(date("d-m-Y", strtotime('+6 month', strtotime($tgl_tes))))?></b></p></div>
    </body>
</html>