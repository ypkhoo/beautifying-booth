<?php
    ini_set("include_path", '/home/photoboo/php:' . ini_get("include_path") );
    $PHOTODATA = $_POST["photoData"];
	$obj = json_decode($PHOTODATA); 
	
	$photo = $obj->base64Image; 

    $APIKEY = "REGISTER WITH FACE++ TO GET YOUR OWN API KEY";
    $APISECRET = "REGISTER WITH FACE++ TO GET YOUR OWN API SECRET";
    
    $curl = curl_init();   
    curl_setopt_array($curl, array(
       CURLOPT_URL => "https://api-cn.faceplusplus.com/facepp/v2/beautify", 
       CURLOPT_RETURNTRANSFER => true, 
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "POST",
       CURLOPT_POSTFIELDS => array('image_base64'=>"$photo", 'api_key'=>"$APIKEY",'api_secret'=>"$APISECRET",'whitening'=>25,'smoothing'=>25, 'thinface'=>25, 'shrink_face'=>25, 'enlarge_eye'=>25, 'remove_eyebrow'=>25), 
       CURLOPT_HTTPHEADER => array("cache-control: no-cache",),
       ));   
    $response = curl_exec($curl);
    $err = curl_error($curl);   
    curl_close($curl);   
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }

    header('Content-Type:application/json'); 
	//$arr = ["path" => '123']; 
    //echo json_encode($arr); 
?> 