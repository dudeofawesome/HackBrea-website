var specialScrolls = [];
function setFastScroll (that) {
    specialScrolls.push(new SpecialScroll(that, 1.4));
}

function setSlowScroll (that) {
    specialScrolls.push(new SpecialScroll(that, -0.5));
}


document.onscroll = onscroll;
var breakers = [];
function onscroll () {
    for (var i = 0; i < specialScrolls.length; i++) {
        specialScrolls[i].onscroll(window.scrollY);
    }
    for (var i = 0; i < breakers.length; i++) {
        if (breakers[i].getBoundingClientRect().top < window.innerHeight) {
            if (breakers[i].topVisible == null)
                breakers[i].topVisible = window.scrollY;
            breakers[i].style.backgroundPositionY = (((window.scrollY - breakers[i].topVisible) / (window.innerHeight + breakers[i].getBoundingClientRect().height)) * 100) + "%";
        }
    }
}

function onload () {
    smoothScroll.init();
    
    setFastScroll(document.getElementById("title"));
    setSlowScroll(document.getElementById("headerImg"));
    breakers = [document.getElementById("breaker1"), document.getElementById("breaker2")];
    
    var fixedFAB = document.getElementById("downArrow");
    var pos = fixedFAB.getBoundingClientRect();
    originalPos = {right:window.innerWidth - (pos.left + pos.width), bottom:window.innerHeight - (pos.top + pos.height)};
    specialScrolls.push({applyTo:fixedFAB, onscroll:function (scroll) {
        if (this.applyTo.getBoundingClientRect().top < 0) {
            switchToFAB();
        } else if (scroll === 0 && this.applyTo.style.display === "none") {
            switchToFAB();
        }
    }});
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
        FAB.style.right = window.innerWidth - (pos.left + pos.width) - 15 + "px";
        FAB.style.bottom = window.innerHeight - (pos.top + pos.height) - 7 + "px";
        FAB.style.transform = "scale(1.3) rotateZ(180deg)";
        fixedFAB.style.display = "none";
        FAB.style.display = "block";

        TweenLite.to(FAB, 0.5, {
            bottom: "25px",
            right: "25px"
        });
    } else {
        FAB.style.bottom = "25px";
        FAB.style.right = "25px";
        FAB.style.transform = "scale(1.3) rotateZ(0deg)";

        TweenLite.to(FAB, 0.5, {
            right: originalPos.right - 15 + "px",
            bottom: originalPos.bottom - 7 + "px",
            onComplete: function () {
                FAB.style.display = "none";
                fixedFAB.style.display = "block";
            }
        });
    }
}

function openForm (name, sender) {
    var form = document.getElementById(name);
    form.style.left = sender.getBoundingClientRect().left + sender.getBoundingClientRect().width / 2;
    form.style.top = sender.getBoundingClientRect().top + sender.getBoundingClientRect().height / 2;
    form.style.transform = "scale(" + sender.getBoundingClientRect().width / form.getBoundingClientRect().width + ", " + sender.getBoundingClientRect().height / form.getBoundingClientRect().height + ")";
    
    form.style.pointerEvents = "auto";
    TweenLite.to(form, tweenTime, {opacity: 1, transform: "scale(1, 1)", left: "50%", top: "50%"});
}

function closeForm (name, sender) {
    var form = document.getElementById(name);
    
    form.style.pointerEvents = "none";
    TweenLite.to(form, tweenTime, {opacity: 0, transform: "scale(" + sender.getBoundingClientRect().width / form.getBoundingClientRect().width + ", " + sender.getBoundingClientRect().height / form.getBoundingClientRect().height + ")", left: sender.getBoundingClientRect().left + sender.getBoundingClientRect().width / 2, top: sender.getBoundingClientRect().top + sender.getBoundingClientRect().height / 2});
}

function submitForm (name) {
    if (checkInputForErrors(name)) {
        // TODO: AJAX the data to the server
        alert("We're not currently applications.");
    }
}

function checkInputForErrors (name) {
    var hasError = false;
    
    switch (name) {
        case "register":
            var fName = document.getElementById("fName");
            var lName = document.getElementById("lName");
            var email = document.getElementById("email");
            var github = document.getElementById("github");
            var school = document.getElementById("school");
            var grade = document.getElementById("");
            var age = document.getElementById("age");
            var gender = document.getElementById("");
            var skills = document.getElementById("skills");


            if (fName.value === "") {
                fName.setAttribute("error", "");
                fName.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (lName.value === "") {
                lName.setAttribute("error", "");
                lName.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (email.value === "") {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            } else if (email.value.split("@").length == 0 || email.value.split(".").length == 0) {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Please enter a valid email";
                hasError = true;
            }
            if (github.value === "") {
                github.setAttribute("error", "");
                github.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (school.value === "") {
                school.setAttribute("error", "");
                school.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (age.value === "") {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            } else if (age.value < 13) {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "You must be in high school to attend";
                hasError = true;
            }
            if (skills.value === "") {
                skills.setAttribute("error", "");
                skills.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            break;
        case "volunteer":
            var fName = document.getElementById("fName");
            var lName = document.getElementById("lName");
            var email = document.getElementById("email");
            var age = document.getElementById("age");
            var skills = document.getElementById("skills");


            if (fName.value === "") {
                fName.setAttribute("error", "");
                fName.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (lName.value === "") {
                lName.setAttribute("error", "");
                lName.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (email.value === "") {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            } else if (email.value.split("@").length == 0 || email.value.split(".").length == 0) {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Please enter a valid email";
                hasError = true;
            }
            if (age.value === "") {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            } else if (age.value < 18) {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "You must be in over 18 to volunteer";
                hasError = true;
            }
            if (skills.value === "") {
                skills.setAttribute("error", "");
                skills.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            break;
        case "sponsor":
            var cName = document.getElementById("cName");
            var fName = document.getElementById("fName");
            var lName = document.getElementById("lName");
            var email = document.getElementById("email");
            var message = document.getElementById("message");


            if (cName.value === "") {
                cName.setAttribute("error", "");
                cName.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (fName.value === "") {
                fName.setAttribute("error", "");
                fName.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (lName.value === "") {
                lName.setAttribute("error", "");
                lName.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            if (email.value === "") {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            } else if (email.value.split("@").length == 0 || email.value.split(".").length == 0) {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Please enter a valid email";
                hasError = true;
            }
            if (message.value === "") {
                message.setAttribute("error", "");
                message.nextSibling.innerHTML = "Can not be blank";
                hasError = true;
            }
            break;
    }

    return !hasError;
}