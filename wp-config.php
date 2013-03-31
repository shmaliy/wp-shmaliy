<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'shmaliym_wpsh');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?9R}.~gwWz=7mV[P:G,BuM5}L+P){@.&rD4%NQ3=#<j[|u@e~& GdbQ(2u8~W+ g');
define('SECURE_AUTH_KEY',  '10H^T&+DLRvOJi()|k[6A^AwV/uJeO~>msCN*^.9ceJZ61x hks=@{[V)QY9wh/_');
define('LOGGED_IN_KEY',    '+%~X+/-IBSi(RZ4@}7YWOY8w#,Q4<#4`i[$7y9?$3XnCI&%#`Tk(o<Ik0(cHTi})');
define('NONCE_KEY',        'z>.hmYkI=XTlk?K03H%FlD<gQnT;:yad8-*bK-)_11lf<*!~#Ts$FEJbRy?1dXv[');
define('AUTH_SALT',        '>zu!4kj1JVb1LeiJ_V]BZ5!Fmm3}yinHZ}>Jr%p`Jc4.b>$9H/4f>qa#/.x]aGhg');
define('SECURE_AUTH_SALT', 'fu`Mu9nJ>%=dBy}jPT@}%. Iuwg&QIf9j*ElJ]:n_5q*|LlkpJ4EN3X56^Np);A/');
define('LOGGED_IN_SALT',   'MZ,,MK&f2UClGl+% exwVh<l3MoJr~Hs<_,%0u!j.tW0&kE{m6urVgdYS`8$iCMU');
define('NONCE_SALT',       'k%F6EU-X2H_6US47LDflFm_q{fY^&W/~1%/D(<DJhmiy52q]{8BO>FEB4N/kJgcb');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
