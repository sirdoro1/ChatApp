<?php
require('vendor/autoload.php');

use ChatApp\Model\Message;

echo Message::all()->toJson();
