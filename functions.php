<?php
    include("classes.php");

    /*****************************************************************************
     *                       function check network provider                     *
     *****************************************************************************/
    /*function checkProvider($data){
       
        if(substr($data, 4, 1) == "7"){
        return "Airtel";
        }elseif(substr($data, 4, 1) == "6"){
            return "MTN";
        }elseif(substr($data, 4, 1) == "5"){
            return "Zamtel";
        }else{
            return "Unknown";
        }
   
    }*/


     /*****************************************************************************
     *                       function check network provider updated              *
     ******************************************************************************/
    function checkJSONProvider($data){
        $status = "";
        $prov = "";
        $error = "";
        $providers = array("7"=> "Airtel", "6" => "MTN", "5" => "Zamtel");

        $niddle = substr($data, 4, 1);
        $x= $niddle;
        if(!array_key_exists($x, $providers)){
            $prov = "Unknown";
            $status = "Failure";
            $error = "Unrecognised number";
        }else{
            $prov = $providers[$x];
            $status = "Success";
        }

        $response = array("status"=> $status, "provider"=> $prov, "error"=> $error);
        return json_encode($response);

    }


     /******************************************************************************
     *                       function validate mobile                              *
     *******************************************************************************/
    function checkJSONmobile($data){
        $status = "";
        $prov = "";
        $error = "";
        $mobile = "";
        $prefix = "";
        $providers = array("7"=> "Airtel", "6" => "MTN", "5" => "Zamtel");

        $data = str_replace("(", "", $data);
        $data = str_replace(")", "", $data);
        $data = str_replace(" ", "", $data);
        $data = str_replace("-", "", $data);
        $data = str_replace("+", "", $data);

        if(strlen($data) == 12 || strlen($data) == 10 || strlen($data) == 9){

            if(ctype_alpha($data)){
                $status = "failure";
            }else{
                $data = (int) $data;
            }

            if(ctype_alnum($data)){
                $status = "failure";
            }
            
            if(is_numeric($data)){
                $data = (string) $data;
                if((strlen($data) == 12 || strlen($data) == 9)){
                    $status = "success";
                    if(strlen($data) == 9){
                        $data = "260".$data;
                        $mobile = $data;
                        $prefix = substr($data, 0, 3);
                    }
                    $mobile = $data;
                    $prefix = substr($data, 0, 3);
                }
            }else{
                $status = "failure";
            }
        }elseif(is_numeric($data)){
            $data = (string) $data;
            if(strlen($data) == 12 || strlen($data) == 9){
                $status = "success";
                if(strlen($data) == 9){
                    $data = "260".$data;
                    $mobile = $data;
                    $prefix = substr($data, 0, 3);
                }
                $mobile = $data;
                $prefix = substr($data, 0, 3);
            }else{
                $status = "failure";
            }
        }else{
            $status = "failure";
        }

        $niddle = substr($data, 4, 1);
        $x= $niddle;
        if(!array_key_exists($x, $providers)){
            $prov = "Unknown";
            $error = "Unrecognised number";
        }else{
            $prov = $providers[$x];
        }

        $response = array("status"=> $status, "provider"=> $prov, "error"=> $error, "mobile"=> $mobile, "prefix"=>$prefix);
        return json_encode($response);
    }

    function checkProvider($data){
        $providers = array("7"=> "Airtel", "6" => "MTN", "5" => "Zamtel");

        $niddle = substr($data, 4, 1);
        $x= $niddle;
        if(!array_key_exists($x, $providers)){
            return "Unknown";
        }else{
            return $providers[$x];
        }
    }


    function checkNumber($data){
        $data = str_replace("(", "", $data);
        $data = str_replace(")", "", $data);
        $data = str_replace(" ", "", $data);
        $data = str_replace("-", "", $data);

        if(strlen($data) == 13 || strlen($data) == 12 || strlen($data) == 10 || strlen($data) == 9){
            $data = (int) $data;
            if(is_numeric($data)){
                $data = (string) $data;
                if((strlen($data) == 12 || strlen($data) == 9)){
                    return "Yes";
                }
            }else{
                return "No";
            }
        }elseif(is_numeric($data)){
            $data = (string) $data;
            if(strlen($data) == 12 || strlen($data) == 9){
                return "Yes";
            }else{
                return "No";
            }
        }else{
            return "No";
        }
    }


     /******************************************************************************
     *                       function to check transaction                         *
     *******************************************************************************/
    Function checkTransaction($data)
    {
        $data = json_decode($data);
        $status_Code = $data->transaction->status_code;
    
        if($status_Code=="TS"){
            //If successful return “success:MP23….”
            return "Success:".$data->transaction->airtel_money_id;
            echo "<br>";
        }
    //Else
        else{
            //Return “failure:message
            return "Failure:".$data->transaction->message;
            echo "<br>";
        }
    } 

    /*****************************************************************************
     *                       function for validating country code                *
    ******************************************************************************/
    function countryFromCode($code)
    {
        $countries = array(
            '1' => 'United States',
            '7' => 'Russia',
            '20' => 'Egypt',
            '27' => 'South Africa',
            '30' => 'Greece',
            '31' => 'Netherlands',
            '32' => 'Belgium',
            '33' => 'France',
            '34' => 'Spain',
            '36' => 'Hungary',
            '39' => 'Italy',
            '40' => 'Romania',
            '41' => 'Switzerland',
            '43' => 'Austria',
            '44' => 'United Kingdom',
            '45' => 'Denmark',
            '46' => 'Sweden',
            '47' => 'Norway',
            '48' => 'Poland',
            '49' => 'Germany',
            '51' => 'Peru',
            '52' => 'Mexico',
            '53' => 'Cuba',
            '54' => 'Argentina',
            '55' => 'Brazil',
            '56' => 'Chile',
            '57' => 'Colombia',
            '58' => 'Venezuela',
            '60' => 'Malaysia',
            '61' => 'Australia',
            '62' => 'Indonesia',
            '63' => 'Philippines',
            '64' => 'New Zealand',
            '65' => 'Singapore',
            '66' => 'Thailand',
            '81' => 'Japan',
            '82' => 'South Korea',
            '84' => 'Vietnam',
            '86' => 'China',
            '90' => 'Turkey',
            '91' => 'India',
            '92' => 'Pakistan',
            '93' => 'Afghanistan',
            '94' => 'Sri Lanka',
            '95' => 'Myanmar',
            '98' => 'Iran',
            '212' => 'Morocco',
            '213' => 'Algeria',
            '216' => 'Tunisia',
            '218' => 'Libya',
            '220' => 'Gambia',
            '221' => 'Senegal',
            '222' => 'Mauritania',
            '223' => 'Mali',
            '224' => 'Guinea',
            '225' => 'Ivory Coast',
            '226' => 'Burkina Faso',
            '227' => 'Niger',
            '228' => 'Togo',
            '229' => 'Benin',
            '230' => 'Mauritius',
            '231' => 'Liberia',
            '232' => 'Sierra Leone',
            '233' => 'Ghana',
            '234' => 'Nigeria',
            '235' => 'Chad',
            '236' => 'Central African Republic',
            '237' => 'Cameroon',
            '238' => 'Cape Verde',
            '239' => 'São Tomé and Príncipe',
            '240' => 'Equatorial Guinea',
            '241' => 'Gabon',
            '242' => 'Congo',
            '243' => 'Democratic Republic of the Congo',
            '244' => 'Angola',
            '245' => 'Guinea-Bissau',
            '246' => 'British Indian Ocean Territory',
            '248' => 'Seychelles',
            '249' => 'Sudan',
            '250' => 'Rwanda',
            '251' => 'Ethiopia',
            '252' => 'Somalia',
            '253' => 'Djibouti',
            '254' => 'Kenya',
            '255' => 'Tanzania',
            '256' => 'Uganda',
            '257' => 'Burundi',
            '258' => 'Mozambique',
            '260' => 'Zambia',
            '261' => 'Madagascar',
            '262' => 'Réunion',
            '263' => 'Zimbabwe',
            '264' => 'Namibia',
            '265' => 'Malawi',
            '266' => 'Lesotho',
            '267' => 'Botswana',
            '268' => 'Swaziland',
            '269' => 'Comoros',
            '290' => 'Saint Helena',
            '291' => 'Eritrea',
            '297' => 'Aruba',
            '298' => 'Faroe Islands',
            '299' => 'Greenland',
            '350' => 'Gibraltar',
            '351' => 'Portugal',
            '352' => 'Luxembourg',
            '353' => 'Ireland',
            '354' => 'Iceland',
            '355' => 'Albania',
            '356' => 'Malta',
            '357' => 'Cyprus',
            '358' => 'Finland',
            '359' => 'Bulgaria',
            '370' => 'Lithuania',
            '371' => 'Latvia',
            '372' => 'Estonia',
            '373' => 'Moldova',
            '374' => 'Armenia',
            '375' => 'Belarus',
            '376' => 'Andorra',
            '377' => 'Monaco',
            '378' => 'San Marino',
            '379' => 'Vatican City',
            '380' => 'Ukraine',
            '381' => 'Serbia',
            '382' => 'Montenegro',
            '383' => 'Kosovo',
            '385' => 'Croatia',
            '386' => 'Slovenia',
            '387' => 'Bosnia and Herzegovina',
            '389' => 'North Macedonia',
            '420' => 'Czech Republic',
            '421' => 'Slovakia',
            '423' => 'Liechtenstein',
            '500' => 'Falkland Islands',
            '501' => 'Belize',
            '502' => 'Guatemala',
            '503' => 'El Salvador',
            '504' => 'Honduras',
            '505' => 'Nicaragua',
            '506' => 'Costa Rica',
            '507' => 'Panama',
            '508' => 'Saint Pierre and Miquelon',
            '509' => 'Haiti',
            '590' => 'Guadeloupe',
            '591' => 'Bolivia',
            '592' => 'Guyana',
            '593' => 'Ecuador',
            '594' => 'French Guiana',
            '595' => 'Paraguay',
            '596' => 'Martinique',
            '597' => 'Suriname',
            '598' => 'Uruguay',
            '599' => 'Curaçao',
            '670' => 'East Timor',
            '672' => 'Norfolk Island',
            '673' => 'Brunei',
            '674' => 'Nauru',
            '675' => 'Papua New Guinea',
            '676' => 'Tonga',
            '677' => 'Solomon Islands',
            '678' => 'Vanuatu',
            '679' => 'Fiji',
            '680' => 'Palau',
            '681' => 'Wallis and Futuna',
            '682' => 'Cook Islands',
            '683' => 'Niue',
            '685' => 'Samoa',
            '686' => 'Kiribati',
            '687' => 'New Caledonia',
            '688' => 'Tuvalu',
            '689' => 'French Polynesia',
            '690' => 'Tokelau',
            '691' => 'Micronesia',
            '692' => 'Marshall Islands',
            '850' => 'North Korea',
            '852' => 'Hong Kong',
            '853' => 'Macau',
            '855' => 'Cambodia',
            '856' => 'Laos',
            '880' => 'Bangladesh',
            '886' => 'Taiwan',
            '960' => 'Maldives',
            '961' => 'Lebanon',
            '962' => 'Jordan',
            '963' => 'Syria',
            '964' => 'Iraq',
            '965' => 'Kuwait',
            '966' => 'Saudi Arabia',
            '967' => 'Yemen',
            '968' => 'Oman',
            '970' => 'Palestine',
            '971' => 'United Arab Emirates',
            '972' => 'Israel',
            '973' => 'Bahrain',
            '974' => 'Qatar',
            '975' => 'Bhutan',
            '976' => 'Mongolia',
            '977' => 'Nepal',
            '992' => 'Tajikistan',
            '993' => 'Turkmenistan',
            '994' => 'Azerbaijan',
            '995' => 'Georgia',
            '996' => 'Kyrgyzstan',
            '998' => 'Uzbekistan',
            '1242' => 'Bahamas',
            '1246' => 'Barbados',
            '1264' => 'Anguilla',
            '1268' => 'Antigua and Barbuda',
            '1284' => 'British Virgin Islands',
            '1340' => 'U.S. Virgin Islands',
            '1345' => 'Cayman Islands',
            '1441' => 'Bermuda',
            '1473' => 'Grenada',
            '1649' => 'Turks and Caicos Islands',
            '1664' => 'Montserrat',
            '1670' => 'Northern Mariana Islands',
            '1671' => 'Guam',
            '1684' => 'American Samoa',
            '1721' => 'Sint Maarten',
            '1758' => 'Saint Lucia',
            '1767' => 'Dominica',
            '1784' => 'Saint Vincent and the Grenadines',
            '1787' => 'Puerto Rico',
            '1809' => 'Dominican Republic',
            '1829' => 'Dominican Republic',
            '1849' => 'Dominican Republic',
            '1868' => 'Trinidad and Tobago',
            '1869' => 'Nevis',
            '1876' => 'Jamaica',
            // ... add more country codes as needed
        ); 

        if (array_key_exists($code, $countries)) {
            return $countries[$code];
        }
        else
        {
            return  "Unknown";
        }
    }
    /******************************************************************************
     *                       function in the class Record                         *
     ******************************************************************************/
    function storeRecord($json)
    {
        $record= new Record($json);
        return $record->checkQuestType();
    }

    function userHistory($data, $userRecords){
        $myRecords = json_decode($userRecords, true);
        $json = json_decode($data);
        $sessionCode = $json->msisdn;

        var_dump( $myRecords);
        echo "<br>";
        var_dump($json);

        /*foreach($myRecords as $record){
            if($record == $sessionCode && )
        }*/
    }
?>