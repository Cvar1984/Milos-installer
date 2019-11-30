#!/usr/bin/env php
<?php
use Bhsec\Milos\Menu;
require __DIR__ . '/vendor/autoload.php';
try {
    $climate = new League\CLImate\CLImate();
    $menu = new Menu();
    $menu->showBanner();
    $menu->showMenu();
    $menu->showInput();
} catch (\Exception $e) {
    $climate->red($e);
    exit(1);
}
