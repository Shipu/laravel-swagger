<?php

namespace Mtrajano\LaravelSwagger\Parameters;

abstract class ParameterGenerator
{
    protected $method;

    protected $uri;

    protected $rules;

    public function __construct($method, $uri, array $rules)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->rules = $rules;
    }

    abstract public function getParameters();

    abstract public function getParamLocation();

    protected function getParamType(array $paramRules)
    {
        if (in_array('integer', $paramRules)) {
            return 'integer';
        } else if (in_array('numeric', $paramRules)) {
            return 'number';
        } else if (in_array('boolean', $paramRules)) {
            return 'boolean';
        } else if (in_array('array', $paramRules)) {
            return 'array';
        } else {
            //date, ip, email, etc..
            return 'string';
        }
    }

    protected function isParamRequired(array $paramRules)
    {
        return in_array('required', $paramRules);
    }
}