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
    
    var fixedFAB = document.getElementById("downArrow");
    var pos = fixedFAB.getBoundingClientRect();
    originalPos = {right:window.innerWidth - (pos.left + pos.width), bottom:window.innerHeight - (pos.top + pos.height)};
}

function scrollToTopOfContent () {
    smoothScroll.animateScroll(
        document.getElementById("downArrow"),
        "#main"
    );
}

function scrollToTopOfPage () {
    smoothScroll.animateScroll(
        document.getElementById("floatingUpArrow"),
        "#body"
    );
}

var tweenTime = 0.3;

var originalPos;
function switchToFAB () {
    var FAB = document.getElementById("floatingUpArrow");
    var fixedFAB = document.getElementById("downArrow");
    
    if (FAB.style.display === "none" || FAB.style.display === "") {
        var pos = fixedFAB.getBoundingClientRect();
        FAB.style.right = window.innerWidth - (pos.left + pos.width) + "px";
        FAB.style.bottom = window.innerHeight - (pos.top + pos.height) + "px";
        FAB.style.transform = "scale(1.3)";
        fixedFAB.style.display = "none";
        FAB.style.display = "block";

        TweenLite.to(FAB, tweenTime, {
            bottom: "25px",
            right: "25px",
            transform: "scale(1.3) rotateZ(180deg)"
        });
    } else {
        FAB.style.bottom = "25px";
        FAB.style.right = "25px";
        FAB.style.transform = "scale(1.3)";

        TweenLite.to(FAB, tweenTime + 0.2, {
            right: originalPos.right + "px",
            bottom: originalPos.bottom + "px",
            transform: "scale(1.3) rotateZ(0deg)",
            onComplete: function () {
                FAB.style.display = "none";
                fixedFAB.style.display = "block";
            }
        });
    }
}

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

function GetScreenCordinates(obj) {
    var p = {};
    p.x = obj.offsetLeft;
    p.y = obj.offsetTop;
    while (obj.offsetParent) {
        p.x = p.x + obj.offsetParent.offsetLeft;
        p.y = p.y + obj.offsetParent.offsetTop;
        if (obj == document.getElementsByTagName("body")[0]) {
            break;
        }
        else {
            obj = obj.offsetParent;
        }
    }
    return p;
}