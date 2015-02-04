<?php 

while ($donnes = $req->fetch())
{

	?>
	
<div class="cadre">
<span class="login"> <?php echo $donnes['Login']?></span>
<span class="msg"><?php echo $donnes['msg'] ?></span>
<span class="date"><?php echo $donnes['date'] ?> <Br/></span>
<?php 
if(isset ($cat['categorie']) AND $cat['categorie']==4){
	?>
<span class="supprimer"><a href="?p=forum_message&id=<?php echo $donnes['id_topic']?>&idmessage=<?php echo $donnes['ID_Message']?>"> <?php echo "supprimer" ?></a></span>
<?php } ?>
</div>




<?php	

}

?>
<?php if(!empty($_SESSION['Login']) && isset($_SESSION['Login'])){?>
<h3 class="NouveauCommentaire"> Ajoutez un nouveau commentaire <Br/> <Br/> </h3>
<form method="post" action="?p=forum_message&id=<?= $_GET['id'] ?>">
<p> Nouveau commentaire :  <input type="msg" name="msg"  required/></p>
<p> <input type="submit"   alt="valider"  /> </p>
</div>
<?php } else {echo 'connectez vous';} ?>
