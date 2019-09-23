var y = 1;
backSlider();
function backSlider() {
	var x = document.getElementById('backSlider');
	if(y>3) {
		y = 0;
	}else {
		x.style.background = 'url(img/slider_'+y+'.jpg)';
	}
	y++;
	setTimeout(backSlider,5000);
}