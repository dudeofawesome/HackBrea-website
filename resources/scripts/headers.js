function SpecialScroll (applyTo, relativeSpeed) {
	this.relativeSpeed = relativeSpeed;
    this.applyTo = applyTo;
	this.onscroll = function (scroll) {
	    if (!window.mobilecheck()) {
	        var newPos = scroll * -this.relativeSpeed;
	        this.applyTo.style.transform = "translate3d(0px, " + (newPos) + "px, 0px)";
	        this.applyTo.style.webkitTransform = "translate3d(0px, " + (newPos) + "px, 0px)";
	    }
	}
}
