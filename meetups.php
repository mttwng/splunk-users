<?php
 	
 	$feed_url = "http://splunk.meetup.com/newest/rss/New+Splunk+Groups";
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
         
    $count = 0;
    foreach($x->channel->item as $entry) {
        echo "<p><a target='_blank' href='$entry->guid' title='$entry->title'>" . $entry->title . "</a></p>\n";
        $count++;
        if ($count == 12) {
            break;
         }

    }

?>