<?php

//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
$titre = "Index du forum";
include("includes/identifiants.php");
include("includes/hautf.php");
    
?>

<h1>Forum</h1>

<?php

//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;

//Cette requête permet d'obtenir tout sur le forum
$query=$db->prepare('SELECT cat_id, cat_nom, 
forum.forum_id, forum_nom, forum_description, forum_message, forum_sujet, auth_vue, sujets.sujet_id,  sujets.sujet_message, message_id, message_date, message_createur, pseudo, 
utilisateurs.id 
FROM categories
LEFT JOIN forum ON categories.cat_id = forum.forum_cat_id
LEFT JOIN messages ON messages.message_id = forum.forum_dernier_message_id
LEFT JOIN sujets ON sujets.sujet_id = messages.sujet_id
LEFT JOIN utilisateurs ON utilisateurs.id = messages.message_createur
WHERE auth_vue <= :lvl 
ORDER BY categories.cat_ordre, forum.forum_ordre DESC');
$query->bindValue(':lvl',$lvl,PDO::PARAM_INT);
$query->execute();

?>

<table>
<?php
//Début de la boucle
while($data = $query->fetch())
{
    //On affiche chaque catégorie
    if( $categorie != $data['cat_id'] )
    {
        //Si c'est une nouvelle catégorie on l'affiche
       
        $categorie = $data['cat_id'];
        ?>
        <tr>
        <th></th>
        <th class="titre"><strong><?php echo stripslashes(htmlspecialchars($data['cat_nom'])); ?>
        </strong></th>             
        <th class="nombremessages"><strong>Sujets</strong></th>       
        <th class="nombresujets"><strong>Messages</strong></th>       
        <th class="derniermessage"><strong>Dernier message</strong></th>   
        </tr>
        <?php
               
    }

    //Ici, on met le contenu de chaque catégorie
   
    // Ce super echo de la mort affiche tous les forums en détail : description, nombre de réponses etc...

    echo'<tr><td><img src="./images/message.gif" alt="message" /></td>
    <td class="titre"><strong>
    <a href="./voirforum.php?f='.$data['forum_id'].'">
    '.stripslashes(htmlspecialchars($data['forum_nom'])).'</a></strong>
    <br />'.nl2br(stripslashes(htmlspecialchars($data['forum_description']))).'</td>
    <td class="nombresujets">'.$data['forum_sujet'].'</td>
    <td class="nombremessages">'.$data['forum_message'].'</td>';

    // Deux cas possibles :
    // Soit il y a un nouveau message, soit le forum est vide
    if (!empty($data['forum_message']))
    {
         //Selection dernier message
	 $nombreDeMessagesParPage = 15;
         $nbr_post = $data['sujet_message'] +1;
	 $page = ceil($nbr_post / $nombreDeMessagesParPage);
		 
         echo'<td class="derniermessage">
         '.date('H\hi \l\e d/M/Y',$data['message_date']).'<br />
         <a href="./voirprofil.php?m='.stripslashes(htmlspecialchars($data['utilisateurs.id'])).'&amp;action=consulter">'.$data['utilisateurs.pseudo'].'  </a>
         <a href="./voirtopic.php?t='.$data['sujet_id'].'&amp;page='.$page.'#p_'.$data['message_id'].'">
         <img src="./images/go.gif" alt="go" /></a></td></tr>';

     }
     
     else
     {
         echo'<td class="nombremessages">Pas de message</td></tr>';
     }

     //Cette variable stock le nombre de messages, on la met à jour
     $totaldesmessages += $data['forum_message'];

     //On ferme notre boucle et nos balises
}

$query->CloseCursor();

echo '</table></div>';

//Le pied de page ici :
include CHEMIN_VUE.'footer';

//On compte les membres
$TotalDesMembres = $db->query('SELECT COUNT(*) FROM utilisateurs')->fetchColumn();
$query->CloseCursor();	
$query = $db->query('SELECT pseudo, id FROM utilisateurs ORDER BY id DESC LIMIT 0, 1');
$data = $query->fetch();
$derniermembre = stripslashes(htmlspecialchars($data['pseudo']));

echo'<p>Le nombre total de messages du forum est <strong>'.$totaldesmessages.'</strong>.<br />';
echo'Le site et le forum comptent <strong>'.$TotalDesMembres.'</strong> membres.<br />';
echo'Le dernier membre est <a href="./voirprofil.php?m='.$data['id'].'&amp;action=consulter">'.$derniermembre.'</a>.</p>';
$query->CloseCursor();
?>
</div>
</body>
</html>
