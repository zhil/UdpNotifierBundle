<?php
namespace Zhil\UdpNotifierBundle\Services;

//use UdpNotifier

class UdpNotifier
{
    private $serverConfigs = [];
    private $servers = [];

    public function __construct()
    {
    }

    public function setConfig($config)
    {
        $this->serverConfigs = $config["servers"];
    }

    public function sendNotification($name,$data)
    {
        foreach($this->getServers() as $serverInfo) {

        }
    }

    private function getServers()
    {
        if(count($this->servers)) {
            return $this->servers;
        }
        foreach($this->serverConfigs as $config) {
            if($config["enabled"]) {
//                $this->servers[] = new UdpNotifier()
            }
        }
    }
}