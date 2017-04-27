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

// Merging language data for autodrafts with the other language data
$lang = array_merge($lang, array(
    'PCGF_ACTION'             => 'Aktion',
    'PCGF_AUTO_DRAFT'         => 'Automatische Speicherung',
    'PCGF_CLOSE_DRAFTS'       => 'Entwurfsliste schließen',
    'PCGF_DELETE_DRAFT'       => 'Entwurf löschen',
    'PCGF_DRAFT_TEXT'         => 'Text',
    'PCGF_DRAFT_TIME'         => 'Entwurfszeit',
    'PCGF_LOAD_DRAFT'         => 'Schnellentwurf laden',
    'PCGF_NO_DRAFTS'          => 'Keine Entwürfe gefunden',
    'PCGF_QUICK_DRAFT'        => 'Schnellentwurf speichern',
    'PCGF_DAY_APPENDIX_1'     => '.',
    'PCGF_DAY_APPENDIX_2'     => '.',
    'PCGF_DAY_APPENDIX_3'     => '.',
    'PCGF_DAY_APPENDIX_4'     => '.',
    'PCGF_DAY_APPENDIX_5'     => '.',
    'PCGF_DAY_APPENDIX_6'     => '.',
    'PCGF_DAY_APPENDIX_7'     => '.',
    'PCGF_DAY_APPENDIX_8'     => '.',
    'PCGF_DAY_APPENDIX_9'     => '.',
    'PCGF_DAY_APPENDIX_10'    => '.',
    'PCGF_DAY_APPENDIX_11'    => '.',
    'PCGF_DAY_APPENDIX_12'    => '.',
    'PCGF_DAY_APPENDIX_13'    => '.',
    'PCGF_DAY_APPENDIX_14'    => '.',
    'PCGF_DAY_APPENDIX_15'    => '.',
    'PCGF_DAY_APPENDIX_16'    => '.',
    'PCGF_DAY_APPENDIX_17'    => '.',
    'PCGF_DAY_APPENDIX_18'    => '.',
    'PCGF_DAY_APPENDIX_19'    => '.',
    'PCGF_DAY_APPENDIX_20'    => '.',
    'PCGF_DAY_APPENDIX_21'    => '.',
    'PCGF_DAY_APPENDIX_22'    => '.',
    'PCGF_DAY_APPENDIX_23'    => '.',
    'PCGF_DAY_APPENDIX_24'    => '.',
    'PCGF_DAY_APPENDIX_25'    => '.',
    'PCGF_DAY_APPENDIX_26'    => '.',
    'PCGF_DAY_APPENDIX_27'    => '.',
    'PCGF_DAY_APPENDIX_28'    => '.',
    'PCGF_DAY_APPENDIX_29'    => '.',
    'PCGF_DAY_APPENDIX_30'    => '.',
    'PCGF_DAY_APPENDIX_31'    => '.',
    'PCGF_DAY_APPENDIX_AM'    => 'am',
    'PCGF_DAY_APPENDIX_PM'    => 'pm',
    // New language data since version 1.1.0
    'PCGF_AUTODRAFT_SAVED'    => 'Automatischer Entwurf gespeichert!',
    'PCGF_DRAFTS_SAVED_UNTIL' => 'Gespeichert bis',
    'PCGF_QUICKDRAFT_SAVED'   => 'Schnellentwurf gespeichert!',
));
