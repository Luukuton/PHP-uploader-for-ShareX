# PHP-uploader-for-ShareX

This is a custom PHP uploader made for uploading files to your server with ShareX.

Place the upload.php to your webroot (eg. /var/www/example.com/upload.php) and the config.php to anywhere you like (just change the location in upload.php: `$config = include('config.php');`).

Open <b>ShareX</b>, click <b>Destinations</b>, click <b>Destination Settings</b>, scroll down until you find <b>Custom uploaders</b> and add a new uploader with following settings:
 ![ShareX settings](https://i.imgur.com/Ackyu7J.png)
 
## Troubleshooting
* Make sure that the folder used for uploading has at least 744 permissions. `sudo chmod 744 i`
* Also make sure www-data (or equivalent) is the owner and group of the upload folder. `sudo chown www-data:www-data i`
