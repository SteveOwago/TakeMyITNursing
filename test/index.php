<?php

$curl = curl_init();
                $url ="https://services.marinetraffic.com/api/vfcsubscribe/669ffd9d9751427d28e6a07b90830a5d6807b6c4?scac=MAEU&tdId=COSU63445523421&tdType=BL";
                curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $response = curl_exec($curl);

                curl_close($curl);
            
            
            //echo $response;
            $data=json_decode($response ,true);
            $shipmentID =$data['subscription']['shipmentId']; //Access Shipment ID
            
            echo "The Shipment ID is: ".$shipmentID;





