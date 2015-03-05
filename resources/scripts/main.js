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
    
    recalculatePositions();
    var fixedFAB = document.getElementById("downArrow");
    specialScrolls.push({applyTo:fixedFAB, onscroll:function (scroll) {
        if (this.applyTo.getBoundingClientRect().top < 0) {
            switchToFAB();
        } else if (scroll === 0 && this.applyTo.style.display === "none") {
            switchToFAB();
        }
    }});
}


window.onresize = function () {
    recalculatePositions();
}

function recalculatePositions () {
    var pos = document.getElementById("downArrow").getBoundingClientRect();
    originalPosFAB = {right:window.innerWidth - (pos.left + pos.width), bottom:window.innerHeight - (pos.top + pos.height)};
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

var originalPosFAB;
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
            right: originalPosFAB.right - 15 + "px",
            bottom: originalPosFAB.bottom - 7 + "px",
            onComplete: function () {
                FAB.style.display = "none";
                fixedFAB.style.display = "block";
            }
        });
    }
}

function openForm (name, sender) {
    var form = document.getElementById(name);
//    form.style.left = sender.getBoundingClientRect().left + sender.getBoundingClientRect().width / 2;
//    form.style.top = sender.getBoundingClientRect().top + sender.getBoundingClientRect().height / 2;
//    form.style.transform = "scale(" + sender.getBoundingClientRect().width / form.getBoundingClientRect().width + ", " + sender.getBoundingClientRect().height / form.getBoundingClientRect().height + ")";
    
    form.style.opacity = 0;
    form.style.transform = "scale(" + sender.getBoundingClientRect().width / form.getBoundingClientRect().width + ", " + sender.getBoundingClientRect().height / form.getBoundingClientRect().height + ") translate(-70px, -110px)";
    form.style.left = sender.getBoundingClientRect().left + sender.getBoundingClientRect().width / 2;
    form.style.top = sender.getBoundingClientRect().top + sender.getBoundingClientRect().height / 2;
    
    form.style.pointerEvents = "auto";
    TweenLite.to(form, tweenTime, {opacity: 1, transform: "scale(1, 1) translate(0px, 0px)", left: "50%", top: "50%"});
}

function closeForm (name, sender) {
    var form = document.getElementById(name);
    
    form.style.pointerEvents = "none";
    TweenLite.to(form, tweenTime, {opacity: 0, transform: "scale(" + sender.getBoundingClientRect().width / form.getBoundingClientRect().width + ", " + sender.getBoundingClientRect().height / form.getBoundingClientRect().height + ") translate(-70px, -110px)", left: sender.getBoundingClientRect().left + sender.getBoundingClientRect().width / 2, top: sender.getBoundingClientRect().top + sender.getBoundingClientRect().height / 2});
}

