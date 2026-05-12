function selectedOption(activeItem, disabledItem) {
	const options = document.querySelectorAll('.aservice-item-govco');
	options.forEach((element) => {
		element.classList.remove('selected');
		element.classList.remove('disabled');
	});
	document.getElementById(activeItem).classList.add('selected');
	document.getElementById(disabledItem).classList.add('disabled');
	document
		.getElementById('alerta-service')
		.setAttribute('style', 'display: block');
	document
		.getElementById('comentarios1-button')
		.setAttribute('style', 'display: block');
	options.forEach((element) => {
		element.setAttribute('tabindex', '-1');
	});
}

function verComentarios() {
	const options = document.querySelectorAll('.aservice-item-govco');
	options.forEach((element) => {
		element.classList.add('disabled');
	});
	document
		.getElementById('alerta-service')
		.setAttribute('style', 'display: none');
	document
		.getElementById('comentarios1-button')
		.setAttribute('style', 'display: none');
	document
		.getElementById('aservice-comentarios')
		.setAttribute('style', 'display: block');
	document
		.getElementById('comentarios2-button')
		.setAttribute('style', 'display: block');
	document.getElementById('aservice-comentarios-textarea').focus();
	document.getElementById('aservice-comentarios-textarea').value = '';
}

function contadorTextArea() {
	document.getElementById('aservice-comentarios-textarea').onkeyup = (e) => {
		if (e.target.value.length >= 10) {
			document
				.getElementById('aservice-comentarios-textarea')
				.classList.remove('errorTextArea');
			document
				.getElementById('aservice-comentarios-textarea')
				.classList.add('successTextArea');
			document
				.getElementById('aservice-comentarios-alert')
				.setAttribute('style', 'display: none');
			document
				.getElementById('comentarios2-button-item')
				.removeAttribute('disabled');
		} else if (e.target.value.length == 0) {
			document
				.getElementById('aservice-comentarios-textarea')
				.classList.remove('errorTextArea');
			document
				.getElementById('aservice-comentarios-alert')
				.setAttribute('style', 'display: none');
			document
				.getElementById('aservice-comentarios-textarea')
				.classList.remove('successTextArea');
			document
				.getElementById('comentarios2-button-item')
				.setAttribute('disabled', 'true');
		} else {
			document
				.getElementById('aservice-comentarios-textarea')
				.classList.remove('successTextArea');
			document
				.getElementById('aservice-comentarios-textarea')
				.classList.add('errorTextArea');
			document
				.getElementById('aservice-comentarios-alert')
				.setAttribute('style', 'display: block');
			document
				.getElementById('comentarios2-button-item')
				.setAttribute('disabled', 'true');
		}
	};
}

function enviarComentarios() {
	document
		.getElementById('aservice-comentarios')
		.setAttribute('style', 'display: none');
	document
		.getElementById('comentarios2-button')
		.setAttribute('style', 'display: none');
	document
		.getElementById('alerta-service')
		.setAttribute('style', 'display: block');
	document
		.getElementById('alerta-service')
		.setAttribute('style', 'margin-bottom: 0px !important;');
}

/** Solicitud nueva: experiencia en banner horizontal (IDs con sufijo `-banner`) */
function selectedOptionBanner(activeItemId, disabledItemId) {
	const root = document.getElementById('horizontal-banner-experiencia');
	if (!root) {
		return;
	}
	const options = root.querySelectorAll('.aservice-item-govco');
	options.forEach((element) => {
		element.classList.remove('selected');
		element.classList.remove('disabled');
	});
	const active = document.getElementById(activeItemId);
	const disabled = document.getElementById(disabledItemId);
	if (active) {
		active.classList.add('selected');
	}
	if (disabled) {
		disabled.classList.add('disabled');
	}
	const ratingWrap = document.getElementById('banner-experiencia-rating-wrap');
	const alertEl = document.getElementById('alerta-service-banner');
	if (ratingWrap) {
		ratingWrap.style.display = 'none';
	}
	if (alertEl) {
		alertEl.style.display = 'block';
	}
	options.forEach((element) => {
		element.setAttribute('tabindex', '-1');
	});
}

function verComentariosBanner() {
	const root = document.getElementById('horizontal-banner-experiencia');
	if (!root) {
		return;
	}
	const options = root.querySelectorAll('.aservice-item-govco');
	options.forEach((element) => {
		element.classList.add('disabled');
	});
	const step1Wrap = document.getElementById('comentarios1-button-banner');
	const comments = document.getElementById('aservice-comentarios-banner');
	const step2 = document.getElementById('comentarios2-button-banner');
	if (step1Wrap) {
		step1Wrap.style.display = 'none';
	}
	if (comments) {
		comments.style.display = 'block';
	}
	if (step2) {
		step2.style.display = 'block';
	}
	const ta = document.getElementById('aservice-comentarios-textarea-banner');
	if (ta) {
		ta.value = '';
		ta.classList.remove('errorTextArea', 'successTextArea');
		ta.focus();
	}
	const alertMsg = document.getElementById('aservice-comentarios-alert-banner');
	if (alertMsg) {
		alertMsg.style.display = 'none';
	}
	const submitBtn = document.getElementById('comentarios2-button-item-banner');
	if (submitBtn) {
		submitBtn.setAttribute('disabled', 'true');
	}
}

function experienciaBannerOnInput() {
	const ta = document.getElementById('aservice-comentarios-textarea-banner');
	const alertEl = document.getElementById('aservice-comentarios-alert-banner');
	const btn = document.getElementById('comentarios2-button-item-banner');
	if (!ta || !btn) {
		return;
	}
	const len = ta.value.length;
	if (len >= 10) {
		ta.classList.remove('errorTextArea');
		ta.classList.add('successTextArea');
		if (alertEl) {
			alertEl.style.display = 'none';
		}
		btn.removeAttribute('disabled');
	} else if (len === 0) {
		ta.classList.remove('errorTextArea', 'successTextArea');
		if (alertEl) {
			alertEl.style.display = 'none';
		}
		btn.setAttribute('disabled', 'true');
	} else {
		ta.classList.remove('successTextArea');
		ta.classList.add('errorTextArea');
		if (alertEl) {
			alertEl.style.display = 'block';
		}
		btn.setAttribute('disabled', 'true');
	}
}

function enviarComentariosBanner() {
	const comments = document.getElementById('aservice-comentarios-banner');
	const step2 = document.getElementById('comentarios2-button-banner');
	const alertEl = document.getElementById('alerta-service-banner');
	const ratingWrap = document.getElementById('banner-experiencia-rating-wrap');
	if (comments) {
		comments.style.display = 'none';
	}
	if (step2) {
		step2.style.display = 'none';
	}
	if (ratingWrap) {
		ratingWrap.style.display = 'none';
	}
	if (alertEl) {
		alertEl.style.display = 'block';
		alertEl.style.marginBottom = '0';
	}
}
