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

// Merging language data for the ACP with the other language data
$lang = array_merge($lang, array(
    'ACP_PCGF_AUTODRAFTS'                                 => 'Auto Drafts',
    'ACP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'The standard settings for the Auto Drafts can be adjusted here.',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Delete after submission',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Defines if all drafts of a topic should be deleted after the submission of a post.',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Delete interval',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'This setting defines after which time drafts will be deleted automatically. To disable this function set the value to 0.',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Load last draft',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Defines if the last draft should be loaded automatically.',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Save interval',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'This setting defines in which interval automatic drafts will be created. To disable Auto Drafts set this value to 0.',
    'ACP_PCGF_AUTODRAFTS_SETTINGS'                        => 'Settings for Auto Drafts',
    'ACP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => 'The settings have been saved successfully!',
));
