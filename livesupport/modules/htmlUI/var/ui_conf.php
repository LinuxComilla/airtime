<?php
if ($_SERVER['SERVER_ADDR'] !== '192.168.0.110') { 
    error_reporting(E_ERROR);
}
ini_set('memory_limit', '64M'); 

define('UI_PL_DRAG_ENABLED',             TRUE);
define('UI_PL_DRAG_INTRO',              'Here you can simply rearrange whole playlist on just drag items up or down.');
define('UI_VERSION',                    'LiveSupport 1.0.1');
define('UI_VERSION_FULLNAME',           'LiveSupport 1.0 stable');
define('UI_TESTSTREAM_MU3_TMP',         'img/test.m3u');

## Scheduler
define('UI_SCHEDULER_DAEMON_CMD',       'make -C /var/www/livesupport/products/scheduler/ run >/tmp/scheduler.log 2>&1 &'); ## adjust the path here
define('UI_SCHEDULER_DAEMON_NAME',      'scheduler');                      ## this is just name of scheduler process to grep in process list for it

## Warning/Error level
define('UI_VERBOSE',                    FALSE);
define('UI_WARNING',                    TRUE);
define('UI_ERROR',                      TRUE);

## Local settings
define('UI_DEFAULT_LANGID',             'en_GB');
#define('UI_UPLOAD_LANGID',              $_SESSION['langid']);
define('UI_UPLOAD_LANGID',              UI_DEFAULT_LANGID);
define('UI_TIMEZONEOFFSET',             date('Z'));

## Basic scripts
define('UI_HANDLER',                    'ui_handler.php');
define('UI_BROWSER',                    'ui_browser.php');

## HTML Form stuff
define('UI_FORM_STANDARD_METHOD',       'POST');
define('UI_INPUT_STANDARD_SIZE',        50);
define('UI_INPUT_STANDARD_MAXLENGTH',   255);
define('UI_TEXTAREA_STANDART_ROWS',     5);
define('UI_TEXTAREA_STANDART_COLS',     32);
define('UI_BUTTON_STYLE',               'button');
define('UI_QFORM_REQUIRED',             '../templates/sub/form_required.tpl');
define('UI_QFORM_REQUIREDNOTE',         '../templates/sub/form_requirednote.tpl');
define('UI_QFORM_ERROR',                '../templates/sub/form_error.tpl');
define('UI_REGEX_URL',                  '/^(ht|f)tps?:\/\/[^ ]+$/');

## DB ls_pref keys
define('UI_PL_ACCESSTOKEN_KEY',         'playlistToken');
define('UI_SCRATCHPAD_KEY',             'djBagContents');
define('UI_SCRATCHPAD_MAXLENGTH_KEY',   'djBagMaxlength');
#define('UI_SCRATCHPAD_REGEX', '/^[0-9a-f]{16}:[0-9]{4}-[0-9]{2}-[0-9]{2}$/');

## Session Keys
define('UI_SCRATCHPAD_SESSNAME',        'SCRATCHPAD');
define('UI_STATIONINFO_SESSNAME',       'STATIONINFO');
define('UI_BROWSE_SESSNAME',            'L_BROWSE');
define('UI_SEARCH_SESSNAME',            'L_SEARCH');
define('UI_PLAYLIST_SESSNAME',          'PLAYLIST');

## Metadata Keys
define('UI_MDATA_KEY_TITLE',            'dc:title');
define('UI_MDATA_KEY_CREATOR',          'dc:creator');
define('UI_MDATA_KEY_DURATION',         'dcterms:extent');
define('UI_MDATA_KEY_URL',              'ls:url');
define('UI_MDATA_KEY_FORMAT',           'dc:format');
define('UI_MDATA_KEY_DESCRIPTION',      'dc:description');
define('UI_MDATA_KEY_CHANNELS',         'ls:channels');
define('UI_MDATA_KEY_SAMPLERATE',       'ls:samplerate');
define('UI_MDATA_KEY_BITRATE',          'ls:bitrate');
define('UI_MDATA_KEY_ENCODER',          'ls:encoder');
define('UI_MDATA_VALUE_FORMAT_FILE',    'File');
define('UI_MDATA_VALUE_FORMAT_STREAM',  'live stream');

