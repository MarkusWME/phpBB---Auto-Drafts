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

// Merging language data for the UCP with the other language data
$lang = array_merge($lang, array(
    'UCP_PCGF_AUTODRAFTS'                                 => 'Borradores Auto',
    'UCP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Sus ajustes de Borradores Auto pueden ser ajustados aquí.',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Borrar después de la publicación',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Define si todos los borradores de un tema deben eliminarse después de la publicación de un mensaje.',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Intervalo de borrado',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Esta configuración define después de cuanto tiempo los borradores se eliminarán automáticamente. Para desactivar esta función, establezca el valor en 0.',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Cargar último borrador',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Define si el último borrador debe cargarse automáticamente.',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Intervalo de guardado',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Esta configuración define en qué intervalo se crearán los borradores automáticos. Para desactivar los borrados automáticos, establezca este valor en 0.',
    'UCP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => '¡Los ajustes han sido guardados correctamente!',
    'UCP_PCGF_AUTODRAFTS_SAVE_ERROR'                      => 'No se pudo guardar la configuración. ¡Vuelve a intentarlo más tarde!',
    'UCP_PCGF_AUTODRAFTS_SAVED_DRAFTS'                    => 'Borradores guardados actualmente',
    'UCP_PCGF_AUTODRAFTS_CLEAR'                           => 'Borrar todos los borradores',
));
