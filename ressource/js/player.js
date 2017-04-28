soundManager.url = 'swf/'; // Chemin du dossier "swf"
soundManager.debugMode = false; // DebugMode désactivé
soundManager.waitForWindowLoad = true; // Attendre le chargement de la page pour charger soundManager
soundManager.onerror = function() { // En cas d'erreur ...
	alert("SoundManager 2 a rencontré une erreur."); // ... on affiche un message à l'utilisateur
}
var playlist = []; // Tableau pour contenir la playlist
var current = 0; // Indice du son courant (dans playlist[]);
var act_vol = soundManager.defaultOptions.volume; // Variable pour le volume actuel, initialisée au volume par défaut de SoundManager
var loop = "all"; // Mode de répétition séléctionné
var next = false; // Indicateurs booléens du clic sur Previous et Next
var prev = false;

soundManager.onload = function() { // On attend tout d'abord le chargement...
	var barre = $("#barre"); // On récupère la barre d'avancement,
	var cpt = $("#cpt"); // le compteur de secondes,
	var list = document.getElementById("playlist").getElementsByTagName("a");//"music/22.mp3","music/99 Red Balloons.mp3"];
	for (var i=0;i<list.length;i++) { // On parcourt la liste
		(function(titre) {
			list[i].rel = i;
			playlist[i] = soundManager.createSound( // On crée un son pour chaque lien de la playlist
			{
				id : "piste"+i, // Id arbitraire : piste0, piste1, etc.
				url : list[i].href, // L'url de chaque son est le href de chaque lien
				whileplaying : function() { // Pendant la lecture :
					act_sec = parseInt(this.position/1000 % 60,10); // Calcul du nb de secondes écoulées
					if(act_sec<10) { act_sec = "0"+act_sec; } // (Ajout d'un 0 si <10)
					act_min = parseInt(this.position/1000/60,10); // Calcul du nb de minutes écoulées
					tot_sec = parseInt(this.duration/1000 % 60,10); // Calcul du nb de secondes total du son
					if(tot_sec<10) { tot_sec = "0"+tot_sec; } // (Ajout d'un 0 si <10)
					tot_min = parseInt(this.duration/1000/60,10); // Calcul du nb de minutes total du son
					cpt.text(act_min+":"+act_sec+" / "+tot_min+":"+tot_sec); // On affiche ces valeurs dans le div "cpt"
				},
				onstop : // Quand on fait "stop" :
					function() {
					playlist[current].unload(); // On "décharge" le son, histoire de pas occuper trop de mémoire
					},
				onfinish : // A la fin d'un son
					function() {
					playlist[current].unload(); // On "décharge" le son, histoire de pas occuper trop de mémoire
					if(!prev && !next) { // Si la fin du son n'est pas due à un clic sur Previous ou Next, on regarde le mode de répétition choisi
						if(loop=="one") { // Si "Répéter un titre"
							lire_current(); // On (re)lance la lecture du son actuel
						} else if(loop=="all") { // Si "Répéter la playlist"
							bouton_next(); // On appelle bouton_next() (On passe au titre suivante)
						} else { // Si "Ne pas répéter"
							if(current<playlist.length-1) { // Si on n'est pas encore à la fin de la playlist
								bouton_next(); // On passe au titre suivant
							} else { // Sinon
								current = 0; // On réinitialise juste le titre courant.
							}
						}
					}
					},
			});
		})(list[i]);
	}
}


function lire_current() { // Fonction de démarrage de la lecture
	soundManager.stopAll(); // On stoppe tous les sons (pour éviter le multi-shot
	playlist[current].setPosition(0); // On réinitialise la position du son courant
	playlist[current].setVolume(act_vol); // On applique le volume actuel
	playlist[current].play(); // On lance la lecture
	$("#play").find('span').removeClass("fa fa-play");
	$("#play").find('span').addClass("fa fa-pause"); // Le bouton "play" devient "pause"
	$("#play").find('span').attr('data-original-title',"Pause"); // On change le title également.
}
function bouton_play() { // Appui sur le bouton "play"
	if(playlist[current].playState) { // On teste si un titre est en cours de lecture/pause. Si oui
		b_play = $("#play"); // On récupère le bouton "play"
		if(playlist[current].paused) { // S'il est en pause
			playlist[current].resume(); // On le relance
			b_play.find('span').removeClass("fa fa-play");
			b_play.find('span').addClass("fa fa-pause"); // Le bouton "play" devient "pause"
			b_play.find('span').attr('data-original-title', "Pause"); // On change le title également
		} else { // S'il est en lecture
			playlist[current].pause(); // On le met en pause
			b_play.find('span').removeClass("fa fa-pause");
			b_play.find('span').addClass("fa fa-play"); // Le bouton "pause" devient "play"
			b_play.find('span').attr('data-original-title', "Lecture"); // On change le title également
		}
	} else { // Si le son est stoppé
		lire_current(); // On démarre la lecture
	}
}

function bouton_previous() { // Appui sur le bouton "précédent"
	prev = true; // On "actionne" le booléen prev
	current--; // On recule d'un titre
	if(current<0) { current = playlist.length - 1; } // Si on a trop reculé, on prend le dernier titre
	lire_current(); // On lance la lecture
	prev = false; // On "désactionne" le booléen
}
function bouton_next() { // Appui sur le bouton "suivant"
	next = true; // On "actionne" le booléen next
	current++; // On avance d'un titre
	if(current>=playlist.length) { current = 0; } // Si on a trop avancé, on prend le premier titre
	lire_current(); // On lance la lecture
	next = false; // On "désactionne" le booléen
}

function bouton_volume(aug) { // Appui sur les boutons du volume
	if(aug) { // Si appui sur "+"
		if(act_vol<100) { // Si on peut encore augmenter
		act_vol++; // On augmente
		timer = setTimeout(bouton_volume,20,true); // Et on relance la fonction
		}
	} else { // Si appui sur "-"
		if(act_vol>0) { // Si on peut encore diminuer
		act_vol--; // On diminue
		timer = setTimeout(bouton_volume,20,false); // Et on relance la fonction
		}
	}
	playlist[current].setVolume(act_vol); // On applique le volume au titre courant
}
