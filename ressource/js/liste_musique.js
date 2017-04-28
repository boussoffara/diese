var nbmusic, day, x, y, z, midi, midi_title;

nbmusic = 2; // mettez ici le nombre de musiques de votre liste de lecture
day = new Date();
z = day.getTime();
y = (z - (parseInt(z/1000,10) * 1000))/10;
x = parseInt(y/100*nbmusic,10) + 1; // ici on tire une musique au sort

// insérez en dessous chacune des musiques avec leur titre :
if (x == (1))
{
	midi="music/22.mp3";
	midi_title="22";
}

if (x == (2))
{
	midi="music/99 Red Balloons.mp3";
	midi_title="22";
}

/*document.write('<embed src= ' + midi + ' autostart="true" loop="true" ')
document.write('volume="100" align="center" width="1200" height="100">')
document.write('<p style="text-align:center;">Titre :  ' + midi_title + ' </p> ')*/
document.write('<audio src=' + midi + ' autoplay controls loop></audio>')
