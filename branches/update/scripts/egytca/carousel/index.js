if (typeof Egytca === 'undefined')
	var Egytca = {};

Egytca.Carousel = function() {
	this.createElem();
	this.imageSources = [];
};

Egytca.Carousel.prototype = {

	activate: function(imageSource) {

		if (this.imageSources.length === 0)
			return

		if (imageSource === undefined)
			imageSource = this.imageSources[0];

		this.setImage(imageSource);
		document.body.appendChild(this.elem);
	},

	deactivate: function() {
		document.body.removeChild(this.elem);
	},

	createElem: function() {
		var wrapper = document.createElement('div');
		wrapper.className = 'egtc-carousel';

		var overlay = document.createElement('div');
		overlay.className = 'egtc-carousel-overlay';
		overlay.addEventListener('click', this.deactivate.bind(this));
		wrapper.appendChild(overlay);

		var imageWrapper = document.createElement('div');
		imageWrapper.className = 'egtc-carousel-image-wrapper';
		wrapper.appendChild(imageWrapper);

		var image = document.createElement('img');
		imageWrapper.appendChild(image);
		this.imageElem = image;

		var previousImageButton = this.createButton('<', 'egtc-carousel-previous');
		previousImageButton.addEventListener('click', this.previous.bind(this));
		wrapper.appendChild(previousImageButton);

		var nextImageButton = this.createButton('>', 'egtc-carousel-next');
		nextImageButton.addEventListener('click', this.next.bind(this));
		wrapper.appendChild(nextImageButton);

		this.elem = wrapper;
	},

	createButton: function(text, className) {
		var button = document.createElement('button');
		button.type = 'button';
		button.className = className;
		button.appendChild(document.createTextNode(text));
		return button;
	},

	addImage: function(source, trigger) {
		this.imageSources.push(source);
		if (trigger !== undefined)
			this.addTrigger(trigger, source);
	},

	removeImage: function(source) {
		var i = this.imageSources.indexOf(source);
		this.imageSources.splice(i, 1);
	},

	setImage: function(source) {

		var i = this.imageSources.indexOf(source);

		if (i < 0) {
			throw 'image not found';
		} else {
			this.index = i;
		}

		this.imageElem.src = source;
	},

	previous: function() {
		var i = this.index <= 0 ? (this.imageSources.length - 1) : (this.index - 1);
		this.setImage(this.imageSources[i]);
	},

	next: function() {
		var i = this.index >= (this.imageSources.length - 1) ? 0 : (this.index + 1);
		this.setImage(this.imageSources[i]);
	},

	addTrigger: function(elem, source) {
		elem.addEventListener('click', this.activate.bind(this, source));
	}

};

Egytca.Carousel.createFromDocument = function() {

	var triggers = document.querySelectorAll('[data-egtc-carousel]');
	var carousels = {};

	for (var i = 0; i < triggers.length; i++) {

		var trigger = triggers[i];
		var parts = trigger.getAttribute('data-egtc-carousel').split(',');
		var source = parts[0];
		var carouselName = parts[1] === undefined ? 'default' : parts[1];

		if ( !(carouselName in carousels) ) {
			carousels[carouselName] = new Egytca.Carousel();
		}
		carousels[carouselName].addImage(source);
		carousels[carouselName].addTrigger(trigger, source);
	}

	return carousels;
};
