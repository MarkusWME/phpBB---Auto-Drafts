<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2016, 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace pcgf\autodrafts\migrations;

use phpbb\db\migration\migration;

/** @version 1.1.0 */
class release_1_1_0 extends migration
{
    const AUTODRAFTS_SETTINGS_TABLE = 'autodrafts_settings';

    /**
     * Function that checks if the extension has been effectively installed
     *
     * @access public
     * @since  1.1.0
     *
     * @return bool If the extension has been installed effectively
     */
    public function effectively_installed()
    {
        return isset($this->config['pcgf_autodrafts_save_interval'], $this->config['pcgf_autodrafts_delete_interval'], $this->config['pcgf_autodrafts_auto_insert_last_draft'], $this->config['pcgf_autodrafts_delete_drafts_after_submission']);
    }

    /**
     * Function for building the dependency tree
     *
     * @access public
     * @since  1.1.0
     *
     * @return array Dependency data
     */
    static public function depends_on()
    {
        return array('\phpbb\db\migration\data\v31x\v311');
    }

    /**
     * Function that updates module data and configuration values
     *
     * @access public
     * @since  1.1.0
     *
     * @return array Update information array
     */
    public function update_data()
    {
        return array(
            array('config.add', array('pcgf_autodrafts_save_interval', 20)),
            array('config.add', array('pcgf_autodrafts_delete_interval', 2592000)),
            array('config.add', array('pcgf_autodrafts_auto_insert_last_draft', true)),
            array('config.add', array('pcgf_autodrafts_delete_drafts_after_submission', true)),
            array('module.add', array(
                'acp',
                'ACP_MESSAGES',
                array(
                    'module_basename' => '\pcgf\autodrafts\acp\autodrafts_module',
                    'modes'           => array('settings'),
                )),
            ),
            array('module.add', array(
                'ucp',
                'UCP_PREFS',
                array(
                    'module_basename' => '\pcgf\autodrafts\ucp\autodrafts_module',
                    'modes'           => array('settings'),
                )),
            ),
        );
    }

    /**
     * Function that inserts the autodrafts user settings table
     *
     * @access public
     * @since  1.1.0
     *
     * @return array Update information array
     */
    public function update_schema()
    {
        return array(
            'add_tables' => array(
                $this->table_prefix . self::AUTODRAFTS_SETTINGS_TABLE => array(
                    'COLUMNS'     => array(
                        'user_id'                 => array('UINT', 0),
                        'save_interval'           => array('USINT', 20),
                        'delete_interval'         => array('UINT:10', 2592000),
                        'insert_last'             => array('BOOL', 1),
                        'delete_after_submission' => array('BOOL', 1),
                    ),
                    'PRIMARY_KEY' => 'user_id',
                ),
            ),
        );
    }

    /**
     * Function that deletes the autodrafts user settings table
     *
     * @access public
     * @since  1.1.0
     *
     * @return array Delete information array
     */
    public function revert_schema()
    {
        return array(
            'drop_tables' => array(
                $this->table_prefix . self::AUTODRAFTS_SETTINGS_TABLE,
            ),
        );
    }
}
