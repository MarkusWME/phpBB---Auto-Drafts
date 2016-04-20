<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2016 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @version   1.0.0
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
    'PCGF_AUTO_DRAFT'    => 'Auto draft',
    'PCGF_DRAFT_MESSAGE' => 'Message',
    'PCGF_DRAFT_SUBJECT' => 'Subject',
    'PCGF_DRAFT_TIME'    => 'Draft time',
    'PCGF_LOAD_DRAFT'    => 'Load draft',
    'PCGF_QUICK_DRAFT'   => 'Quick draft',
));
