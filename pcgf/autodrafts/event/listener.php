<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2016, 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace pcgf\autodrafts\event;

use pcgf\autodrafts\migrations\release_1_1_0;
use phpbb\config\config;
use phpbb\db\driver\factory;
use phpbb\template\template;
use phpbb\user;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/** @version 1.1.2 */
class listener implements EventSubscriberInterface
{
    /** @var user $user User object */
    protected $user;

    /** @var  template $template Template object */
    protected $template;

    /** @var  config $config Configuration object */
    protected $config;

    /** @var factory $db Database object */
    protected $db;

    /**
     * Constructor
     *
     * @access public
     * @since  1.0.0
     *
     * @param user     $user     User object
     * @param template $template Template object
     * @param config   $config   Configuration object
     * @param factory  $db       Database object
     */
    public function __construct(user $user, template $template, config $config, factory $db)
    {
        $this->user = $user;
        $this->template = $template;
        $this->config = $config;
        $this->db = $db;
    }

    /**
     * Function that returns the subscribed events
     *
     * @access public
     * @since  1.0.0
     *
     * @return array The subscribed event list
     */
    static public function getSubscribedEvents()
    {
        return array(
            'core.posting_modify_template_vars' => 'setup_template_data',
            'core.ucp_pm_compose_modify_data'   => 'setup_template_data',
        );
    }

    /**
     * Function that add's template data and language data of the plugin to the posting editor
     *
     * @access public
     * @since  1.0.0
     */
    public function setup_template_data()
    {
        global $table_prefix;
        $this->user->add_lang_ext('pcgf/autodrafts', 'autodrafts');
        $locales = array(
            'days'        => array($this->user->lang['datetime']['Monday'], $this->user->lang['datetime']['Tuesday'], $this->user->lang['datetime']['Wednesday'], $this->user->lang['datetime']['Thursday'], $this->user->lang['datetime']['Friday'], $this->user->lang['datetime']['Saturday'], $this->user->lang['datetime']['Sunday'],),
            'daysShort'   => array($this->user->lang['datetime']['Mon'], $this->user->lang['datetime']['Tue'], $this->user->lang['datetime']['Wed'], $this->user->lang['datetime']['Thu'], $this->user->lang['datetime']['Fri'], $this->user->lang['datetime']['Sat'], $this->user->lang['datetime']['Sun'],),
            'dayAppendix' => array(),
            'months'      => array($this->user->lang['datetime']['January'], $this->user->lang['datetime']['February'], $this->user->lang['datetime']['March'], $this->user->lang['datetime']['April'], $this->user->lang['datetime']['May'], $this->user->lang['datetime']['June'], $this->user->lang['datetime']['July'], $this->user->lang['datetime']['August'], $this->user->lang['datetime']['September'], $this->user->lang['datetime']['October'], $this->user->lang['datetime']['November'], $this->user->lang['datetime']['December'],),
            'monthsShort' => array($this->user->lang['datetime']['Jan'], $this->user->lang['datetime']['Feb'], $this->user->lang['datetime']['Mar'], $this->user->lang['datetime']['Apr'], $this->user->lang['datetime']['May_short'], $this->user->lang['datetime']['Jun'], $this->user->lang['datetime']['Jul'], $this->user->lang['datetime']['Aug'], $this->user->lang['datetime']['Sep'], $this->user->lang['datetime']['Oct'], $this->user->lang['datetime']['Nov'], $this->user->lang['datetime']['Dec'],),
            'ampm'        => array($this->user->lang('PCGF_DAY_APPENDIX_AM'), $this->user->lang('PCGF_DAY_APPENDIX_PM'),),
        );
        for ($i = 1; $i <= 31; $i++)
        {
            array_push($locales['dayAppendix'], $this->user->lang('PCGF_DAY_APPENDIX_' . $i));
        }
        $this->template->assign_vars(array(
            'PCGF_AUTO_DRAFTS'            => true,
            'PCGF_AUTO_DRAFT_DATE_FORMAT' => $this->user->date_format,
            'PCGF_LOCALES'                => json_encode($locales, JSON_HEX_APOS),
        ));
        $query = 'SELECT *
            FROM ' . $table_prefix . release_1_1_0::AUTODRAFTS_SETTINGS_TABLE . '
            WHERE user_id = ' . ((int) $this->user->data['user_id']);
        $result = $this->db->sql_query($query);
        if ($user_settings = $this->db->sql_fetchrow($result))
        {
            $this->template->assign_vars(array(
                'PCGF_AUTO_DELETE_INTERVAL'               => $user_settings['delete_interval'] * 1000,
                'PCGF_AUTO_SAVE_INTERVAL'                 => $user_settings['save_interval'] * 1000,
                'PCGF_AUTODRAFTS_INSERT_LAST'             => $user_settings['insert_last'],
                'PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION' => $user_settings['delete_after_submission'],
            ));
        }
        else
        {
            $this->template->assign_vars(array(
                'PCGF_AUTO_DELETE_INTERVAL'               => $this->config['pcgf_autodrafts_delete_interval'] * 1000,
                'PCGF_AUTO_SAVE_INTERVAL'                 => $this->config['pcgf_autodrafts_save_interval'] * 1000,
                'PCGF_AUTODRAFTS_INSERT_LAST'             => $this->config['pcgf_autodrafts_auto_insert_last_draft'],
                'PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION' => $this->config['pcgf_autodrafts_delete_drafts_after_submission'],
            ));
        }
        $this->db->sql_freeresult($result);
    }
}
