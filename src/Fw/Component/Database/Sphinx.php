<?php
namespace Fw\Component\Database;

class Sphinx implements SearchEngine
{
    protected $sphinxClient;

    public function __construct($pathSphinxApi, $host, $port, $matchMode, $sortMode, $offset, $limit)
    {
        try {
            include $pathSphinxApi;
            $this->sphinxClient = new \SphinxClient();
            $this->sphinxClient->SetServer( $host, $port);
            $this->sphinxClient->SetMatchMode( $matchMode );
            $this->sphinxClient->SetSortMode( $sortMode );
            $this->sphinxClient->SetLimits( $offset, $limit );
        } 
        catch (Exception $e) {
            die("Sphinx ERROR: ". $e->getMessage());
        }
    }
}
