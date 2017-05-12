<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @version   1.1.3
 *
 * Spanish translation by Raul [ThE KuKa] (https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=94590)
 */

if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

// Merging language data for the ACP with the other language data
$lang = array_merge($lang, array(
    'ACP_PCGF_AUTODRAFTS'                                 => 'Borradores Auto',
    'ACP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Sus ajustes de Borradores Auto pueden ser ajustados aquí.',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Borrar después de la publicación',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Define si todos los borradores de un tema deben eliminarse después de la publicación de un mensaje.',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Intervalo de borrado',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Esta configuración define después de cuanto tiempo los borradores se eliminarán automáticamente. Para desactivar esta función, establezca el valor en 0.',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Cargar último borrador',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Define si el último borrador debe cargarse automáticamente.',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Intervalo de guardado',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Esta configuración define en qué intervalo se crearán los borradores automáticos. Para desactivar los borrados automáticos, establezca este valor en 0.',
    'ACP_PCGF_AUTODRAFTS_SETTINGS'                        => 'Ajustes de Borradores Auto',
    'ACP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => '¡Los ajustes han sido guardados correctamente!',
));
