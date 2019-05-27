<html>
<body>
<form method="POST" action='editgig.php'>
    <?php

    $xmlfile = simplexml_load_file('htaccess/gigs.xml');

    foreach ($xmlfile->gigs->gig as $gig) {
        $title = $gig->title;
        $details = $gig->details;
        $artistsperforming = $gig->artistsperforming;
        $artistslink = $gig->artistslink;
        $date = $gig->date;
        $doortime = $gig->doortime;
        $genre = $gig->genre;
        echo "<input type='text' name='title' value='$title'>
              <input type='text' name='details' value='$details'>
              <input type='text' name='artistsperforming' value='$artistsperforming'>
              <input type='text' name='artistslink' value='$artistslink'>
              <input type='text' name='date' value='$date'>
              <input type='text' name='doortime' value='$doortime'>
              <input type='text' name='genre' value='$genre'>
              <br>";

    }
    ?>
    <input name="save" type="submit" />

    <?php
    $xml = simplexml_load_file('htaccess/gigs.xml');
    $gigs = $xml->xpath('gig');

    $count = 0;
    if (isset($_POST['save'])){
        foreach($gigs as $item) {
            unset($item[0]);
        }

        while($_POST['title'] != null){
            $gig = $xml->xpath('gigs')->addChild('gig');

            $gig->addChild('title', $_POST['title']);
            $gig->addChild('details', $_POST['details']);
            $gig->addChild('artistsperforming', $_POST['artistsperforming']);
            $gig->addChild('artistslink', $_POST['artistslink']);
            $gig->addChild('date', $_POST['date']);
            $gig->addChild('doortime', $_POST['doortime']);
            $gig->addChild('genre', $_POST['genre']);

            $count++;
        }
    }
    $xml->saveXML('htaccess/gigs.xml');
    ?>
</form>
</body>
</html>
