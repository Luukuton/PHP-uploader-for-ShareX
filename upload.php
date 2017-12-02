<?php
$config = include('config.php');
$key = $config['secure_key'];
$sharexdir = $config['sharexdir'];
$domain_url = $config['domain_url'];
$lengthofstring = $config['lengthofstring'];

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

if ($_SERVER["REQUEST_URI"] == "/robot.txt") { die("User-agent: *\nDisallow: /"); }

$year = date("Y");
$month = date("m");
$day = date("d");
$hour = date("H");
$minute = date("i");
$filedate = $day."_".$hour.$minute;
$foldername = $year."-".$month;

if(file_exists($foldername)){echo 'Folder already exists. Uploading... ';}
else{
    mkdir($sharexdir.$foldername,0744);
}

if (isset($_POST['secret'])) {
    if ($_POST['secret'] == $key) {

        $filename = $filedate."-".RandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$foldername."/".$filename.'.'.$fileType))
        {
            echo $domain_url.$sharexdir.$foldername."/".$filename.'.'.$fileType;
        }
            else
        {
           echo 'File upload has failed';
        }
    }
    else
    {
        echo 'Secret key is invalid';
    }
}
else
{
    echo 'No post data was received';
}