function submitForm (name) {
    if (checkInputForErrors(name)) {
        // TODO: AJAX the data to the server
        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                switch (xmlhttp.responseText.split(":")[0]) {
                    case "attendee":
                        if (xmlhttp.responseText.split(":")[1] === "success")
                            document.getElementById("register").innerHTML = "<div class='responseMessage'><i class='mdi mdi-check'></i></div><input type=\"button\" class=\"material light raised\" value=\"Close\" onclick=\"closeForm('register', document.getElementById('registerButton'));\" />";
                        break;
                    case "volunteer":
                        if (xmlhttp.responseText.split(":")[1] === "success")
                            document.getElementById("volunteer").innerHTML = "<div class='responseMessage'><i class='mdi mdi-check'></i></div><input type=\"button\" class=\"material light raised\" value=\"Close\" onclick=\"closeForm('volunteer', document.getElementById('volunteerButton'));\" />";
                        break;
                    case "sponsor":
                        if (xmlhttp.responseText.split(":")[1] === "success")
                            document.getElementById("sponsor").innerHTML = "<div class='responseMessage'><i class='mdi mdi-check'></i></div><input type=\"button\" class=\"material light raised\" value=\"Close\" onclick=\"closeForm('sponsor', document.getElementById('sponsorButton'));\" />";
                }
            }
        }
        xmlhttp.open("POST","/actions/signup.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        switch (name) {
            case "register":
                var fName = document.getElementById("reg_fName");
                var lName = document.getElementById("reg_lName");
                var email = document.getElementById("reg_email");
                var github = document.getElementById("reg_github");
                var school = document.getElementById("reg_school");
                var grade = {};
                if (document.getElementById("reg_gradeFreshman").checked)
                    grade.value = 9;
                else if (document.getElementById("reg_gradeSophomore").checked)
                    grade.value = 10;
                else if (document.getElementById("reg_gradeJunior").checked)
                    grade.value = 11;
                else if (document.getElementById("reg_gradeSenior").checked)
                    grade.value = 12;
                var age = document.getElementById("reg_age");
                var gender = {};
                if (document.getElementById("reg_genderMale").checked)
                    gender.value = "male";
                else if (document.getElementById("reg_genderFemale").checked)
                    gender.value = "female";
                else if (document.getElementById("reg_genderOther").checked)
                    gender.value = "other";
                else if (document.getElementById("reg_genderPNS").checked)
                    gender.value = "pns";
                var food = document.getElementById("reg_food");
                var skills = document.getElementById("reg_skills");
                xmlhttp.send("type=attendee&fName=" + fName.value + "&lName=" + lName.value + "&email=" + email.value + "&github=" + github.value + "&school=" + school.value + "&grade=" + grade.value + "&age=" + age.value + "&food=" + food.value + "&gender=" + gender.value + "&skills=" + skills.value);
                break;
            case "volunteer":
                var fName = document.getElementById("vol_fName");
                var lName = document.getElementById("vol_lName");
                var email = document.getElementById("vol_email");
                var age = document.getElementById("vol_age");
                var gender = {};
                if (document.getElementById("vol_genderMale").checked)
                    gender.value = "male";
                else if (document.getElementById("vol_genderFemale").checked)
                    gender.value = "female";
                else if (document.getElementById("vol_genderOther").checked)
                    gender.value = "other";
                else if (document.getElementById("vol_genderPNS").checked)
                    gender.value = "pns";
                var food = document.getElementById("vol_food");
                var skills = document.getElementById("vol_skills");
                xmlhttp.send("type=volunteer&fName=" + fName.value + "&lName=" + lName.value + "&email=" + email.value + "&age=" + age.value + "&food=" + food.value + "&gender=" + gender.value + "&skills=" + skills.value);
                break;
            case "sponsor":
                var cName = document.getElementById("spons_cName");
                var fName = document.getElementById("spons_fName");
                var lName = document.getElementById("spons_lName");
                var email = document.getElementById("spons_email");
                var message = document.getElementById("spons_message");
                xmlhttp.send("type=sponsor&cName=" + cName.value + "&fName=" + fName.value + "&lName=" + lName.value + "&email=" + email.value + "&message=" + message.value);
                break;
        }
    }
}

