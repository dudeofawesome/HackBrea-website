<?php require $_SERVER["DOCUMENT_ROOT"]."/data/info.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=false" />
        <meta content="Brea Olinda High School's First Hackathon" name="<?php echo $EVENT_NAME; ?>">
        <meta name="theme-color" content="#499379">
        <link rel='shortcut icon' href="resources/images/favicon.ico">
        <link rel="icon" sizes="256x256" href="resources/images/icon_256.png">

        <title><?php echo $EVENT_NAME; ?></title>

        <link href="resources/styles/mdi/materialdesignicons.css" media="all" rel="stylesheet" type="text/css" />
        <link href="resources/styles/main.css" rel="stylesheet">
        
        <script src="resources/scripts/greensock-js/plugins/CSSPlugin.min.js"></script>
        <script src="resources/scripts/greensock-js/easing/EasePack.min.js"></script>
        <script src="resources/scripts/greensock-js/TweenLite.min.js"></script>
        <script type="text/javascript" src="resources/scripts/smooth-scroll.js"></script>
        <script type="text/javascript" src="resources/scripts/headers.js"></script>
        <script type="text/javascript" src="resources/scripts/main.js"></script>
    </head>
    
    <body onload="onload();" id="body">
        <header id="header">
            <div id="social">
                <a href="<?php echo $TWITTER_ACCOUNT; ?>"><i class="mdi mdi-twitter-box"></i></a>
                <a href="<?php echo $FACEBOOK_ACCOUNT; ?>"><i class="mdi mdi-facebook-box"></i></a>
            </div>
            <div id="title" class="title">
                <div class="text"><?php echo strtoupper($EVENT_NAME_FIRST); ?><img src="resources/images/icon.png" /><?php echo strtoupper($EVENT_NAME_LAST); ?></div>
                <div>
                    <button id="volunteerButton" class="material raised dark" onclick="openForm('volunteer', this);">Volunteer</button>
                    <button id="sponsorButton" class="material raised dark" onclick="openForm('sponsor', this);">Sponsor</button>
                </div>
                <button id="registerButton" class="material raised dark" onclick="openForm('register', this);">Sign Up!</button>
                <br />
                <button class="material floating dark" id="downArrow" onclick="scrollToTopOfContent(); switchToFAB();" data-scroll href="#main"><i class="mdi mdi-chevron-down"></i></button>
            </div>
            <div id="headerImg"></div>
        </header>

        <button class="material floating dark" id="floatingUpArrow" onclick="scrollToTopOfPage(); switchToFAB();"><i class="mdi mdi-chevron-down"></i></button>

        <div id="main">
            <div id="about" class="content">
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-help-circle"></i> What is a hackathon?
                    </div>
                    <div class="answer">
                        Hacking is not about breaking into your school computers.
                        Hackathons are a place where students come together to work on fun projects using technology.
                        It's a great time to hangout with friends, work on something you care about, and have food paid for.
                        <a href="https://www.google.com/url?q=https%3A%2F%2Fmedium.com%2F%40alexkern%2Fwhat-is-a-hackathon-c2162b893b0a&sa=D&sntz=1&usg=AFQjCNHA62ybz119QtbESWwx5iMgQacH5w">Click here for a more in depth description.</a>
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-calendar"></i> When?
                    </div>
                    <div class="answer">
                        <?php echo $EVENT_NAME; ?> will start at <?php echo $START_TIME.", ".$DAY_OF_EVENT.", ".$MONTH_OF_EVENT." ".$DATE_OF_EVENT; ?>, and continue until <?php echo $END_TIME.", ".$END_DAY_OF_EVENT.", ".$END_MONTH_OF_EVENT." ".$END_DATE_OF_EVENT; ?>.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-map"></i> Where?
                    </div>
                    <div class="answer">
                        The main event will be in the <?php echo $SPECIFIC_LOCATION_NAME; ?>, at <?php echo $GENERAL_LOCATION_NAME; ?>,<address style="padding: 5px 0px 5px 0px;"> <?php echo $ADDRESS_LINE_1; ?><br /><?php echo $ADDRESS_LINE_2; ?></address>
                        There will be other side events taking place throughout campus, including learning workshops, gaming tournaments, and more!
                    </div>
                </div>
            </div>
            <div class="breaker" id="breaker1" style="background-image: url('resources/images/breakers/1.jpg');"></div>
            <div id="FAQ" class="content">
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-xml"></i> Do I need to know how to code?
                    </div>
                    <div class="answer">
                        <?php echo $EVENT_NAME; ?> is for beginners and experts alike. As long as you want to build something (whether you know how to or not), you can come. A main focus of this event is to introduce beginners. Mentors will be available throughout the event to get you started.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-account-outline"></i> Who can attend?
                    </div>
                    <div class="answer">
                        Anyone currently enrolled in high school who wants to learn or improve their skills. If you're in college (or want to help but not hack), you can also <span class="a" onclick="scrollToTopOfPage(); openForm('volunteer', document.getElementById('volunteerButton'));">sign up to be a mentor</span>. You'll get to help out some newbies and make a great impact on their hackathon experience.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-account-multiple"></i> Do I need a team?
                    </div>
                    <div class="answer">
                        Nope. Just come to the event and we will find you a team. We'll be holding a team making session before the hacking begins. You can also find teammates on Facebook beforehand. Working alone is fine too. Teams can have up to 5 people.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-lightbulb"></i> What if I don't have an idea?
                    </div>
                    <div class="answer">
                        There will be plenty of other people at <?php echo $EVENT_NAME; ?> that will have ideas, and a lot that don’t, or you could join the discussion on <a href="<?php echo $FACEBOOK_ACCOUNT; ?>">Facebook</a>.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-briefcase"></i> What should I bring?
                    </div>
                    <div class="answer">
                        All your friends, computer (laptop or desktop), school ID, toiletries, sleeping bag (optional), and anything else you might need. We will have some prototyping hardware available, but they will be in limited supply. If you want to hack with hardware that we don't have, then you'll need to supply that.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-responsive"></i> What can I make?
                    </div>
                    <div class="answer">
                        Just about anything. You could make your first website, that iPhone or Android app you’ve always wanted to make, or even a crazy awesome robot. The possibilities are  endless. Whatever it is, our mentors can help get you started.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-currency-btc"></i> Surely an experience like this must be expensive?
                    </div>
                    <div class="answer">
                        <?php echo $EVENT_NAME; ?> will be completely free for all attendees! Meals and snacks are provided the entire event. All you need to worry about is learning and building.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-silverware-variant"></i> How will I not starve?
                    </div>
                    <div class="answer">
                        We will be providing meals and snacks (loads of them!), and can guarantee you won’t go hungry.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-cube"></i> Who will own my work?
                    </div>
                    <div class="answer">
                        Don't worry, your team will own the project. We want to see the awesome stuff you can make, but even more than that we want to see your project take off afterward.
                    </div>
                </div>
                <div class="question">
                    <div class="query">
                        <i class="mdi mdi-trophy-variant"></i> How will projects be judged?
                    </div>
                    <div class="answer">
                        If you’d like, you will be able to present your project to a panel of judges, then they will make decisions based on a combination of uniqueness, technical complexity, and viability.
                    </div>
                </div>
                <div>
                    <div class="question">
                        <div class="query">
                            <i class="mdi mdi-help-circle"></i> Still have a question?
                        </div>
                        <div class="answer">
                            Feel free to shoot us an email at <a href="mailto:<?php echo $QUESTION_EMAIL; ?>"><?php echo $QUESTION_EMAIL; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breaker" id="breaker2" style="background-image:url('resources/images/breakers/2.jpg')"></div>
            <div id="schedule" class="content">
                <div class="timeline"></div>
                <div class="events">
                    <div class="event">
                        <div class="time">10:00 AM</div>
                        <div class="icon"><i class="mdi mdi-clipboard-check"></i></div>
                        <div class="name">Registration</div>
                    </div>
                    <div class="event">
                        <div class="time">11:00 AM</div>
                        <div class="icon"><i class="mdi mdi-clock"></i></div>
                        <div class="name">Opening ceremony and keynote</div>
                    </div>
                    <div class="event">
                        <div class="time">12:00 PM</div>
                        <div class="icon"><i class="mdi mdi-food"></i></div>
                        <div class="name">Lunch time and sponsor fair</div>
                    </div>
                    <div class="event">
                        <div class="time">1:00 PM</div>
                        <div class="icon"><i class="mdi mdi-xml"></i></div>
                        <div class="name">We start hacking</div>
                    </div>
                    <div class="event">
                        <div class="time">1:00 PM</div>
                        <div class="icon"><i class="mdi mdi-memory"></i></div>
                        <div class="name">Workshops start</div>
                    </div>
                    <div class="event">
                        <div class="time">4:00 PM</div>
                        <div class="icon"><i class="mdi mdi-food"></i></div>
                        <div class="name">Snack time!</div>
                    </div>
                    <div class="event">
                        <div class="time">4:30 PM</div>
                        <div class="icon"><i class="mdi mdi-memory"></i></div>
                        <div class="name">Workshops round 2 start</div>
                    </div>
                    <div class="event">
                        <div class="time">7:00 PM</div>
                        <div class="icon"><i class="mdi mdi-food"></i></div>
                        <div class="name">Dinner</div>
                    </div>
                    <div class="event">
                        <div class="time">1:00 AM</div>
                        <div class="icon"><i class="mdi mdi-food"></i></div>
                        <div class="name">Super secret snack time!</div>
                    </div>
                    <div class="event">
                        <div class="time">2:00 AM</div>
                        <div class="icon"><i class="mdi mdi-gamepad-variant"></i></div>
                        <div class="name">Super Smash Bros tournament</div>
                    </div>
                    <div class="event">
                        <div class="time">4:00 AM</div>
                        <div class="icon"><i class="mdi mdi-puzzle"></i></div>
                        <div class="name">Code competition</div>
                    </div>
                    <div class="event">
                        <div class="time">5:00 AM</div>
                        <div class="icon"><i class="mdi mdi-food"></i></div>
                        <div class="name">Snack time</div>
                    </div>
                    <div class="event">
                        <div class="time">9:00 AM</div>
                        <div class="icon"><i class="mdi mdi-food"></i></div>
                        <div class="name">Breakfast</div>
                    </div>
                    <div class="event">
                        <div class="time">1:00 PM</div>
                        <div class="icon"><i class="mdi mdi-xml"></i></div>
                        <div class="name">Lunch &amp; all submissions are due</div>
                    </div>
                    <div class="event">
                        <div class="time">1:45 PM</div>
                        <div class="icon"><i class="mdi mdi-thumb-up"></i></div>
                        <div class="name">Demo fair A begins</div>
                    </div>
                    <div class="event">
                        <div class="time">3:00 PM</div>
                        <div class="icon"><i class="mdi mdi-thumb-up"></i></div>
                        <div class="name">Demo fair B begins</div>
                    </div>
                    <div class="event">
                        <div class="time">4:15 PM</div>
                        <div class="icon"><i class="mdi mdi-presentation"></i></div>
                        <div class="name">Finalist presentations</div>
                    </div>
                    <div class="event">
                        <div class="time">5:00 PM</div>
                        <div class="icon"><i class="mdi mdi-trophy"></i></div>
                        <div class="name">Winners announced</div>
                    </div>
                </div>
            </div>
            <div class="breaker" id="breaker3" style="background-image:url('resources/images/breakers/3.jpg')"></div>
            <div id="sponsors" class="content">
                <div id="gold">
                    <div class="level"><i class="mdi mdi-star-circle"></i></div>
                    <div class="sponsor">
                        <a href="http://google.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/google.png')"></div></a>
                    </div>
                    <div class="sponsor" style="width: 120px;">
                        <a href="http://apple.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/apple.png');"></div></a>
                    </div>
                    <div class="sponsor last">
                        <a href="http://microsoft.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/microsoft.svg')"></div></a>
                    </div>
                    <div class="closingBrace">};</div>
                </div>
                <div id="silver">
                    <div class="level"><i class="mdi mdi-star-circle"></i></div>
                    <div class="sponsor">
                        <a href="http://github.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/github.png')"></div></a>
                    </div>
                    <div class="sponsor">
                        <a href="http://beckmancoulter.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/beckman.png')"></div></a>
                    </div>
                    <div class="sponsor">
                        <a href="https://namecheap.com/" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/namecheap.png')"></div></a>
                    </div>
                    <div class="sponsor">
                        <a href="http://oculus.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/oculus.png')"></div></a>
                    </div>
                    <div class="sponsor last">
                        <a href="http://mlh.io" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/mlh.png')"></div></a>
                    </div>
                    <div class="closingBrace">};</div>
                </div>
                <div id="bronze">
                    <div class="level" style="margin-bottom: -50px;"><i class="mdi mdi-star-circle"></i></div>
                    <div class="sponsor">
                        <a href="http://visage.co/" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/visage.png')"></div></a>
                    </div>
                    <div class="sponsor">
                        <a href="http://teespring.com/" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/teespring.svg')"></div></a>
                    </div>
                    <div class="sponsor">
                        <a href="http://wolfram.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/wolfram.svg')"></div></a>
                    </div>
                    <div class="sponsor">
                        <a href="http://duckduckgo.com" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/duckduckgo.png');"></div></a>
                    </div>
                    <div class="sponsor last">
                        <a href="https://www.stickermule.com/" class="logo"><div class="logo" style="background-image: url('/resources/images/sponsors/stickermule.png');"></div></a>
                    </div>
                    <div class="closingBrace">};</div>
                </div>
            </div>
            <footer>
                <div>Made with <span style="color:rgb(255, 0, 0);">&hearts;</span> by <a href="http://0rleans.com">Louis Orleans</a></div>
                <div>In partnership with <a href="http://www.globalitacademy.us/">Global IT Academy</a></div>
            </footer>
        </div>

        <div id="forms">
            <div id="register" class="form">
                <form action="" method="post" onsubmit="submitForm(); return false;">
                    <div class="header">Sign Up</div>

                    <div class="row">
                        <div class="cell"><input type="text" class="material light" id="reg_fName" placeholder="First Name" /><div class="error">You done goofed</div></div>
                        <div class="cell"><input type="text" class="material light" id="reg_lName" placeholder="Last Name" /><div class="error">You done goofed</div></div>
                    </div>
                    <div class="row">
                        <div class="cell"><input type="email" class="material light" id="reg_email" placeholder="Email" /><div class="error">You done goofed</div></div>
                        <div class="cell"><input type="url" class="material light" id="reg_github" placeholder="Github Username" /><div class="error">You done goofed</div></div>
                    </div>
                    <div class="row">
                        <div class="cell"><input type="text" class="material light" id="reg_school" placeholder="School" /><div class="error">You done goofed</div></div>
                        <div class="cell"><input type="number" class="material light" id="reg_age" placeholder="Age" value="" /><div class="error">You done goofed</div></div>
                    </div>
                    <div class="row">
                        <div class="cell SBSrad">
                            <div class="radioBoxGroup">
                                <input type="radio" name="grade" class="material light" id="reg_gradeFreshman" value="freshman" checked /><label for="reg_gradeFreshman">Freshman</label><br />
                                <input type="radio" name="grade" class="material light" id="reg_gradeSophomore" value="sophomore" /><label for="reg_gradeSophomore">Sophomore</label><br />
                                <input type="radio" name="grade" class="material light" id="reg_gradeJunior" value="junior" /><label for="reg_gradeJunior">Junior</label><br />
                                <input type="radio" name="grade" class="material light" id="reg_gradeSenior" value="senior" /><label for="reg_gradeSenior">Senior</label>
                            </div>
                        </div>
                        <div class="cell SBSrad">
                            <div class="radioBoxGroup">
                                <input type="radio" name="gender" class="material light" id="reg_genderMale" value="male" checked /><label for="reg_genderMale">Male</label><br />
                                <input type="radio" name="gender" class="material light" id="reg_genderFemale" value="female" /><label for="reg_genderFemale">Female</label><br />
                                <input type="radio" name="gender" class="material light" id="reg_genderOther" value="other" /><label for="reg_genderOther">Other</label><br />
                                <input type="radio" name="gender" class="material light" id="reg_genderPNS" value="pns" /><label for="reg_genderPNS">Prefer not to say</label><br />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" class="material light" style="width:100%;" id="reg_food" placeholder="Dietary Restrictions" value="" /><div class="error"></div>
                    </div>
                    <div class="row">
                        <textarea type="text" class="material light" id="reg_skills" style="width:447px; max-width:100%; height: 100px;" placeholder="Skills"></textarea><div class="error">You done goofed</div>
                    </div>
                    <div class="row" style="padding-bottom: 20px; text-align: center;">
                        <input type="button" class="material dark raised" value="Submit" onclick="submitForm('register'); return false;" />
                        <input type="reset" class="material light raised" value="Reset" />
                        <input type="button" class="material light raised" value="Cancel" onclick="closeForm('register', document.getElementById('registerButton'));" />
                    </div>
                </form>
            </div>
            <div id="volunteer" class="form">
                <form action="" method="post" onsubmit="submitForm(); return false;">
                    <div class="header">Volunteer</div>

                    <div class="row">
                        <div class="cell"><input type="text" class="material light" id="vol_fName" placeholder="First Name" /><div class="error">You done goofed</div></div>
                        <div class="cell"><input type="text" class="material light" id="vol_lName" placeholder="Last Name" /><div class="error">You done goofed</div></div>
                    </div>
                    <div class="row">
                        <div class="cell"><input type="email" class="material light" id="vol_email" placeholder="Email" /><div class="error">You done goofed</div></div>
                        <div class="cell"><input type="number" class="material light" id="vol_age" placeholder="Age" value="" /><div class="error">You done goofed</div></div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <input type="text" class="material light" style="width:100%;" id="vol_food" placeholder="Dietary Restrictions" value="" /><div class="error"></div>
                        </div>
                        <div class="cell">
                            <div class="radioBoxGroup">
                                <input type="radio" name="gender" class="material light" id="vol_genderMale" value="male" checked /><label for="vol_genderMale">Male</label><br />
                                <input type="radio" name="gender" class="material light" id="vol_genderFemale" value="female" /><label for="vol_genderFemale">Female</label><br />
                                <input type="radio" name="gender" class="material light" id="vol_genderOther" value="other" /><label for="vol_genderOther">Other</label><br />
                                <input type="radio" name="gender" class="material light" id="vol_genderPNS" value="pns" /><label for="vol_genderPNS">Prefer not to say</label><br />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <textarea type="text" class="material light" id="vol_skills" style="width:650px; max-width:100%; height: 100px;" placeholder="Skills"></textarea><div class="error">You done goofed</div>
                    </div>
                    <div class="row" style="padding-bottom: 20px; text-align: center;">
                        <input type="button" class="material dark raised" value="Submit" onclick="submitForm('volunteer'); return false;" />
                        <input type="reset" class="material light raised" value="Reset" />
                        <input type="button" class="material light raised" value="Cancel" onclick="closeForm('volunteer', document.getElementById('volunteerButton'));" />
                    </div>
                </form>
            </div>
            <div id="sponsor" class="form">
                <form action="" method="post" onsubmit="submitForm(); return false;">
                    <div class="header">Sponsor</div>

                    <div class="row">
                        <input type="text" class="material light" id="spons_cName" style="width:447px;" placeholder="Company Name" /><div class="error">You done goofed</div>
                    </div>
                    <div class="row">
                        <div class="cell"><input type="text" class="material light" id="spons_fName" placeholder="First Name" /><div class="error">You done goofed</div></div>
                        <div class="cell"><input type="text" class="material light" id="spons_lName" placeholder="Last Name" /><div class="error">You done goofed</div></div>
                    </div>
                    <div class="row">
                        <input type="email" class="material light" id="spons_email" style="width:447px;" placeholder="Email" /><div class="error">You done goofed</div>
                    </div>
                    <div class="row">
                        <textarea type="text" class="material light" id="spons_message" style="width:447px; max-width:100%; height: 100px;" placeholder="Message"></textarea><div class="error">You done goofed</div>
                    </div>
                    <div class="row" style="padding-bottom: 20px; text-align: center;">
                        <input type="button" class="material dark raised" value="Submit" onclick="submitForm('sponsor'); return false;" />
                        <input type="reset" class="material light raised" value="Reset" />
                        <input type="button" class="material light raised" value="Cancel" onclick="closeForm('sponsor', document.getElementById('sponsorButton'));" />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>