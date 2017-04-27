<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2016, 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace pcgf\autodrafts\acp;

/** @version 1.1.0 */
class autodrafts_module
{
    /** @var string $page_title The title of the page */
    public $page_title;

    /** @var string $tpl_name The name of the template file */
    public $tpl_name;

    /** @var  object $u_action User action object */
    public $u_action;

    /**
     * Main function of the module
     *
     * @access public
     * @since  1.1.0
     *
     * @param int    $id   The module id
     * @param string $mode The mode the module is being called with
     */
    public function main($id, $mode)
    {
        global $config, $request, $template, $user;
        $this->page_title = $user->lang('ACP_PCGF_AUTODRAFTS');
        $this->tpl_name = 'acp_autodrafts_body';
        add_form_key('pcgf/autodrafts');
        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('pcgf/autodrafts'))
            {
                trigger_error('FORM_INVALID', E_USER_WARNING);
            }
            $config->set('pcgf_autodrafts_save_interval', $request->variable('autodrafts_save_interval', 20));
            $config->set('pcgf_autodrafts_delete_interval', $request->variable('autodrafts_delete_interval', 2592000));
            $config->set('pcgf_autodrafts_auto_insert_last_draft', $request->variable('autodrafts_insert_last', 1));
            $config->set('pcgf_autodrafts_delete_drafts_after_submission', $request->variable('autodrafts_delete_after_submission', 1));
            trigger_error($user->lang('ACP_PCGF_AUTODRAFTS_SETTINGS_SAVED') . adm_back_link($this->u_action));
        }
        $template->assign_vars(array(
            'PCGF_AUTODRAFTS_SAVE_INTERVAL'           => $config['pcgf_autodrafts_save_interval'],
            'PCGF_AUTODRAFTS_DELETE_INTERVAL'         => $config['pcgf_autodrafts_delete_interval'],
            'PCGF_AUTODRAFTS_INSERT_LAST'             => $config['pcgf_autodrafts_auto_insert_last_draft'],
            'PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION' => $config['pcgf_autodrafts_delete_drafts_after_submission'],
            'U_ACTION'                                => $this->u_action,
        ));
    }
}
