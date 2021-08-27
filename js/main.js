$('.btn-box ul li').click(function () {
	$(this).addClass('active').siblings().removeClass('active')
})

var book = document.querySelector('#book')
var question = document.querySelector('#question')

$('.btn-box ul li').click(function () {
	if (book.classList.contains('active')) {
		$('#bx1').fadeIn()
		$('#bx2').fadeOut()
	} else {
		$('#bx1').fadeOut()
	}
	if (question.classList.contains('active')) {
		$('#bx2').fadeIn()
		$('#bx1').fadeOut()
	} else {
		$('#bx2').fadeOut()
	}
})

if (innerWidth >= 800) {
	new Splide('#splide', {
		perPage: 3,
		rewind: true,
	}).mount()
} else if (innerWidth <= 799 && innerWidth >= 638) {
	new Splide('#splide', {
		perPage: 2,
		rewind: true,
	}).mount()
} else if (innerWidth <= 640) {
	new Splide('#splide', {
		perPage: 1,
		rewind: true,
	}).mount()
}
document.querySelector('.splide__arrow--prev').style = 'opacity:0;width:50px;height:50px;'
document.querySelector('.splide__arrow--next').style = 'opacity:0;width:50px;height:50px;'

window.onresize = function () {
	location.reload()
}
