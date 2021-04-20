# PHP-uploader-for-ShareX

A custom PHP uploader used with ShareX.

1. Create a directory for uploads in the webroot with `mkdir i` and make sure that it has at least 755 permissions: `chmod 755 i`.
2. Change the owner and/or group of the upload directory to www-data (or equivalent) with `chown www-data:www-data i`

3. Place the upload.php to the webroot (e.g. /var/www/example.com/upload.php) and the config.php to anywhere you like (just change the path in upload.php: `$config = include('config.php');`).

4. Open <b>ShareX</b>, click <b>Destinations</b>, click <b>Destination Settings</b>, scroll down until you find <b>Custom uploaders</b> and add a new uploader with the following settings:

 ![ShareX settings](https://i.imgur.com/Ackyu7J.png)
