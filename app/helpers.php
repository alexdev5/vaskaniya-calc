<?php
use App\Config;

function vConfig($name = '') {
    Config::get($name);
}

function dump($args) {
    echo '<pre>';
    var_dump($args);
    echo '<pre>';
}

function dd($args) {
    dump($args);
    die;
}

function view() {

}

function vLog($data) {
    error_log(print_r($data, 1));
}