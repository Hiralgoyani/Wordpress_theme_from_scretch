jQuery(document).ready(function() {
	jQuery('#menu-primary-menu').slicknav();

	jQuery('.testimonials-list').bxSlider({
		controls: false,
		mode: 'fade'
	});

});

window.onscroll = () => {
	let scroll = window.scrollY;
	fixedMenu(scroll);
}

//Adds fix menu on top
function fixedMenu(scroll){
	const headerScroll = document.querySelector('.navigation-bar');

	//  In the case that the scroll is greater than 300 add some classes
	if (scroll > 300) {
		headerScroll.classList.add('fixed-top') 
	}else{
		headerScroll.classList.remove('fixed-top') 
	}

	
}