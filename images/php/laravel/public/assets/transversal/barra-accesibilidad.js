/**
 * Gov.co (https://www.gov.co) - Gobierno de Colombia
 *  - Componente: Barra de accesibilidad
 *  - Version: 5.0.0
 */

function methodAssign(event, method, elements) {
  for (let i of elements) {
    i.addEventListener(event, method, false);
  }
}

function addEventHandler(el, evt, sel, handler) {
  for (const currEvt of evt.split(' ')) {
    el.addEventListener(currEvt, function (event) {
      let t = event.target;
      while (t && t !== this) {
        for (const currSel of sel.split(',') ) {
          if (t.matches(currSel)) {
            handler.call(t, event);
          }
        }
        t = t.parentNode;
      }
    });
  }
}

(function() {
  window.addEventListener("load", function () {
    initAccessibilityBar();
  });
})();

function initAccessibilityBar() {
  captureAccessibilityRootFontSize();
  addEventsAccessibilityBar();

  addEventHandler(
    document.body, 
    'click keydown', 
    '.barra-accesibilidad-govco', 
    function(event) {
      addEventsAccessibilityBar(event);
    }
  );
}

function addEventsAccessibilityBar(event = null) {
	const bars = document.querySelectorAll('.barra-accesibilidad-govco:not(.actived-events-govco)');
	for (const bar of bars) {
	  bar.classList.add('actived-events-govco');
  
	  const constrast = bar.querySelectorAll('button.contrast');
	  methodAssign("click", activeContrast, constrast);
  
	  const decrease = bar.querySelectorAll('button.decrease-font-size');
	  methodAssign("click", activeFontSize, decrease);
  
	  const increase = bar.querySelectorAll('button.increase-font-size');
	  methodAssign("click", activeFontSize, increase);
	}

	if (event == null || bars.length == 0) {
		return false;
	}

	let element = '';
	const barButton = event.target.closest('.barra-accesibilidad-govco button');
	if (barButton && barButton.matches('.contrast, .decrease-font-size, .increase-font-size')) {
		element = barButton;
	}

	if (element) {
		element.click();
	}
}

function activeContrast() {
  const element = document.querySelector('body');
  if (element.classList.contains('contrast-govco')) {
    element.classList.remove('contrast-govco');
  } else {
    element.classList.add('contrast-govco');
  }
  activeButtonAccessibility(this);
}

accesibilityBarCounterFontSize = 0;

/** Root `html` font-size in px before any bar adjustment (captured once). */
let accesibilityBarRootFontPx = null;

function captureAccessibilityRootFontSize() {
  if (accesibilityBarRootFontPx !== null) {
    return;
  }
  const raw = window.getComputedStyle(document.documentElement).getPropertyValue('font-size');
  accesibilityBarRootFontPx = parseFloat(raw);
  if (!Number.isFinite(accesibilityBarRootFontPx) || accesibilityBarRootFontPx <= 0) {
    accesibilityBarRootFontPx = 16;
  }
}

function applyAccessibilityRootFontSize() {
  captureAccessibilityRootFontSize();
  document.documentElement.style.fontSize =
    accesibilityBarRootFontPx + accesibilityBarCounterFontSize + 'px';
}

function activeFontSize() {
  let addition = this.classList.contains('decrease-font-size') ? -1 : 1;
  const decreaseLimit = parseInt(this.getAttribute('data-decrease-limit'), 10);
  const increaseLimit = parseInt(this.getAttribute('data-increase-limit'), 10);
  const decreaseLimitFinal = Number.isFinite(decreaseLimit) ? decreaseLimit : -5;
  const increaseLimitFinal = Number.isFinite(increaseLimit) ? increaseLimit : 5;

  accesibilityBarCounterFontSize += addition;

  if (accesibilityBarCounterFontSize >= decreaseLimitFinal && accesibilityBarCounterFontSize <= increaseLimitFinal) {
    applyAccessibilityRootFontSize();
  } else {
    accesibilityBarCounterFontSize = addition > 0 ? increaseLimitFinal : decreaseLimitFinal;
  }

  activeButtonAccessibility(this);
}

function activeButtonAccessibility(element) {
  element.parentNode.querySelector('.active')?.classList.remove('active');
  element.classList.add('active');
}
