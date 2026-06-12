<?php

namespace Volcengine\Common\Endpoint;

class EndpointOptions
{
    public $strictMatching = false;
    public $resolveUnknownService = false;
    public $site;
    public $ipVersion;
    public $endpointConfigState = false;
    public $endpointConfigPath;

    public function toArray()
    {
        return [
            'strictMatching' => $this->strictMatching,
            'resolveUnknownService' => $this->resolveUnknownService,
            'site' => $this->site,
            'ipVersion' => $this->ipVersion,
            'endpointConfigState' => $this->endpointConfigState,
            'endpointConfigPath' => $this->endpointConfigPath,
        ];
    }
}
