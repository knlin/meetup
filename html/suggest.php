<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // load suggestion data
        $data = @file_get_contents("https://apiext.collegeboard.org/bscsuggestions/suggestions?q={$_POST['symbol']}&api-key=cbwww-e99be64d-d782-4fa7-a915-6a4a5b4185b2&callback=CB_JS_API.COLLEGE_SEARCH.parseResults");
        
        // parse CollegeBoard data into a list of symbols
        $result = [];
        $json = json_decode(substr($data, strlen('CB_JS_API.COLLEGE_SEARCH.parseResults('), -1));
        foreach ($json->suggestionResponses as $college)
            $result[] = $college->name;

        echo json_encode(['symbols' => $result]);
    }

?>
