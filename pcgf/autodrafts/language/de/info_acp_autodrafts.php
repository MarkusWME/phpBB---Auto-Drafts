<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2016, 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @version   1.1.0
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
    'ACP_PCGF_AUTODRAFTS'                                 => 'Automatische Entwürfe',
    'ACP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Hier können die Standard-Einstellungen für die automatischen Entwürfe angepasst werden.',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Nach dem Absenden löschen',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Legt fest ob alle Entwürfe des Themas nach dem Absenden automatisch gelöscht werden sollen.',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Aufbewahrungszeit',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Diese Einstellung legt fest nach welchem Zeitraum Entwürfe automatisch gelöscht werden. Damit Entwürfe nicht automatisch gelöscht werden muss der Wert 0 eingetragen werden.',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Letzten Entwurf automatisch einfügen',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Legt fest ob der letzte gespeicherte Entwurf automatisch geladen werden soll.',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Speicher-Intervall',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Hier kann eingestellt werden mit welchem Intervall automatische Entwürfe standardmäßig angelegt werden. Um automatische Entwürfe zu deaktivieren muss der Wert 0 eingetragen werden.',
    'ACP_PCGF_AUTODRAFTS_SETTINGS'                        => 'Einstellungen zu den automatischen Entwürfen',
    'ACP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => 'Die Einstellungen wurden erfolgreich gespeichert!',
));
