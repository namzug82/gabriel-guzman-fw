<?php
namespace Fw\Component\Database;

class Sphinx implements SearchEngine
{
    protected $sphinxClient;

    public function __construct($host, $port, $matchMode, $sortMode, $offset, $limit)
    {
        try {
            $this->sphinxClient = new SphinxClient();
            $this->sphinxClient->setServer( $host, $port);
            $this->sphinxClient->setMatchMode( $matchMode );
            $this->sphinxClient->setSortMode( $sortMode );
            $this->sphinxClient->setLimits( $offset, $limit );
        } 
        catch (Exception $e) {
            die("Sphinx ERROR: ". $e->getMessage());
        }
    }
}
