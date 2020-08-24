<?php


namespace Kojirock5260\PayPayExample;


class Config
{
    private array $parameters;

    /**
     * Config constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        if (!$this->isValid($parameters)) {
            throw new \InvalidArgumentException('required key invalid');
        }

        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function merchantId(): string
    {
        return $this->parameters['merchantId'];
    }

    /**
     * @return string
     */
    public function apiKey(): string
    {
        return $this->parameters['apiKey'];
    }

    /**
     * @return string
     */
    public function apiSecret(): string
    {
        return $this->parameters['apiSecret'];
    }

    /**
     * @return string
     */
    public function redirectUrl(): string
    {
        return $this->parameters['redirectUrl'];
    }

    /**
     * @return bool
     */
    public function isAuthorization(): bool
    {
        return $this->parameters['isAuthorization'];
    }

    /**
     * @return bool
     */
    public function isProduction(): bool
    {
        return $this->parameters['production'];
    }

    /**
     * @param array $parameters
     * @return bool
     */
    private function isValid(array $parameters): bool
    {
        $keys = [
            'merchantId',
            'apiKey',
            'apiSecret',
            'redirectUrl',
            'isAuthorization',
            'production',
        ];

        foreach ($keys as $key)  {
            if (!isset($parameters[$key])) {
                return false;
            }
        }

        return true;
    }
}