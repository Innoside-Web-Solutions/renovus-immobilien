document.addEventListener('DOMContentLoaded', () => {
	const accordions = document.querySelectorAll('.wp-block-tsc-inno-akkordeon');

	accordions.forEach((accordion) => {
		const button = accordion.querySelector('button.inno-accordion-button');
		const content = accordion.querySelector('.inno-accordion-content');

		if (!button || !content) return;

		// Initiale Sichtbarkeit sicherstellen (kann im CSS animiert werden)
		content.hidden = true;
		button.setAttribute('aria-expanded', 'false');

		button.addEventListener('click', () => {
			const isExpanded = button.getAttribute('aria-expanded') === 'true';

			// aria-expanded aktualisieren
			button.setAttribute('aria-expanded', String(!isExpanded));

			// Sichtbarkeit ändern
			content.hidden = isExpanded;

			// Klasse am äußeren Block toggeln (für CSS z. B. Animation)
			accordion.classList.toggle('is-open', !isExpanded);
			accordion.classList.toggle('is-closed', isExpanded);
		});
	});
});