## Search/Browse preferences
define('UI_SIMPLESEARCH_FILETYPE',      'File');
define('UI_SIMPLESEARCH_OPERATOR',      'OR');
define('UI_SIMPLESEARCH_LIMIT',         10);
define('UI_SIMPLESEARCH_ROWS',          3);
define('UI_SIMPLESEARCH_CAT1',          'dc:title');
define('UI_SIMPLESEARCH_OP1',           'partial');
define('UI_SIMPLESEARCH_CAT2',          'dc:creator');
define('UI_SIMPLESEARCH_OP2',           'partial');
define('UI_SIMPLESEARCH_CAT3',          'dc:source');
define('UI_SIMPLESEARCH_OP3',           'partial');

define('UI_SEARCH_MAX_ROWS',            8);
define('UI_SEARCH_DEFAULT_LIMIT',       10);
define('UI_SEARCHRESULTS_DELTA',        4);

define('UI_BROWSERESULTS_DELTA',        4);
define('UI_BROWSE_DEFAULT_KEY_1',       'dc:type');
define('UI_BROWSE_DEFAULT_KEY_2',       'dc:creator');
define('UI_BROWSE_DEFAULT_KEY_3',       'dc:source');
define('UI_BROWSE_DEFAULT_LIMIT',       10);

## Scheduler / Calendar
define('UI_SCHEDULER_FIRSTWEEKDAY',     1);
define('UI_SCHEDULER_DEFAULT_VIEW',     'day');
define('UI_SCHEDULER_PAUSE_PL2PL',      '0 seconds');

## File types
define('UI_FILETYPE_ANY',               'file');
define('UI_FILETYPE_PLAYLIST',          'playlist');
define('UI_FILETYPE_AUDIOCLIP',         'audioClip');
define('UI_FILETYPE_WEBSTREAM',         'webstream');

## Playlist elements
define('UI_PL_ELEM_PLAYLIST',           'playlistElement');
define('UI_PL_ELEM_FADEINFO',           'fadeInfo');
define('UI_PL_ELEM_FADEIN',             'fadeIn');
define('UI_PL_ELEM_FADEOUT',            'fadeOut');



## LS stuff
require_once dirname(__FILE__).'/../../storageServer/var/conf.php';
## extent config
$config = array_merge($config,
    array(
        'file_types'    => array(
                            '.mp3',
                            '.wav',
                            '.ogg'
        ),
        'stream_types'  => array(
                            'application/ogg',
                            'audio/mpeg'
        ),
        'languages'     => array(
                            'ar_JO'        => 'Arabic(JO)',
                            'am_AM'        => 'Armenian(AM)',
                            'en_GB'        => 'English (GB)',
                            'en_US'        => 'English (US)',
                            'es_CO'        => 'Español (CO)',
                            'cz_CZ'        => 'Česky (CZ)',
                            'de_DE'        => 'Deutsch (DE)',
                            'hu_HU'        => 'Magyar (HU)',
                            'nl_NL'        => 'Nederlands (NL)',
                            'sr_CS'        => 'Srpski (CS)',
                            'ru_RU'        => 'Russia(RU)'
        ),
    )
);
require_once dirname(__FILE__).'/ui_base.inc.php';
require_once dirname(__FILE__).'/ui_scratchpad.class.php';
require_once dirname(__FILE__).'/ui_playlist.class.php';
require_once dirname(__FILE__).'/ui_search.class.php';
require_once dirname(__FILE__).'/ui_browse.class.php';
require_once dirname(__FILE__).'/../../storageServer/var/GreenBox.php';
require_once dirname(__FILE__).'/formmask/generic.inc.php';
require_once dirname(__FILE__).'/ui_calendar.class.php';
require_once dirname(__FILE__).'/ui_scheduler.class.php';
require_once dirname(__FILE__).'/ui_subjects.class.php';
require_once dirname(__FILE__).'/ui_jscom.php';

## well known classes
require_once 'DB.php';
require_once 'HTML/QuickForm.php';

#PEAR::setErrorHandling(PEAR_ERROR_TRIGGER, E_USER_WARNING);
#PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'errCallBack');
PEAR::setErrorHandling(PEAR_ERROR_RETURN);
#PEAR::setErrorHandling(PEAR_ERROR_PRINT);
?>