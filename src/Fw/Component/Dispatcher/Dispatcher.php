<?php
namespace Fw\Component\Dispatcher;

final class Dispatcher 
{   
    public function getController($requestSubRoute)
    {
        if (! $requestSubRoute) {
            throw new \Exception("Error: Could not find your resource!");       
        } else {
            return $requestSubRoute["controller"];    
        }
    }

    public function getParameters($requestSubRoute, $requestPath)
    {
        if (preg_match_all('(\{(.*?)\})', $requestSubRoute["path"], $arrayOfKeys) > 0) {
            $pattern = preg_replace('(\{(.*?)\})', '(\w+)', $requestSubRoute["path"]);
            $pattern = str_replace("/", "\\/", $pattern);
            if (preg_match_all("/^" . $pattern . "$/", $requestPath, $arrayOfMatches) > 0) {
                $arrayOfArrayValues = array_splice($arrayOfMatches, 1);
                foreach ($arrayOfArrayValues as $value) {
                    $arrayWithAllTheStringValues[] = $value[0];
                }
                $arrayOfParameters = array_combine($arrayOfKeys[1], $arrayWithAllTheStringValues);
                return $arrayOfParameters;        
            }
        }    
    }
}
