function asideFixed () {
	const wt = $(window).scrollTop() + 105
	const aside = $(".aside-wrap")
	const at = $(aside).offset()
	const ct = $('.aside-top-pos').offset().top;
	const cw = $(".container_wr").width();
	const ww = $("#wrapper").width();
	let leftTotal = (ww-cw) / 2
	if (wt >= at.top && wt >= ct) {
		$(aside).css({
			position: 'fixed',
			left: leftTotal+'px',
			top: '105px',
			height: ""
		})
	} else {
		$(aside).css({
			position: '',
			left: "",
			top: "0"
		})
	}
}

$(document)
.on("scroll",asideFixed)

$(window)
.on('resize',asideFixed)