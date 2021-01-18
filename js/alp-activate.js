//from https://slowe.github.io/VirtualSky/


if (document.getElementById('starmap')){
	var planetarium;

S(document).ready(function() {

	planetarium = S.virtualsky({
		id: 'starmap',	// This should match the ID used in the DOM
    background: 'rgb(0,49,60)',
    projection: 'stereo',
    transparent: true,
    scalestars: 2,
    showplanetlabels: false,
    showdate: false,
    showposition: false,
    cardinalpoints: false,
    live: true,
    constellations: true,
	});

});
}