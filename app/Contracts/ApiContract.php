<?php
namespace App\Contracts;

interface ApiContract
{
    public static  function register();
    public static function route(string $name = ''): string;
}