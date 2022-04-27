<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora 
 * @author Soluciones Informáticas NubezarTech [http://www.nubezar.tech]
 *
 */
class DatesFormatController
{
    private static $defaultAppTimeZone = 'Europe/Madrid';
    public static function set_default_timezone()
    {
        date_default_timezone_set(self::$defaultAppTimeZone);
    }
    public static function set_this_default_timezone($timezone)
    {
        date_default_timezone_set($timezone);
    }

    public static function convert_datetime_to_esp_timezone($datetime, $old_timezone)
    {
        self::set_default_timezone();
        echo date('Y-m-d H:i:s', strtotime("$datetime $old_timezone"));
    }
    public static function convert_datetime_to_another_timezone($datetime, $old_timezone, $new_timezone)
    {
        self::set_this_default_timezone($new_timezone);
        echo date('Y-m-d H:i:s', strtotime("$datetime $old_timezone"));
        self::set_default_timezone();
    }
}
