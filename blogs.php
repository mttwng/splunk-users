<?php
    $ch = curl_init('http://blogs.splunk.com/');
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

    $nodes = $doc->query('//div[@class="post postExcerpt"]');
    $count = 0;
    foreach ($nodes as $node) {
        $post = $node->firstChild->nextSibling;
        $text = $post->nodeValue;
        $link = $post->getAttribute('href');

        $excerpt = $post->nextSibling->nextSibling->nodeValue;
        $excerpt = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $excerpt));

        if (strlen($excerpt) > 100)
            $excerpt = substr($excerpt, 1, 100) . '...';

        echo "<p><a data-toggle='tooltip' title='" . $excerpt . "' href='" . $link . "' target='_blank'>" . $text . "</a></p>\n";

        $count++;
        if ($count == 20) {
            break;
        }

    }

    // $nodes = $doc->query('//div[@class="post postExcerpt"]/a');
    // $count = 0;
    // $isOdd = true;
    // foreach ($nodes as $node) {
    //     if ($isOdd) {
    //         $text = $node->nodeValue;
    //         $link = $node->getAttribute('href');
    //         echo "<p><a href='" . $link . "' target='_blank'>" . $text . "</a></p>\n";

    //         $count++;
    //         if ($count == 20) {
    //             break;
    //         }
    //     }
    //     $isOdd = ! $isOdd;

    // }

?>