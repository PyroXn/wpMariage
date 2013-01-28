<?php
/*
Plugin Name: Wedding
Description: Liste de mariage
Version: 0.1
License: GPL
Author: Florian Janson
*/
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') { do_action('deleteWedding', $_GET['id']); }
    }
if ( !class_exists("Wedding") )
{
    class Wedding
    {
       public function install() {
            global $wpdb;
            $query = "CREATE TABLE IF NOT EXISTS `wp_wedding` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `url_image` varchar(255) NOT NULL,
            `titre` varchar(255) NOT NULL,
            `description` text NOT NULL,
            `quantite` int(3) NOT NULL,
            `prix` float(3,2) NOT NULL,
            `url_cadeau` varchar(255) NOT NULL,
            `id_user` varchar(50) NOT NULL,
            PRIMARY KEY (`id`))";
            $wpdb->query($query);
            }
        
        public function uninstall() {
            global $wpdb;
            $query = "DROP TABLE wp_wedding";
            $wpdb->query($query);
        }
        
            
        public function createWedding() {
            global $wpdb;
            $query = "INSERT INTO  `sabinepierre`.`wp_wedding` (
                    `url_image` ,
                    `titre` ,
                    `description` ,
                    `quantite` ,
                    `prix` ,
                    `url_cadeau` ,
                    `id_user`)
                    VALUES ('".$_POST['urlImage']."',  '".$_POST['titre']."',  '".$_POST['description']."',  '".$_POST['quantite']."',  '".$_POST['prix']."',  '".$_POST['urlCado']."',  '0');";
            $wpdb->query($query);
            echo "Ajout effectue";
        }
        
        public function deleteWedding($arg1) {
            global $wpdb;
            $query = "DELETE FROM wp_wedding WHERE id = '".$arg1."'";
            $wpdb->query($query);
            echo "Element supprime";
        }
    }
    
     function wedding_menu() {
	add_options_page( 'Liste de mariage', 'Liste de mariage', 'manage_options', __FILE__, 'wedding_admin' );
     }
    
    function wedding_admin() {
        global $title;
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
        if (!isset($_POST['submitWedding']) && !isset($_POST['deleteWedding'])) {
            global $wpdb;
            $query = $wpdb->prepare("SELECT * FROM wp_wedding ORDER BY id DESC", 1);
            $liste = $wpdb->get_results($query);
            ?>
            <h2><?php echo $title;?></h2>
            <table class="wp-list-table widefat media" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                            <label class="screen-reader-text" for="cb-select-all-1">Tout sélectionner</label>
                            <input id="cb-select-all-1" type="checkbox">
                        </th>
                        <th scope="col" id="icon" class="manage-column column-icon" style=""></th>
                        <th scope="col" id="title" class="manage-column column-title sortable desc" style="">
                            <span>Cadeau</span>
                            <span class="sorting-indicator"></span>
                        </th>
                        <th scope="col" id="author" class="manage-column column-author sortable desc" style="">
                            <span>Quantite</span><span class="sorting-indicator"></span>
                        </th>
                        <th scope="col" id="comments" class="manage-column column-comments num sortable desc" style="">
                            <span>
                                <span class="vers">
                                    <div title="Commentaires" class="comment-grey-bubble"></div>
                                </span>
                            </span>
                            <span class="sorting-indicator"></span>      
                        </th>
                        <th scope="col" id="date" class="manage-column column-date sortable asc" style="">
                        <span>Commander</span>
                        <span class="sorting-indicator"></span>
                        </th>
                    </tr>
                </thead>
                <tbody id="the-list">
                <?php
                    foreach ($liste as $l) { ?>
                        <tr id="<?php echo $l->id; ?>" class="alternate author-self status-inherit" valign="top">
                            <th scope="row" class="check-column">
                                <label class="screen-reader-text" for="cb-select-38"><?php echo $l->titre; ?></label>
                                <input type="checkbox" name="media[]" id="cb-select-38" value="38">
                            </th>
                            <td class="column-icon media-icon">
                                <a title="<?php echo $l->titre; ?>">
                                    <img width="60" height="60" src="<?php echo $l->url_image; ?>" class="attachment-80x60" alt="<?php echo $l->titre; ?>">
                                </a>
                            </td>
                            <td class="title column-title">
                                <strong><a title="<?php echo $l->titre; ?>">
                                    <?php echo $l->titre; ?></a>
                                </strong>
                                <p><?php echo $l->description; ?></p>
                            </td>
                            <td class="author column-author"><?php echo $l->quantite; ?></td>
                            <td class="parent column-parent"><strong><?php echo $l->prix; ?></strong></td>
                            <td class="date column-date"><?php echo $l->url_cadeau; ?> - <form method="POST" id="deleteWedding"><input type="hidden" value="<?php echo $l->id; ?>" name="idWedding"><input type="submit" name="deleteWedding" value="Supp"></form></td>
                        </tr>
                <?php
                }
               ?>
            </tbody>
        </table>
        <hr>
        <form method="POST" id="addWedding">
            <label for="urlImage">Url de l'image :</label>
            <input name="urlImage" id="urlImage" type="text">
            <label for="titre">Titre :</label>
            <input name="titre" id="titre" type="text">
            <label for="description">Description :</label>
            <textarea name="description"></textarea>
            <label for="quantite">Quantite :</label>
            <input name="quantite" id="quantite" type="text" size="3">
            <label for="prix">Prix :</label>
            <input name="prix" id="prix" type="text" size="5">
            <label for="urlCado">Url du cadeau :</label>
            <input name="urlCado" id="urlCado" type="text">
            <input type="submit" name="submitWedding">
        </form>
        <?php
        } elseif (isset($_POST['submitWedding'])) {
           do_action('createWedding');
        } elseif (isset($_POST['deleteWedding'])) {
            do_action('deleteWedding', $_POST['idWedding']);
        }
        
    }
    register_activation_hook(__FILE__, array('Wedding','install'));
    register_deactivation_hook( __FILE__, array('Wedding','uninstall'));
    add_action('admin_menu', 'wedding_menu');
    add_action('createWedding', array('Wedding', 'createWedding'));
    add_action('deleteWedding', array('Wedding', 'deleteWedding'));
    }

?>