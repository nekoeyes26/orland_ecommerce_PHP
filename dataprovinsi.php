<?php
    $curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: 8f22875183c8c65879ef1ed0615d3371"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

    if($err){
        echo "curl Error #:".$err;
    } else{
        $array_response = json_decode($response,TRUE);
        $dataprovinsi = $array_response["rajaongkir"]["results"];

        echo "<option value=''>--Pilih Provinsi--</option>";

        foreach($dataprovinsi as $key => $tiap_provinsi){
            echo "<option value='".$tiap_provinsi["province_id"]."' id_provinsi='".$tiap_provinsi["province_id"]."'>";
            echo $tiap_provinsi["province"];
            echo "</option>";

        }
    }
?>