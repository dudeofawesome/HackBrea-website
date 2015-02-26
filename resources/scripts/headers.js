function SpecialScroll (applyTo, relativeSpeed) {
	this.relativeSpeed = relativeSpeed;
    this.applyTo = applyTo;
	this.onscroll = function (scroll) {
        var newPos = scroll * -this.relativeSpeed;
        this.applyTo.style.transform = "translateY(" + (newPos) + "px)";
        this.applyTo.style.webkitTransform = "translateY(" + (newPos) + "px)";
	}
}