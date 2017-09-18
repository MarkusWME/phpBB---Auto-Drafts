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

// Merging language data for the UCP with the other language data
$lang = array_merge($lang, array(
    'UCP_PCGF_AUTODRAFTS'                                 => 'Авто черновики',
    'UCP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Вы можете настроить здесь авто черновики.',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Удалять после отправки',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Все черновики темы будут удалены после отправки сообщения.',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Интервал удаления',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Через какое время черновики будут удалены автоматически. Установите 0 для отключения функции.',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Загружать последний черновик',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Загружать или нет последний черновик автоматически.',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Интервал сохранения',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Через какой интервал сохранять черновики автоматически. Установите 0 для отключения Авто черновиков.',
    'UCP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => 'Настройки успешно сохранены!',
    'UCP_PCGF_AUTODRAFTS_SAVE_ERROR'                      => 'Настройки не могут быть сохранены, попробуйте позже!',
    'UCP_PCGF_AUTODRAFTS_SAVED_DRAFTS'                    => 'Сохранённые черновики',
    'UCP_PCGF_AUTODRAFTS_CLEAR'                           => 'Удалить все черновики',
));
