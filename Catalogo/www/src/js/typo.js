Paged.registerHandlers(class extends Paged.Handler {
	constructor(chunker, polisher, caller) {
	  super(chunker, polisher, caller);
	}
  
	beforeParsed(content) {
	  const styles = content.querySelectorAll('style');
	  styles.forEach(style => {
		style.textContent = style.textContent.replace(/\[class~="not-prose"\]\s*\*\)\)::before/g, '');
	  });
	}
  });