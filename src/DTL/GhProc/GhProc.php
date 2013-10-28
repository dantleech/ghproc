<?php

namespace DTL\GhProc;

class GhProc
{
    protected $config;
    protected $logh;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function log($message)
    {
        fwrite($this->logh, date('Y:m:d H:i:s').': '.$message."\n");
    }

    public function init()
    {
        $this->logh = fopen($this->config['log_file'], 'a+');
        $this->log('INIT');
    }

    public function run()
    {
        $this->init();

        $payload = $_POST['payload'];
        $payload = json_decode($payload);
        $this->log('REQUEST: '.json_encode($payload, JSON_PRETTY_PRINT));

        $this->shutdown();
    }

    public function shutdown()
    {
        $this->log('SHUTDOWN');
        fclose($this->logh);
    }
}

