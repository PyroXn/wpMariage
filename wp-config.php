<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'sabinepierre');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'apbCi8,5E8V<PRcpET9C*s`d3NxB#OW&o[[xk#69k/G?W(2!Z+{hgwJjA8^jBcxv');
define('SECURE_AUTH_KEY',  'lm;:H~`=spg<9#xd(d4s5YP,:]W1)d|XwMa5I4|9mX+cwkiZ9D.H~:zbeRfm?y}F');
define('LOGGED_IN_KEY',    'T+dG$s,%fk14.:J 0Q7hJLuJg! sV~U:J{F5f,(RC8VGbOy[~(gf>1;8<,YJ Z%N');
define('NONCE_KEY',        'NF?aY>)3NWWzXS&NLloGZl.<90a6@=-xccYs;_(kmGUo&S~C8x4Owv7Jj8yK]V_%');
define('AUTH_SALT',        'z+y{F^WW?/[rf%6Sld V~mt;OGcY46h&A_sP<NDfmZuHg_Y^?Sh{V} v,?qrH/<9');
define('SECURE_AUTH_SALT', 'Jt=8paURC _iZ6IvH6&bYr.$q7Jy~Z.@P;o:,CM9DXln$r`I F[gTFP)A=|X:i5#');
define('LOGGED_IN_SALT',   '2!jZBJbI7EyrZ[<~6?wa0.W`XYs[epL5HJ2%*7`nw/s}}+/qm:`N[!IYV_IJq3]*');
define('NONCE_SALT',       '6C.@Wp^lrh,F;m$f.R_{QJB_G.KpAOb6{9o=~ds]Gz4oVHP- 4#]{?a7>QO`;gU1');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');