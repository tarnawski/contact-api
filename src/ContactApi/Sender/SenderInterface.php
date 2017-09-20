<?php

namespace ContactApi\Sender;

interface SenderInterface
{
    /**
     * @param string $body
     * @return bool
     */
    public function send($body);
}