<?php


namespace App\Console;


class Generator
{
    public function generate($path, $template, $token, $replacement)
    {
        $template = $this->getTemplate($template);
        $content = preg_replace("/\{\{( *)$token( *)\}\}/", $replacement, $template);

        if (file_exists($path)) {
            echo "[!] Cannot generate '".basename($path)."': File exists\n";
            exit(-1);
        }

        file_put_contents($path, $content);
    }

    public function getTemplate($t)
    {
        global $app;
        $file = AppConsole::$root_dir . "/resources/templates/{$t}.template";
        return file_get_contents($file);
    }
}