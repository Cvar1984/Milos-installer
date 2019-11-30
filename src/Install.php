<?php
namespace Bhsec\Milos;

class Installer
{
    protected static $bin = '../../usr/bin/';
    protected static $liteOtp = 'https://raw.githubusercontent.com/Cvar1984/LiteOTP/master/build/main.phar';
    protected static $sqlScan = 'https://raw.githubusercontent.com/Cvar1984/sqlscan/dev/build/main.phar';
    public function install($tools)
    {
        switch ($tools) {
            case 'liteotp':
                $file = file_get_contents(self::$liteOtp);
                if (!$file) {
                    throw new \Exception('Can\'t download');
                }

                $write = fopen(self::$bin . $tools, 'w');
                if (!$write) {
                    throw new \Exception('Can\'t write');
                }

                fwrite($write, $file);
                fclose($write);
                $chmod = chmod(self::$bin . $tools, 0777);

                if (!$chmod) {
                    throw new \Exception('Can\'t chmod');
                }
                break;

            case 'sqlscan':
                $file = file_get_contents(self::$sqlScan);
                if (!$file) {
                    throw new \Exception('Can\'t download');
                }

                $write = fopen(self::$bin . $tools, 'w');
                if (!$write) {
                    throw new \Exception('Can\'t write');
                }

                fwrite($write, $file);
                fclose($write);

                $chmod = chmod(self::$bin . $tools, 0777);
                if (!$chmod) {
                    throw new \Exception('Can\'t chmod');
                }
                break;
        }
    }
}
