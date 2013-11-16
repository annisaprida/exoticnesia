<?php

class Helper extends CApplicationComponent {

    public static function createFolder($path) {
        mkdir($path, 0755);
    }

    public static function deleteFolder($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */
}