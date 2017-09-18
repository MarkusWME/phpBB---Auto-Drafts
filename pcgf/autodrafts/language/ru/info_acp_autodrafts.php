<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2017 MarkusWME
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

// Merging language data for the ACP with the other language data
$lang = array_merge($lang, array(
    'ACP_PCGF_AUTODRAFTS'                                 => 'Авто черновики',
    'ACP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Стандартные настрофки Авто черновиков.',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Удалять после отправки',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Все черновики темы будут удалены после отправки сообщения.',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Интервал удаления',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Через какое время черновики будут удалены автоматически. Установите 0 для отключения функции.',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Загружать последний черновик',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Загружать или нет последний черновик автоматически.',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Интервал сохранения',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Через какой интервал сохранять черновики автоматически. Установите 0 для отключения Авто черновиков.',
    'ACP_PCGF_AUTODRAFTS_SETTINGS'                        => 'Настройки Авто черновиков',
    'ACP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => 'Настройки успешно сохранены!',
));
