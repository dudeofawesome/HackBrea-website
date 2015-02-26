var specialScrolls = [];
function setFastScroll (that) {
    specialScrolls.push(new SpecialScroll(that, 1.4));
}

function setSlowScroll (that) {
    specialScrolls.push(new SpecialScroll(that, -0.5));
}


document.onscroll = onscroll;
function onscroll () {
//	var ratio = window.getComputedStyle(document.getElementById('top-trapezoid')).getPropertyValue('height').split("px")[0] / window.getComputedStyle(document.getElementById('headerImg')).getPropertyValue('height').split("px")[0];
//
//	var _scrollY = window.scrollY * -ratio * 2 / 3 + 30;
//	_scrollY = Math.min(Math.max(_scrollY, -66), 30);
//	document.getElementById('top-trapezoid').style.transform = "translateY(" + (_scrollY - 30) + "px)";
//	document.getElementById('top-trapezoid').style.webkitTransform = "translateY(" + (_scrollY - 30) + "px)";
//
//	document.getElementById('linksBefore').style.left = (-_scrollY) + "px";
//	document.getElementById('linksAfter').style.right = (-_scrollY) + "px";
//
//	document.getElementById('siteIcon').style.width = (0.88421 * _scrollY + 103.47368) + "px";
//	document.getElementById('siteIcon').style.left = (-0.52631579 * _scrollY + 75.789474 + 270) + "px";
//	document.getElementById('siteIcon').style.transform = "translateY(" + (0.05263158 * _scrollY) + "px)";
//	document.getElementById('siteIcon').style.webkitTransform = "translateY(" + (0.05263158 * _scrollY) + "px)";
//	document.getElementById('headerImg').style.transform = "translateY(" + ((window.scrollY * -ratio * 2 + 30) / 5 - 7) + "px)";
//    document.getElementById('headerImg').style.webkitTransform = "translateY(" + ((window.scrollY * -ratio * 2 + 30) / 5 - 7) + "px)";
    
    for (var i = 0; i < specialScrolls.length; i++) {
        specialScrolls[i].onscroll(window.scrollY);
    }
}

function onload () {
    smoothScroll.init();
    
    setFastScroll(document.getElementById("title"));
    setSlowScroll(document.getElementById("headerImg"));
}

function scrollToTopOfContent () {
    smoothScroll.animateScroll(
        document.getElementById("downArrow"), // Node that toggles the animation. ex. document.querySelector('#toggle')
        "#main" // ID of the anchor to scroll to. ex. '#bazinga'
    );
}

var tweenTime = 0.3;

function openRegisterForm () {
    var registerForm = document.getElementById("register");
    
    registerForm.style.pointerEvents = "auto";
    TweenLite.to(registerForm, tweenTime, {opacity: 1, transform: "scale(1, 1)", top: "-600px"});
}

function closeRegisterForm () {
    var registerForm = document.getElementById("register");
    
    registerForm.style.pointerEvents = "none";
    TweenLite.to(registerForm, tweenTime, {opacity: 0, transform: "scale(0.22, 0.1)", top: "-430px"});
}