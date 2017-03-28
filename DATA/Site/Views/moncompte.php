<?php
		$title='Mon compte';
		$pageCSS='moncompte';
		ob_start(); //mise en tempon début
		
		if($userID==$utilisateurID) //Si le compte demandé est celui de l'utilisateur courant
		{
			echo '
			<div id="corpsMonCompte">

			  <div id="boxInfoUser">
			  <section>
				<div class="usr">';
			
					echo '<img  src="./uploads/avatar/'.$user['avatar'].'"  width="220" height="220"/>
				
				</div>';
				
				echo '<ul>';
				  if($user['pseudo']!=NULL)	
				  {
					  echo '<li><h2>'.$user['pseudo'].'</h2></li>';
					  
					  echo'<li>'.$user['prenom'].' '.$user['nom'].'</li>';
				  }
				  else	echo '<li><h2 class="no_pseudo">'.$user['prenom'].'<br>'.$user['nom'].'</h2></li>';
				  
				  if($user['nomGroupe']!=NULL) echo '<li>'.$user['nomGroupe'].'S'.$user['semestre'].'</li>';
				  
				  if($statutUtilisateur=="Administrateur") echo '<li id="statut">Statut : <a href="index.php?page=administration&compte='.$utilisateurID.'">'.$user['statut'].'</a></li>';
				  else echo '<li id="statut">Statut : '.$user['statut'].'</li>';
				 
				  echo '<div id=mailtel>';
				  
				  if ($user['tel']!=NULL)  echo '<li span="telmail">Tel : '.$user['tel'].'</li>';
				  else echo '<li> Numéro de téléphone non communiqué </li>';
				  
				  if ($user['mail']!=NULL) echo '<li span="telmail">Mail : '.$user['mail'].'</li>';
				  else echo '<li> Mail non communiqué </li>';
				  
				  echo '</div>';
				  
				
				'</ul>';
				  
				echo'<div id=OUTILS>
				<h2 class = Outils>Outils</h2>';
				echo '<a class ="liensOutils" href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'">Modifier mon compte</a>'; 
				echo '<a class ="liensOutils" href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'">Calculer sa moyenne</a>'; 
				echo '<a class ="liensOutils" href="http://edt.jordan-martin.fr/'.$user["edt"].'"> Voir mon emploi du temps</a>';
				echo '<a class ="liensOutils" href="index.php?page=groupe&compte='.$userID.'"> Ma page de groupe</a>';
				echo '</div>';
				echo'</div>
			
				</section>

			<div id="news">
			
				<div class = "ressources">
					<h3>Mes ressources</h3>';
					if($cours!=false)
					{
						$i=0;
						foreach($cours as $list)
						{
							echo '
							<a  href="index.php?page=cours&actionCours=afficher&moduleID='.$list['moduleIDC'].'#'.$list['coursID'].'">
								<div id="bulle">
									<ul>
										<li class="titre_bulle">'.$list['titre'].' ('.$list['nomCours'].')</li>
										<li class="date">Le '.$list['dateCours'].'</li>
									</ul>
								</div>
							</a>';
							$i++;
						}
						if($i<3)
						{
							echo '<div id="bulle">
								<ul>
									<li class="date">Pas d\'autre cours téléversé</li>
								</ul>
							</div>';
						}
					}
					else
					{
						echo '<p>Aucun cours téléversé récemment.</p>';
					}
				echo '</div>
			
				<div class ="forum">
					<h3>Mes sujets</h3>';
						if($messages!=false)
						{
							$i=0;
							foreach($messages as $list)
							{
								echo '
								<a  href="index.php?page=forum&sujet='.$list['sujetID'].'#'.$list['messageID'].'">
									<div id="bulle">
										<ul>
											<li class="titre_bulle">"'.substr($list['contenu'],0,150).'..."</li>
											<li class="date">Le '.$list['dateMessage'].'</li>
											<li class="sujet">Sur le sujet "<span class="nom_sujet">'.$list['nom'].'</span>"</li>
										</ul>
									</div>
								</a>';
								$i++;
							}
							if($i<3)
							{
								echo '<div id="bulle">
								<ul>
									<li class="date">Pas d\'autre message publié</li>
								</ul>
							</div>';
							}
						}
						else
						{
							echo '<p>Aucun message publié récemment.</p>';
						}
				echo '</div>
								
				<div class ="tutorat">
					<h3>Mes tutorats</h3>
					<a  href="index.php?page=tutorats&actionTutorat=consulter">';
					if($tutorats!=false)
					{
						$i=0;
						foreach($tutorats as $list)
						{
							echo '
								<div id="bulle">
									<ul>
										<li class="titre_bulle">'.$list['nomModule'].'</li>
										<li class="date">Le '.date_format(new DateTime($list['jour']),"d/m/Y").', de '.substr($list['heureDebut'], 0, 2).'h à '.substr($list['heureFin'], 0, 2).'h</li> 
										<li>'.$list['salle'].'</li>
									</ul>
								</div>
							';
							$i++;
						}
						if($i<3)
						{
							echo '<div id="bulle">
								<ul>
									<li class="date">Pas d\'autre tutorat</li>
								</ul>
							</div>';
						}
					}
					else
					{
						echo '<p>Aucun tutorat prochainement</p>';
					}
				echo '</a>
				</div>
			</div>
							
		</div>	';
				
		}
		
		//Si le compte demandé est public ou appartient à un admin, enseignant ou tuteur
		elseif($user['public']==true || $user['statut']=="Administrateur" || $user['statut']=="Tuteur" || $user['statut']=="Enseignant")
		{
			echo '
			<div id="corpsMonCompte">
			
			  <div id="boxInfoUser">
			  <section>
				<div class="usr">';
				
			echo '<img  src="./uploads/avatar/'.$user['avatar'].'"  width="220" height="220"/>
			
				</div>';
			
			echo '<ul>';
			if($user['pseudo']!=NULL)				  {
				echo '<li><h2>'.$user['pseudo'].'</h2></li>';
					
				echo'<li>'.$user['prenom'].' '.$user['nom'].'</li>';
			}
			else
			{
				echo '<li><h2 class="no_pseudo">'.$user['prenom'].'<br>'.$user['nom'].'</h2></li>';
			}
			
			if($user['nomGroupe']!=NULL)
			{
				echo '<li>'.$user['nomGroupe'].'S'.$user['semestre'].'</li>';
			}
			
			echo '<li id="statut">Statut : '.$user['statut'].'</li>';
				
			echo '<div id=mailtel>';
			if ($user['tel']!=NULL)
			{
				echo '<li>Tel : '.$user['tel'].'</li>';
			}
			else
			{
				echo '<li> Numéro de téléphone non communiqué </li>';
			}
			if ($user['mail']!=NULL)
			{
				echo '<li>Mail : '.$user['mail'].'</li>';
			}
			else
			{
				echo '<li> Mail non communiqué </li>';
			}
			echo '</div>
					
		</div>	';
		}
		
		elseif($user['public']==false) //Sinon si le compte est privé
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';
		}

		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
