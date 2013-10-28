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
        $this->shutdown();
    }

    public function shutdown()
    {
        $this->log('SHUTDOWN');
        fclose($this->logh);
    }
}

