<?php
		$title='Mon groupe';
		$pageCSS='groupe';
		ob_start(); //mise en tampon début
		
		echo '<div id="couv">
			
			<h1>Mon groupe</h1>
				
			<h2>'.$groupe['NomGroupe'].'S'.$groupe['Semestre'].'</h2>
					
		</div>
				
		<div id="membres">
				
			<h3>Membres</h3>
				
			<ul>';
		
				foreach($listeGroupe as $membre)
				{
					echo '<li>'.$membre['prenom'].' '.$membre['nom'].'</li>';
				}
			
			echo '</ul>
				
		</div>
				
		<div id="bloc">
				
				<div id="nav">
					
					<ul>
						<li><a href="">Annonces</a></li>
						<li><a href="index.php?page=groupe&actionGroupe=ressources&compte='.$utilisateurID.'">Ressources</a></li>';
			
						if($groupe['responsable']==null)
						{
							echo '<li><a href="index.php?page=groupe&actionGroupe=election&compte='.$utilisateurID.'">�lection</a></li>';
						}
					echo '</ul>
				
				</div>
				
				<div id="channels">
					
					<ul>
						<li><a href="">Fil d\'actualité</a></li>
						<li><a href="">DS/évaluations</a></li>
						<li><a href="">Absences</a></li>
						<li><a href="">Autres informations</a></li>
						<li><a href="">Random</a></li>
					</ul>
							
				</div>
							
				<div id="annonces">
					
					<table>';
					
						foreach($annonces as $ligne)
						{
							
							echo '<tr id="'.$ligne['annonceID'].'">
									
								<td id="informations">
									<a href="index.php?page=monCompte&compte='.$ligne['auteurID'].'"><p class="auteur">'.$ligne['prenomAuteur'].' '.$ligne['nomAuteur'].'</p>
										<img class="avatar" alt="account" src="media/images/account.png" />
									</a>
								</td>';
							
							if(isset($annonceEdition) && $ligne['annonceID']==$annonceEdition)
							{
								echo '<td id="rep">
									<form method="post" action="index.php?page=groupe&actionForum=modif_annonce">
									  <p><input type="hidden" name="id" value='.$ligne['annonceID'].'></p>
									  <p><textarea name="message" id="message" placeholder="">'.$contenu.'</textarea></p>
									  <p><input type="submit" value="Publier" class="button"></p>
									</form>
								</td>';
							}
							
							else
							{
								echo '<td id="rep">
										
								<p class="nom">'.$ligne['nom'].'</p>
										
								<p class="date">'.$ligne['dateAnnonce'].'</p>';
							
								echo '<p id="contenu">'.substr($ligne['message'],0,250).'</p>';
							
								if($ligne['modification']!=NULL)
								{
									echo '<p class="dateModif">Annonce modifié le '.$ligne['modification'].'</p>';
								}
							
								if($ligne['auteurID']==$utilisateurID || $ligne['responsable']==$utilisateurID)
								{
									echo '<p><a href="index.php?page=groupe&actionGroupe=supprimer&ida='.$ligne['annonceID'].'"><img class="poubelle" src="media/images/poubelle.png" alt="Supprimer"></a></p>';
									echo '<p><a href="index.php?page=groupe&actionGroupe=editer&ida='.$ligne['annonceID'].'" id="delete">Editer</a></p>';
								}
								
								echo '<p class="comments"><a href="index.php?page=groupe&actionGroupe=commentaires&ida='.$ligne['annonceID'].'">'.$ligne['nbComment'].' commentaires</a></p>';
								
								echo '</td>';
							}
							
							echo '</tr>';
							
						}
							
					echo '</table>
							
					<div id="noAnnonce">';
			
					for($i=1 ; $i<=$rapport+1 ; $i++)
					{
						if($i==$page)
						{
							echo '<span class="noCurrentPage">Page '.$i.'</span>';
						}
						else
						{
							echo '<a href="index.php?page=groupe&p='.$i.'" class="noPage">'.$i.'</a>';
						}
					}
			
					echo '</div>
							
					<h3>Ajouter une annonce</h3>
					
					<form method="post" action="index.php?page=groupe&actionGroupe=ajout_annonce" id="ajout_annonce">
					  <p><input type="text" name="nom" placeholder="Nom de l\'annonce"></p>
					  <p><textarea name="message" id="message" placeholder="Contenu de l\'annonce"></textarea></p>
					  <p><input type="submit" value="Publier" class="button"></p>
					</form>
							
				</div>
							
		</div>
				
		<div id="devoirs">
				
		</div>
				
		';

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
