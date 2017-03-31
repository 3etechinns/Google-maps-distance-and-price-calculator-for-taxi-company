<?php
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            die('Are you hacker?');
        }

        $departure_address = urlencode($_POST["departure_address"]);
        $arrival_address = urlencode($_POST["arrival_address"]);
        $vehicle_type = $_POST['vehicleType'];

        if (strpos($departure_address, "Budapest") !== false && strpos($arrival_address, "Budapest") !== false) {
            $aOutput = array("FIX tariff in Budapest");
            $sOutput = html_entity_decode(json_encode($aOutput));

            echo $sOutput;
            die();
        }

        $carPricePerKm = 200; //Ft
        $minibusPricePerKm = 390; //Ft

        $googleUrl = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$departure_address&destinations=$arrival_address&mode=car&language=hu-HU&key=AIzaSyDMXK4ypiNmIWaEuNrKILFcTY3Wjvh973Y";

        $sDataFromGoogleJson = file_get_contents($googleUrl);

        $oDataFromGoogle = json_decode($sDataFromGoogleJson);

        //if error
        $aOutput = array("Error in this calculation. Try other destination.");
        $sOutput = html_entity_decode(json_encode($aOutput));

        if ($vehicle_type == "car") {
            $price = intval($oDataFromGoogle->rows[0]->elements[0]->distance->text) * $carPricePerKm;

        } elseif ($vehicle_type == "minibus") {
            $price = $oDataFromGoogle->rows[0]->elements[0]->distance->text * $minibusPricePerKm;

        } else {
            $price = $oDataFromGoogle->rows[0]->elements[0]->distance->text * $carPricePerKm;

        }

        $aOutput = array(
            $oDataFromGoogle->status,
            $oDataFromGoogle->origin_addresses[0],
            $oDataFromGoogle->destination_addresses[0],
            $oDataFromGoogle->rows[0]->elements[0]->distance->text,
            $oDataFromGoogle->rows[0]->elements[0]->duration->text,
            $price
        );

        $sOutput = html_entity_decode(json_encode($aOutput));

        echo $sOutput;

        die();