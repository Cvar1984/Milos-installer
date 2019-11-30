<?php
namespace Bhsec\Milos;

class Menu
{
    protected static $dir = __DIR__ . '/../assets';
    public function showMenu()
    {
        $climate = new \League\CLImate\CLImate();
        $climate->redTable(
            [
                [
                    'name'        => 'LiteOTP',
                    'lang'        => 'php',
                    'description' => 'multi spam sms otp',
                ],
                [
                    'name'        => 'sqlscan',
                    'lang'        => 'php',
                    'description' => 'quick sql scanners',
                ],
            ]
        );
        $climate->bold()->backgroundBlue()->border();
    }
    public function showBanner()
    {
        $climate = new \League\CLImate\CLImate();
        $climate->clear();
        $climate->addArt(self::$dir . '/text');
        $climate->animation('assets/text')->run();
        $climate->clear();
        $climate->bold()->backgroundBlue()->border();
    }
    public function showInput()
    {
        $climate = new \League\CLImate\CLImate();
        $milos = new \Bhsec\Milos\Installer();
        $options  = [
            'liteotp' => 'LiteOTP',
            'sqlscan' => 'sqlscan'
        ];
        $input    = $climate->green()->bold()->checkboxes('Please send me all of the following:', $options);
        $response = $input->prompt();
        $progress = $climate->green()->progress()->total(count($response));

        foreach ($response as $key => $response) {
            $milos->install($response);
            $progress->current($key + 1, $response);
            usleep(1000000);
        }
        $climate->clear();
        $climate->red('Done!');
    }
}
