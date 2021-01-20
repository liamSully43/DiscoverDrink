<?php
    function search() {
        $service_url = "https://wzqgwjdjbjnyqun-db202101121708.adb.uk-london-1.oraclecloudapps.com/ords/admin/api/test/test";
        $curl = curl_init($service_url);
        $curl_response = curl_exec($curl);
        if($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. ' . var_export($info));
        }

        curl_close($curl);
        $decoded = json_decode($curl_response);
        if(isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            die('error occured. ' . $decoded->response->errormessage);
        }
        echo "response ok!";
        var_export($decoded->response);
    }   
?>