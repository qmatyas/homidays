<h2>Contactez-nous</h2>

<p>Vous avez une question?</p>
<p>La réponse est peut être dans notre <a class="aide" id="aide" href="#">Aide</a></p>
<p>Si vous ne trouvez pas ce que vous cherchez, merci de nous laisser un message dans le formulaire ci-dessous.</p>
    
<?php

if (!empty($erreur_contact)) {

	echo '<ul>'."\n";
	
	foreach($erreur_contact as $e) {
	
		echo '	<li>'.$e.'</li>'."\n";
	}
	
	echo '</ul>';
}

echo $form_contact;