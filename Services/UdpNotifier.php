<?php
namespace Zhil\UdpNotifierBundle\Services;

use Zhil\UdpNotifier\Notifier;

class UdpNotifier
{
    private $serverConfigs = [];
    private $debug = false;
    private $servers = [];

    public function __construct()
    {
    }

    public function setConfig($config)
    {
        $this->serverConfigs = $config["servers"];
        $this->debug = $config["debug"];
    }

    public function sendNotification($name,$data)
    {
        foreach($this->getServers() as $notifier) {
            $notifier->notification($name,$data);
        }
    }

    /**
     * @return Notifier[]
     */
    private function getServers()
    {
        if(!count($this->servers)) {
            foreach ($this->serverConfigs as $config) {
                if ($config["enabled"]) {
                    $this->servers[] = new Notifier($config["ip"], $config["port"], $config["secret"]);
                }
            }
        }
        return $this->servers;
    }
}