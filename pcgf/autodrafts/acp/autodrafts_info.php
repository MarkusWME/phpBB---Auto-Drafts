<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2016 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace pcgf\autodrafts\acp;

/** @version 1.1.0 */
class autodrafts_info
{
    /**
     * Function that returns module information data
     *
     * @access public
     * @since  1.1.0
     * @return array The module information array
     */
    public function module()
    {
        return array(
            'filename' => '\pcgf\autodrafts\acp\autodrafts_module',
            'title'    => 'ACP_PCGF_AUTODRAFTS',
            'version'  => '1.1.0',
            'modes'    => array(
                'settings' => array(
                    'title' => 'ACP_PCGF_AUTODRAFTS',
                    'auth'  => 'ext_pcgf/autodrafts',
                    'cat'   => array('ACP_MESSAGES'),
                ),
            ),
        );
    }
}