function checkInputForErrors (name) {
    var hasError = false;
    
    switch (name) {
        case "register":
            var fName = document.getElementById("reg_fName");
            var lName = document.getElementById("reg_lName");
            var email = document.getElementById("reg_email");
            var github = document.getElementById("reg_github");
            var school = document.getElementById("reg_school");
            var grade = document.getElementById("reg_");
            var age = document.getElementById("reg_age");
            var gender = document.getElementById("reg_");
            var skills = document.getElementById("reg_skills");


            if (skills.value === "") {
                skills.setAttribute("error", "");
                skills.nextSibling.innerHTML = "Can not be blank";
                skills.focus();
                hasError = true;
            } else {
                skills.removeAttribute("error");
                skills.nextSibling.innerHTML = "We're all good";
            }
            if (age.value === "") {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "Can not be blank";
                age.focus();
                hasError = true;
            } else if (age.value < 13) {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "You must be in high school to attend";
                age.focus();
                hasError = true;
            } else {
                age.removeAttribute("error");
                age.nextSibling.innerHTML = "We're all good";
            }
            if (school.value === "") {
                school.setAttribute("error", "");
                school.nextSibling.innerHTML = "Can not be blank";
                school.focus();
                hasError = true;
            } else {
                school.removeAttribute("error");
                school.nextSibling.innerHTML = "We're all good";
            }
            if (github.value === "") {
                github.setAttribute("error", "");
                github.nextSibling.innerHTML = "Can not be blank";
                github.focus();
                hasError = true;
            } else {
                github.removeAttribute("error");
                github.nextSibling.innerHTML = "We're all good";
            }
            if (email.value === "") {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Can not be blank";
                email.focus();
                hasError = true;
            } else if (!isEmail(email.value)) {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Please enter a valid email";
                email.focus();
                hasError = true;
            } else {
                email.removeAttribute("error");
                email.nextSibling.innerHTML = "We're all good";
            }
            if (lName.value === "") {
                lName.setAttribute("error", "");
                lName.nextSibling.innerHTML = "Can not be blank";
                lName.focus();
                hasError = true;
            } else {
                lName.removeAttribute("error");
                lName.nextSibling.innerHTML = "We're all good";
            }
            if (fName.value === "") {
                fName.setAttribute("error", "");
                fName.nextSibling.innerHTML = "Can not be blank";
                fName.focus();
                hasError = true;
            } else {
                fName.removeAttribute("error");
                fName.nextSibling.innerHTML = "We're all good";
            }
            break;
        case "volunteer":
            var fName = document.getElementById("vol_fName");
            var lName = document.getElementById("vol_lName");
            var email = document.getElementById("vol_email");
            var age = document.getElementById("vol_age");
            var gender = document.getElementById("vol_");
            var skills = document.getElementById("vol_skills");


            if (skills.value === "") {
                skills.setAttribute("error", "");
                skills.nextSibling.innerHTML = "Can not be blank";
                skills.focus();
                hasError = true;
            } else {
                skills.removeAttribute("error");
                skills.nextSibling.innerHTML = "We're all good";
            }
            if (age.value === "") {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "Can not be blank";
                age.focus();
                hasError = true;
            } else if (age.value < 18) {
                age.setAttribute("error", "");
                age.nextSibling.innerHTML = "You must be at least 18 to volunteer";
                age.focus();
                hasError = true;
            } else {
                age.removeAttribute("error");
                age.nextSibling.innerHTML = "We're all good";
            }
            if (email.value === "") {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Can not be blank";
                email.focus();
                hasError = true;
            } else if (!isEmail(email.value)) {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Please enter a valid email";
                email.focus();
                hasError = true;
            } else {
                email.removeAttribute("error");
                email.nextSibling.innerHTML = "We're all good";
            }
            if (lName.value === "") {
                lName.setAttribute("error", "");
                lName.nextSibling.innerHTML = "Can not be blank";
                lName.focus();
                hasError = true;
            } else {
                lName.removeAttribute("error");
                lName.nextSibling.innerHTML = "We're all good";
            }
            if (fName.value === "") {
                fName.setAttribute("error", "");
                fName.nextSibling.innerHTML = "Can not be blank";
                fName.focus();
                hasError = true;
            } else {
                fName.removeAttribute("error");
                fName.nextSibling.innerHTML = "We're all good";
            }
            break;
        case "sponsor":
            var cName = document.getElementById("spons_cName");
            var fName = document.getElementById("spons_fName");
            var lName = document.getElementById("spons_lName");
            var email = document.getElementById("spons_email");
            var message = document.getElementById("spons_message");


            if (message.value === "") {
                message.setAttribute("error", "");
                message.nextSibling.innerHTML = "Can not be blank";
                message.focus();
                hasError = true;
            } else {
                message.removeAttribute("error");
                message.nextSibling.innerHTML = "We're all good";
            }
            if (email.value === "") {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Can not be blank";
                email.focus();
                hasError = true;
            } else if (!isEmail(email.value)) {
                email.setAttribute("error", "");
                email.nextSibling.innerHTML = "Please enter a valid email";
                email.focus();
                hasError = true;
            } else {
                email.removeAttribute("error");
                email.nextSibling.innerHTML = "We're all good";
            }
            if (lName.value === "") {
                lName.setAttribute("error", "");
                lName.nextSibling.innerHTML = "Can not be blank";
                lName.focus();
                hasError = true;
            } else {
                lName.removeAttribute("error");
                lName.nextSibling.innerHTML = "We're all good";
            }
            if (fName.value === "") {
                fName.setAttribute("error", "");
                fName.nextSibling.innerHTML = "Can not be blank";
                fName.focus();
                hasError = true;
            } else {
                fName.removeAttribute("error");
                fName.nextSibling.innerHTML = "We're all good";
            }
            if (cName.value === "") {
                cName.setAttribute("error", "");
                cName.nextSibling.innerHTML = "Can not be blank";
                cName.focus();
                hasError = true;
            } else {
                cName.removeAttribute("error");
                cName.nextSibling.innerHTML = "We're all good";
            }
            break;
    }

    return !hasError;
}

function isEmail (email) {
    return (email.length >= 5 && email.split("@").length == 2 && email.split(".").length == 2 && email.indexOf("@") < email.indexOf(".") - 1 && email.indexOf("@") != 0 && email.indexOf(".") != email.length - 1);
}