<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
 * @author http://www.nubezar.tech
 *
 */
class DatesFormatController
{
    private static $appTimeZone='Europe/Madrid';
    public static function set_default_timezone()
    {
        date_default_timezone_set(self::$appTimeZone);
    }

    public static function convert_datetime_to_another_timezone($datetime, $old_timezone, $new_timezone)
    {
        self::set_default_timezone();
        echo date('Y-m-d H:i:s', strtotime("$datetime Europe/Amsterdam"));
    }
}
