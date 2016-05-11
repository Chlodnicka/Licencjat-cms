<?php
/**
 * Runs application and loads configs and framework Laravel
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 *
 * @copyright (c) 2016 Maja Chłodnicka
 * @link http://leszczyna.wzks.uj.edu.pl/~13_chlodnicka/projekt
 */

require __DIR__.'/../bootstrap/autoload.php';
$app = require_once __DIR__.'/../bootstrap/start.php';

$app->run();
