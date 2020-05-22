<?php

namespace Padmoney;

final class Padmoney
{
    const DEV = 'dev';
    const PROD = 'prod';

    const PADMONEY_URI = 'https://api.padmoney.com/v2';

    const PADMONEY_URI_SANDBOX = 'https://dev.padmoney.com/v2';

    const PADMONEY_TOKEN = 'PADMONEY_TOKEN';

    const PADMONEY_TOKEN_SECRET = 'PADMONEY_TOKEN_SECRET';

    /**
     * Get API URI
     *
     * @return string
     */
    public static function apiUri(?string $env)
    {
        if (self::env($env) == self::DEV) {
            return self::PADMONEY_URI_SANDBOX;
        }
        return self::PADMONEY_URI;
    }

    /**
     * The env. PROD or DEV (Sandbox)
     *
     * @return string
     */
    private static function env(?string $env)
    {
        if (strtolower($env) == self::DEV) {
            return self::DEV;
        }
        return self::PROD;
    }
}
