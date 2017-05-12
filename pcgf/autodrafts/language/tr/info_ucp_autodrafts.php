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

// Merging language data for the UCP with the other language data
$lang = array_merge($lang, array(
    'UCP_PCGF_AUTODRAFTS'                                 => 'Otomatik Taslak',
    'UCP_PCGF_AUTODRAFTS_EXPLAIN'                         => 'Otomatik Taslaklar için ayarlarınız buradan yapılabilir.',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION'         => 'Gönderildikten sonra sil',
    'UCP_PCGF_AUTODRAFTS_DELETE_AFTER_SUBMISSION_EXPLAIN' => 'Yazının gönderilmesinden sonra bir konunun tüm taslaklarının silineceğini tanımlar.',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL'                 => 'Silme aralığı',
    'UCP_PCGF_AUTODRAFTS_DELETE_INTERVAL_EXPLAIN'         => 'Bu ayar taslakların otomatik olarak ne kadar süre sonra silineceğini tanımlar. Bu fonksiyonu kapatmak için değeri 0 ayarlayın.',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST'                     => 'Son taslağı yükle',
    'UCP_PCGF_AUTODRAFTS_INSERT_LAST_EXPLAIN'             => 'Son taslağın otomatik olarak yükleneceğini tanımlar.',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL'                   => 'Kaydetme aralığı',
    'UCP_PCGF_AUTODRAFTS_SAVE_INTERVAL_EXPLAIN'           => 'Bu ayar taslakların otomatik olarak ne kadar süre aralıklarıyla oluşturulacağını tanımlar. Bu fonksiyonu kapatmak için değeri 0 ayarlayın.',
    'UCP_PCGF_AUTODRAFTS_SETTINGS_SAVED'                  => 'Ayarlar başarıyla kaydedildi!',
    'UCP_PCGF_AUTODRAFTS_SAVE_ERROR'                      => 'Ayarlar kaydedilemedi, lütfen sonra tekrar deneyin!',
    'UCP_PCGF_AUTODRAFTS_SAVED_DRAFTS'                    => 'Mevcut kayıtlı taslaklar',
    'UCP_PCGF_AUTODRAFTS_CLEAR'                           => 'Tüm taslakları sil',
));
