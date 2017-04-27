<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace pcgf\autodrafts\ucp;

use pcgf\autodrafts\migrations\release_1_1_0;

/** @version 1.1.2 */
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
        global $config, $request, $template, $user, $db, $table_prefix;
        $this->page_title = $user->lang('UCP_PCGF_AUTODRAFTS');
        $this->tpl_name = 'ucp_autodrafts_body';
        add_form_key('pcgf/autodrafts');
        $user_id = (int) $user->data['user_id'];
        $query = 'SELECT *
            FROM ' . $table_prefix . release_1_1_0::AUTODRAFTS_SETTINGS_TABLE . '
            WHERE user_id = ' . $user_id;
        $result = $db->sql_query($query);
        $user_settings = $db->sql_fetchrow($result);
        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('pcgf/autodrafts'))
            {
                trigger_error('FORM_INVALID', E_USER_WARNING);
            }
            $data = array(
                'save_interval'           => $db->sql_escape($request->variable('autodrafts_save_interval', 20)),
                'delete_interval'         => $db->sql_escape($request->variable('autodrafts_delete_interval', 2592000)),
                'insert_last'             => $db->sql_escape($request->variable('autodrafts_insert_last', 1)),
                'delete_after_submission' => $db->sql_escape($request->variable('autodrafts_delete_after_submission', 1)),
            );
            if ($user_settings)
            {
                $query = 'UPDATE ' . $table_prefix . release_1_1_0::AUTODRAFTS_SETTINGS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $data) . ' WHERE user_id = ' . $user_id;
            }
            else
            {
                $data['user_id'] = $user_id;
                $query = 'INSERT INTO ' . $table_prefix . release_1_1_0::AUTODRAFTS_SETTINGS_TABLE . ' ' . $db->sql_build_array('INSERT', $data);
            }
            $db->sql_query($query);
            if ($db->sql_affectedrows() > 0)
            {
                trigger_error($user->lang('UCP_PCGF_AUTODRAFTS_SETTINGS_SAVED') . '<br/><br/>' . $user->lang('RETURN_UCP', '<a href="' . $this->u_action . '">', '</a>'));
            }
            else
            {
                trigger_error($user->lang('UCP_PCGF_AUTODRAFTS_SAVE_ERROR') . '<br/><br/>' . $user->lang('RETURN_UCP', '<a href="' . $this->u_action . '">', '</a>'), E_USER_WARNING);
            }
        }
        else if ($user_settings)
        {
            $template->assign_vars(array(
                'PCGF_AUTODRAFTS_SAVE_INTERVAL'           => $user_settings['save_interval'],
                'PCGF_AUTODRAFTS_DELETE_INTERVAL'         => $user_settings['delete_interval'],
                'PCGF_AUTODRAFTS_INSERT_LAST'             => $user_settings['insert_last'],
                'PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION' => $user_settings['delete_after_submission'],
            ));
        }
        else
        {
            $template->assign_vars(array(
                'PCGF_AUTODRAFTS_SAVE_INTERVAL'           => $config['pcgf_autodrafts_save_interval'],
                'PCGF_AUTODRAFTS_DELETE_INTERVAL'         => $config['pcgf_autodrafts_delete_interval'],
                'PCGF_AUTODRAFTS_INSERT_LAST'             => $config['pcgf_autodrafts_auto_insert_last_draft'],
                'PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION' => $config['pcgf_autodrafts_delete_drafts_after_submission'],
            ));
        }
        $db->sql_freeresult($result);
        $template->assign_var('U_ACTION', $this->u_action);
    }
}
