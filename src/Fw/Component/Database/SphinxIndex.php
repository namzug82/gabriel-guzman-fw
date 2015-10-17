<?php
namespace Fw\Component\Database;

final class SphinxIndex extends Sphinx
{
    private $index;
    protected $sphinx;

    public function __construct(SearchEngine $sphinx, $index)
    {
        $this->index = $index;
        $this->sphinx = $sphinx->sphinxClient;
    }

    public function prepare($query)
    {
        $this->sphinx->AddQuery( $query, $this->index );
        return $this->sphinx->RunQueries();
    }
}
