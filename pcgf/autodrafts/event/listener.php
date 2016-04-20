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
        $this->template->assign_vars(array(
            'PCGF_AUTO_DRAFTS' => true,
            'PCGF_AUTO_SAVE_INTERVAL' => 20000,
        ));
    }
}
