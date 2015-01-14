<?php
    $ch = curl_init('http://wiki.splunk.com/index.php?title=Special:RecentChanges&hideminor=1&limit=100');
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

    $nodes = $doc->query('//ul[@class="special"]/li/a');

    $count = 0;
    foreach ($nodes as $node) {
        $link = $node->getAttribute('href');
        if (strpos($link,'&action=history') !== false) {
            $doc_link = str_replace('&action=history', '', $link);
            $full_text = $node->getAttribute('title');
            $text = str_replace('Documentation:', '', $full_text);
            $text = str_replace(':', ': ', $text);
            $docs_splunk = 'http://docs.splunk.com';
            echo "<p><a href='" . $docs_splunk . $doc_link . "' target='_blank'>" . $text . "</a> (<a href='" . $docs_splunk . $link . "' target='_blank'>hist</a>)</p>\n";

            $count++;
            if ($count == 12) {
                break;
            }
         }
         

    }


?>