<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2016 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace pcgf\autodrafts\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/** @version 1.0.0 */
class listener implements EventSubscriberInterface
{
    /** @var \phpbb\user $user User object */
    protected $user;

    /** @var  \phpbb\template\template $template Template object */
    protected $template;

    /**
     * Constructor
     *
     * @access public
     * @since  1.0.0
     *
     * @param \phpbb\user              $user     User object
     * @param \phpbb\template\template $template Template object
     *
     * @return \pcgf\autodrafts\event\listener The listener object of the extension
     */
    public function __construct(\phpbb\user $user, \phpbb\template\template $template)
    {
        $this->user = $user;
        $this->template = $template;
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
     *
     * @param $event The event data
     */
    public function setup_template_data($event)
    {
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
            'PCGF_AUTO_DELETE_INTERVAL'   => 2592000000,
            'PCGF_AUTO_SAVE_INTERVAL'     => 20000,
            'PCGF_LOCALES'                => json_encode($locales),
        ));
    }
}
