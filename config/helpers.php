<?php
class Helpers{
    public $asset_path;
    public $root_dir;
    public $base_url;
    public function __construct()
    {
        $this->base_url='http://localhost/~jobferrera/emc/';
        $this->root_dir= __DIR__;
        $this->asset_path=$this->base_url.'assets/';
    }

    public function asset($filename)
    {
        return  $this->asset_path . $filename;
    }

    public function baseUrl($route)
    {
        return $this->base_url .$route;
    }
}