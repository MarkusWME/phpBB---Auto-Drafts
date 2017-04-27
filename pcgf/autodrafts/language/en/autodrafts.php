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
    'PCGF_ACTION'             => 'Action',
    'PCGF_AUTO_DRAFT'         => 'Auto draft',
    'PCGF_CLOSE_DRAFTS'       => 'Close draft list',
    'PCGF_DELETE_DRAFT'       => 'Delete draft',
    'PCGF_DRAFT_TEXT'         => 'Text',
    'PCGF_DRAFT_TIME'         => 'Draft time',
    'PCGF_LOAD_DRAFT'         => 'Load quick draft',
    'PCGF_NO_DRAFTS'          => 'No drafts found',
    'PCGF_QUICK_DRAFT'        => 'Save quick draft',
    'PCGF_DAY_APPENDIX_1'     => 'st',
    'PCGF_DAY_APPENDIX_2'     => 'nd',
    'PCGF_DAY_APPENDIX_3'     => 'rd',
    'PCGF_DAY_APPENDIX_4'     => 'th',
    'PCGF_DAY_APPENDIX_5'     => 'th',
    'PCGF_DAY_APPENDIX_6'     => 'th',
    'PCGF_DAY_APPENDIX_7'     => 'th',
    'PCGF_DAY_APPENDIX_8'     => 'th',
    'PCGF_DAY_APPENDIX_9'     => 'th',
    'PCGF_DAY_APPENDIX_10'    => 'th',
    'PCGF_DAY_APPENDIX_11'    => 'th',
    'PCGF_DAY_APPENDIX_12'    => 'th',
    'PCGF_DAY_APPENDIX_13'    => 'th',
    'PCGF_DAY_APPENDIX_14'    => 'th',
    'PCGF_DAY_APPENDIX_15'    => 'th',
    'PCGF_DAY_APPENDIX_16'    => 'th',
    'PCGF_DAY_APPENDIX_17'    => 'th',
    'PCGF_DAY_APPENDIX_18'    => 'th',
    'PCGF_DAY_APPENDIX_19'    => 'th',
    'PCGF_DAY_APPENDIX_20'    => 'th',
    'PCGF_DAY_APPENDIX_21'    => 'th',
    'PCGF_DAY_APPENDIX_22'    => 'th',
    'PCGF_DAY_APPENDIX_23'    => 'th',
    'PCGF_DAY_APPENDIX_24'    => 'th',
    'PCGF_DAY_APPENDIX_25'    => 'th',
    'PCGF_DAY_APPENDIX_26'    => 'th',
    'PCGF_DAY_APPENDIX_27'    => 'th',
    'PCGF_DAY_APPENDIX_28'    => 'th',
    'PCGF_DAY_APPENDIX_29'    => 'th',
    'PCGF_DAY_APPENDIX_30'    => 'th',
    'PCGF_DAY_APPENDIX_31'    => 'th',
    'PCGF_DAY_APPENDIX_AM'    => 'am',
    'PCGF_DAY_APPENDIX_PM'    => 'pm',
    // New language data since version 1.1.0
    'PCGF_AUTODRAFT_SAVED'    => 'Auto draft saved!',
    'PCGF_DRAFTS_SAVED_UNTIL' => 'Saved until',
    'PCGF_QUICKDRAFT_SAVED'   => 'Quick draft saved!',
));
