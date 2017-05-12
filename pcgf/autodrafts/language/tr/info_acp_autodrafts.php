<?php

/**
 * @author    MarkusWME <markuswme@pcgamingfreaks.at>
 * @copyright 2017 MarkusWME
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @version   1.1.3
 *
 * Turkish translation by pikachuturkey (https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=289380)
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
    'ACP_PCGF_AUTODRAFTS'                                 => 'Otomatik Taslaklar',
    'ACP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Otomatik Taslaklar için standart ayarlar buradan yapılabilir.',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Gönderildikten sonra sil',
    'ACP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Yazının gönderilmesinden sonra bir konunun tüm taslaklarının silineceğini tanımlar.',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Silme aralığı',
    'ACP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Bu ayar taslakların otomatik olarak ne kadar süre sonra silineceğini tanımlar. Bu fonksiyonu kapatmak için değeri 0 ayarlayın.',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Son taslağı yükle',
    'ACP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Son taslağın otomatik olarak yükleneceğini tanımlar.',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Kayıt aralığı',
    'ACP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Bu ayar taslakların otomatik olarak ne kadar süre aralıklarıyla oluşturulacağını tanımlar. Bu fonksiyonu kapatmak için değeri 0 ayarlayın.',
    'ACP_PCGF_AUTODRAFTS_SETTINGS'                        => 'Otomatik Taslak için ayarlar',
    'ACP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => 'Ayarlar başarıyla kaydedildi!',
));
