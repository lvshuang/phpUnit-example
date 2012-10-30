<?php
require_once 'envInit.php';

EnvInit::init('dev');
Routing::routingDispatch();