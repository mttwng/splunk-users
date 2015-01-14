<?php
    $ch = curl_init('http://www.splunk.com/page/events');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    /* 
     * XXX: This is not a "fix" for your problem, this is a work-around.  You 
     * should fix your local CAs 
     */
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    /* Set a browser UA so that we aren't told to update */
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36');

    $res = curl_exec($ch);

    if ($res === false) {
        die('error: ' . curl_error($ch));
    }

    curl_close($ch);

    $d = new DOMDocument();
    @$d->loadHTML($res);

    $doc = new DOMXPath($d);

    $nodes = $doc->query('//div[@id="articleColumn"]/h2/a');
    $count = 0;
    foreach ($nodes as $node) {
        $text = $node->nodeValue;
        $link = $node->getAttribute('href');
        echo "<p><a href='" . $link . "' target='_blank'>" . $text . "</a></p>\n";

        $count++;
        if ($count == 12) {
            break;
        }

    }

?>