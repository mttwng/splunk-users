<?php

    $json = json_decode(file_get_contents('https://apps.splunk.com/api/v0/apps/?order=latest&offset=0&page=1'));


    $apps = $json->{'apps'};

    $count = 0;
    foreach ($apps as $app) {
    	$text = $app->{'name'};
    	$link = $app->{'id'};
        $info = str_replace("'", "", $app->{'pitch'});

        if (strlen($info) > 100)
            $info = substr($info, 0, 100) . '...';

    	echo "<p><a data-toggle='tooltip' title='" . $info . "\n\nauthor: " . $app->{'author_display_name'} . "\ndownloads: " . $app->{'downloads'} . 
        "' href='http://apps.splunk.com/app/" . $link . "' target='_blank'>" . $text . "</a></p>\n";

        $count++;
        if ($count == 12) {
            break;
         }

    }
?>

<!-- &#013; -->