<?php

# Key used to authenticate
define("SECURE_KEY", "");

# Root folder for all uploads.
define("SHAREX_DIR", "i/");

# Domain url with trailing slash. Eg. https://google.com/
define("DOMAIN", "");

# Min 3, Max 13
define("FILENAME_LENGTH", 6);

# A prefix for every filename ; optional
define("FILE_NAME_PREFIX", "");

/* Available keys:
 *
 * {day}, {month}, {year}, {hour}, {minute}, {second}
 * {uniqid} - an unique 13 character long identifier
 *
 * Final path will be: {FOLDER_NAME_FORMAT}/{FILE_NAME_FORMAT}.{FILE_EXTENSION}
 * Final URL will be: {DOMAIN}/{SHAREX_DIR}/{FOLDER_NAME_FORMAT}/{FILE_NAME_FORMAT}.{FILE_EXTENSION}
 */

define("FOLDER_NAME_FORMAT", "{year}-{month}");
define("FILE_NAME_FORMAT", "{day}_{hour}{minute}-{uniqid}");
