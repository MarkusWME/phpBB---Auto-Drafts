<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2017 MarkusWME
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

// Merging language data for the UCP with the other language data
$lang = array_merge($lang, array(
    'UCP_PCGF_AUTODRAFTS'                                 => 'Automatische Entwürfe',
    'UCP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Deine Einstellungen für die automatischen Entwürfe können hier angepasst werden.',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Nach dem Absenden löschen',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Legt fest ob alle Entwürfe des Themas nach dem Absenden automatisch gelöscht werden sollen.',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Aufbewahrungszeit',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Diese Einstellung legt fest nach welchem Zeitraum Entwürfe automatisch gelöscht werden. Damit Entwürfe nicht automatisch gelöscht werden muss der Wert 0 eingetragen werden.',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Letzten Entwurf automatisch einfügen',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Legt fest ob der letzte gespeicherte Entwurf automatisch geladen werden soll.',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Speicher-Intervall',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Hier kann eingestellt werden mit welchem Intervall automatische Entwürfe standardmäßig angelegt werden. Um automatische Entwürfe zu deaktivieren muss der Wert 0 eingetragen werden.',
    'UCP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => 'Die Einstellungen wurden erfolgreich gespeichert!',
    'UCP_PCGF_AUTODRAFTS_SAVE_ERROR'                      => 'Die Einstellungen konnten nicht gespeichert werden! Bitte versuche es später erneut.',
    'UCP_PCGF_AUTODRAFTS_SAVED_DRAFTS'                    => 'Zur Zeit gespeicherte Entwürfe',
    'UCP_PCGF_AUTODRAFTS_CLEAR'                           => 'Alle Entwürfe löschen',
));
