<?php include 'global/trads/accueil_' . LANG . '.php'; ?>
<div class="accueil">
	<h1 class="bienvenue"><?= Utilisateur_est_connecte() ? TXT_BIENV  .htmlspecialchars($_SESSION['Utilisateur']['pseudo'])  : TXT_BIENV_M; ?></h1> 


<script>
    function visibilite(thingId){
    var targetElement;
    targetElement = document.getElementById(thingId) ;
        
        if (targetElement.style.display == "none"){
        targetElement.style.display = "" ;
        
        } else {
        targetElement.style.display = "none" ;
        }
    }
</script>
	
<a class="bouton" href="javascript:visibilite('divid');"><h2><?= TXT_BOUTON; ?></h2></a>
<div id="divid" style="display:none;">
    <p><?= TXT_ST1; ?></p>
    <p><?= TXT_ST2; ?></p><br>
    <p><b><?= TXT_ST3; ?></b></p>
</div>

	<form action="index.php?module=logements&action=lister" method="get" class="recherche">
	    <input type="hidden" name="module" value="logements">
	    <input type="hidden" name="action" value="lister">
	    <input class="barre_recherche" type="text" name="ville" class="ville" placeholder="<?= TXT_PLACEHOLDER; ?>" value="<?= (isset($_GET['ville']) ? $_GET['ville'] : ''); ?>">
	    <input class="valid_recherche" type="submit" value="<?= TXT_RECHERCHER; ?>">
	</form>

<?php include 'global/themes.php'; ?>

</div>