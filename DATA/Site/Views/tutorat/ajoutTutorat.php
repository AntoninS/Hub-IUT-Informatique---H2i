<?php
		$title='H2I - Tutorat';
		$pageCSS='tutorats';

		ob_start(); //mise en tempon début

    echo'
			<div class="formulaireAjoutTutorat">
				<div class="formulaireAjoutTutorat-entete">Renseignez vos informations</div>

	      <form method="post" action=index.php?page=tutorats>

					<p>
						<label for="selectionModuleTutorat"><span>Pour quel module ? : <span class="required">*</span></span><select name="selectionModuleTutorat" class="champSelection"/></label>';
							foreach ($modulesDisponibles as $module)
							{
									$moduleSansEspace = str_replace(' ', '_', $module['nomModule']);		//On remplace les espaces par des '_' , sinon après dans la valeur option value les espaces passent pas
									echo'<option value='.$moduleSansEspace.'> '.$module['nomModule'].'';
							}
							echo'
						</select>
					</p>

					<p><label for="choixJourTutorat"><span>Quel jour ? : <span class="required">*</span></span><input type="text" id="datepicker"  name="choixJourTutorat" class="champInsertion"/></label></p>

					<p><label for="choixHeureTutorat"><span>A quelle heure ? : <span class="required">*</span></span><input id="timepicker" type="text" name ="choixHeureTutorat" class="champInsertion"/></label></p>

					<p><label for="choixSalleTutorat"><span>Dans quelle salle ? : <span class="required">*</span></span><input type="text" name ="choixSalleTutorat" class="champInsertion"/></label></p>

					<p>
						<label for="commentaireTutorat"><span>Ajouter un commentaire : </span>
						<textarea rows="3" cols="30" name="commentaireTutorat" class="champTextArea">Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...</textarea>
						</label>
					</p>

					<p>
						<label><span>Durée souhaitée : <span class="required">*</span></span>
						<input type="radio" name="dureeTutorat" value ="1"/> 1h
						<input type="radio" name="dureeTutorat" value ="2"/> 2h
						</label>
					</p>

					<a href ="index.php?page=tutorats" id="boutonAnnuler">Annuler</a>
					<input type="submit" value="Envoyer la demande" /></label>
					<p>IMPORTANT : Le tutorat ne sera actif que lorsqu\'un autre élève l\'aura rejoint.</p>
	      </form>
			</div>

			';

    $content = ob_get_contents(); //récuprération du tampon dons une var
    ob_end_clean(); // vide le tampon
    require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
