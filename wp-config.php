<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'Foodog' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'user' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'password' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',E(|@90 gP*p!LM xZJAt1WqJe<C2a7qG`HpaMi/_^!#ZTK(uGEY-7@Ppc/He&Y_' );
define( 'SECURE_AUTH_KEY',  'R_S)U^8m]b$u=mbGS]uTGtjK4n$/WI2cX003E{s>H^)K;2;OZ&0*+N?5KUcLMbPQ' );
define( 'LOGGED_IN_KEY',    '[:%GTTG?6eYX -HYi:&BN7qiWB]E3no{#NLNu(y(pj;(vGsiaz:,v[B>@XVPD^6^' );
define( 'NONCE_KEY',        '?zDSFw} IC0#r1{uOIx?ET]A+*{y6}Qf,C`y_:tY]gYo!Sob^y=x@*rXb}9_<6~i' );
define( 'AUTH_SALT',        '0rkp1ND?-*Znl;Ilo]&];Lj8,a9^r&rbs/hKfe<%iVWv,qWn-Gq_Xg|*dZTFjBYU' );
define( 'SECURE_AUTH_SALT', 'RA7YU#$O!+7$BtHSf:1w:Oq/dBMc^VRLFY@,*$gRL){xa`Cb0_BQG7V-P0ac2:dA' );
define( 'LOGGED_IN_SALT',   '#TEvOHAXO3((HA)FhZ0]biDZVSiiwKhH3^[[pPox{tUQ2NQFTvAqbZfVb}!g;wpV' );
define( 'NONCE_SALT',       '<I(Pdzkf$a<e`&cuqw><T;#4FR7V4u?%{WnB2c/?NfB*&w_] lR9O(x[a(hX(!GA' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'aa_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

define('FS_METHOD','direct');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

