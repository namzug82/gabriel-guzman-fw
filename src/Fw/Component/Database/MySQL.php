<?php
namespace Fw\Component\Database;

interface MySQL extends Database
{
    public function prepare($query);
}
