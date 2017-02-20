<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace pcgf\autodrafts\ucp;

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
            'filename' => '\pcgf\autodrafts\ucp\autodrafts_module',
            'title'    => 'UCP_PCGF_AUTODRAFTS',
            'version'  => '1.1.0',
            'modes'    => array(
                'settings' => array(
                    'title' => 'UCP_PCGF_AUTODRAFTS',
                    'auth'  => 'ext_pcgf/autodrafts',
                    'cat'   => array('UCP_PREFS'),
                ),
            ),
        );
    }
}
