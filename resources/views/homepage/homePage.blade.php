@extends('layouts.app')

@section('content')


{{-- <style>
    
    /* p {
        font-size: 22px;
        font: sans-serif;
    }

    strong {
        font-size: 22px;
        font: sans-serif;
    } */
    h2{
        font-size: 1 px;
    }

</style> --}}

<head>
    
</head>

<div class="content-wrap">
{{-- <br><br><br>

<section>
    <div class="container">
        <h1><img src="http://neonknightsrpg.com/assets/images/logo-splash.png" style="width: 45%;"></h1>
         
        <div class="row">
            <div class="col-sm-8">
                <p><strong>The Role-Playing Game for people without time enough to play Role-Playing Games.</strong></p>
                <p>Play a Neon Knight,<strong> a chivalry member in a medieval-post-apocalyptic future,</strong> and play an email based RPG with your friends in weekly rounds.</p>
            </div>
        </div>
    </div>
</section>

<br><br><br><br><br><br><br>

<section>
    <div class="youplay-contentcontainer">

        <h2 class="text-center">How does it work?</h2>

        <p>Neon Knights is a <strong>email based role-playing game </strong> where you can have fun with your friends <strong> investing just a little time each week</strong>.</p>

        <p style="font-size: 21px">Decide which actions your character will do in the weekly turn, and discover what happened on the weekly Electro-Bulletin of the Kingdom of Computonia. <strong> Explore, Joust, Sabotage, or Collaborate with other Neon Knights </strong> to be awarded the Allegiance Points that <strong> Electro-King Computon </strong> awards to the Knights whose actions please it the most, and which will gran your character better equipment and most noble quests.</p>

    </div>
</section>

<br><br><br><br>

<section class="container mt-60 mb-30 youplay-features">
    <div class="row">

        {{-- <div class="col-sm-4">
            <div class="feature angled-bg">
                <i class="fa fa-fw fa-user-circle fa-3x pb-3"></i>
                <h3>Create your Character</h3>
                <div>
                    Set Name, Titles, Banner, Gender (or non-binary), personality, oddities.. whatever you want!
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-sm-4 justify-content-center text-center"> 
            <div class="feature angled-bg">
                <i class="fa fa-fw fa-user-circle fa-3x pb-3" style="color: #ffffff"></i> 
                <h3>Create your Character</h3>
                <div>
                    Set Name, Titles, Banner, Gender (or non-binary), personality, oddities.. whatever you want!
                </div>
            </div>   
        </div>

        <div class="col-sm-4 justify-content-center text-center">
            <div class="feature angled-bg">
            <i class="fa fa-fw fa-calendar-check-o fa-3x pb-3" style="color: #ffffff"></i>
            <h3>Decide your Turn</h3>
            <div>
                Set which actions will your Neon Knights invest their time in for the weekly turn.
            </div>
        </div>
    </div>

        <div class="col-sm-4 justify-content-center text-center">
            <div class="feature angled-bg">
            <i class="fa fa-fw fa-envelope-open fa-3x pb-3" style="color: #ffffff"></i>
            <h3>Read the Weekly Bulletin</h3>
            <div>
                Each week, you will receive by email a bulletin with all the group's actions resolved, and the Allegiance Points earned or lose by everyone.
            </div>
        </div>  
    </div> 
</div>
</section>

<br><br><br><br><br><br><br>

<section>
    <div class="container youplay-banner youplay-banner-parallax big">
        <h2>Welcome to Kingdom of Computonia</h2>
        
        <br>

        <div class="row">
            <div class="col-sm-1">
                <i class="fa fa-fw fa-bomb fa-2x" style="color: #ffffff"></i>
            </div>
            <div class="col-sm-10">
                After the climatic hecatomb, the few surviving nations emptied their nuclear arsenals fighting for the few resources remaining in the planet. After a few
                generations, the few human surviving tribes have forgotten almost all of their previous civilizations.
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-sm-1">
                <i class="fa fa-fw fa-desktop fa-2x" style="color: #ffffff"></i>
            </div>
            <div class="col-sm-10">
                Somewhere afar, a creepy suvirving Artificial Intelligence self-proclaims itself as Electro-King Computon and succeeds in organizing a pseudo-medieval class-based society.
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-sm-1">
                <i class="fa fa-fw fa-gears fa-2x" style="color: #ffffff"></i>
            </div>
            <div class="col-sm-10">
                Robo-Serfs keep all the infrastructures working (enery, food, equipment production, and all things important), while Robo-Nobles just slack around and entertain King Computon on its Court.
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-sm-1">
                <i class="fa fa-fw fa-user fa-2x" style="color: #ffffff"></i>
            </div>
            <div class="col-sm-10">
                Humans, Neon Knights all of them, spend their time pursuing great feats to earn their King's and other Knight's respect. They explore and fight post-hecatombic dangers, but also party, write songs or poetry, or star in torrid Robo-Romances.
            </div>
        </div>
    </div>  
</section> 


<br><br><br><br><br><br><br>

</div>
<section>
    <div class="container align-center">
        <h2>Follow us in our social media</h2>
        <br><br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                </div> 
                <div class="col-sm-3">
                    <a href="https://www.twitter.com/NeonKnightsRPG" style="text-decoration: none">
                        &nbsp;	&nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="fa fa-fw fa-twitter-square fa-5x" style="color: #ffffff"></i><br>
                        &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <span style="color: #ffffff">Twitter</span>
                    </a>
                </div>
                
                <div class="col-sm-3">
                    <a href="https://www.facebook.com/NeonKnightsRPG" style="text-decoration: none">
                        &nbsp;	&nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="fa fa-fw fa-facebook-square fa-5x" style="color: #ffffff"></i><br>
                        &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;
                        <span style="color: #ffffff">Facebook</span>
                    </a>
                </div>

                <div class="col-sm-3">
                    <a href="https://www.instagram.com/neonknights_rpg/" style="text-decoration: none">
                        &nbsp;	&nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="fa fa-fw fa-instagram fa-5x" style="color: #ffffff"></i><br>
                        &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <span style="color: #ffffff">Instagram</span>
                    </a>
                </div>
            </div>   
        </div>
    </div>
</section>

<br><br><br><br><br><br><br><br><br> --}}

   
<section class="youplay-banner banner-top youplay-banner-parallax">
    
    <div class="image" data-speed="0.4">
        <img src="{{asset('storage/banner-bg.jpg')}}" alt="" class="jarallax-img">
    </div>


<div class="info">
    <div>
        <div class="container">
            
                <div class="row"><div class="col-md-8">
            
            
                <h1 class="h1"><img style="width: 65%;" src="{{asset('storage/logo-splash.png')}}"></h1>
            
            
                
<p class="lead">
    <strong>The Role-Playing Game for people without time enough to play Role-Playing Games.</strong>
</p>
<p class="lead"> 
    Play a Neon Knight, <strong>a chivalry member in a medieval-post-apocalyptic future,</strong> and play an email based RPG with your friends in weekly rounds.
</p>
<br>
<a class="btn btn-md active" href="#beta"><i class="fa fa-eye"></i>&nbsp; SIGN UP FOR THE BETA</a>

            
            
                </div></div>
            
        </div>
    </div>
</div>
</section>
<!-- /Banner -->

    

    

<div class="container youplay-content">

    <h2 class="text-center mt-60 fs-40">How does it work?</h2>

    <p class="lead">Neon Knights is a <strong>email based role-playing game</strong> where you can have fun with your friends <strong>investing just a little time each week</strong>.</p>

    <p class="lead">

      Decide which actions your character will do in the weekly turn, and discover what happened on the weekly Electro-Bulletin of the Kingdom of Computonia. <strong>Explore, Joust, Sabotage, or Collaborate with other Neon Knights</strong> to be awarded the Allegiance Points that <strong>Electro-King Computon</strong> awards to the Knights whose actions please it the most, and which will gran your character better equipment and most noble quests.
    </p>

</div>

<!-- Features -->
<section class="youplay-features container-md mt-60 mb-30">
    <div class="row">
    <div class="col-sm-4">
        <div class="feature angled-bg">
            <i class="fa fa-user-circle"></i>
            <h3 style= "font-size: 22px">Create your Character</h3>
            <div style= "font-size: 11.5px">
                Set Name, Titles, Banner, Gender (or non-binary), personality, oddities.. whatever you want!
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="feature angled-bg">
            <i class="fa fa-calendar-check"></i>
            <h3 style= "font-size: 22px">Decide your Turn</h3>
            <div style= "font-size: 11.5px">
                Set which actions will your Neon Knights invest their time in for the weekly turn.
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="feature angled-bg">
            <i class="fa fa-envelope-open"></i>
            <h3 style= "font-size: 22px">Read the Weekly Bulletin</h3>
            <div style= "font-size: 11.5px">
                Each week, you will receive by email a bulletin with all the group's actions resolved, and the Allegiance Points earned or lose by everyone.
            </div>
        </div>
    </div></div>
</section>
<!-- /Features -->


<!-- Realistic Battles -->
<section class="youplay-banner youplay-banner-parallax big">
    <div class="image" data-speed="0.4">
        <img class="jarallax-img" src="{{asset('storage/banner-bg-3.jpg')}}" alt="">
    </div>

    <div class="info">
        <div>
            <div class="container">
                <h2 class="fs-40 mt-45">Welcome to Kingdom of Computonia</h2>
                <br>
                <div class="youplay-timeline">

                <!-- Timeline Notification -->
                <div class="youplay-timeline-block">
                    <!-- icon -->
                    <div class="youplay-timeline-icon bg-warning">
                       <i class="fa fa-bomb"></i>
                    </div>
                    <!-- /icon -->

                    <!-- content -->
                    <div class="youplay-timeline-content">
                        <p>
                            After the climatic hecatomb, the few surviving nations emptied their nuclear
                            arsenals fighting for the few resources remaining in the planet. After a few
                            generations, the few human surviving tribes have forgotten almost all of their
                            previous civilizations.
                        </p>
                    </div>
                    <!-- content -->
                </div>
                <!-- /Timeline Notification -->


                <!-- Timeline Message -->
                <div class="youplay-timeline-block">
                     <!-- icon -->
                    <div class="youplay-timeline-icon bg-danger">
                       <i class="fa fa-desktop"></i>
                    </div>
                    <!-- /icon -->
                    <!-- content -->
                    <div class="youplay-timeline-content">
                        Somewhere afar, a creepy suvirving Artificial Intelligence self-proclaims itself as Electro-King Computon and succeeds in organizing a pseudo-medieval class-based society.
                    </div>
                    <!-- /content -->
                </div>
                <!-- /Timeline Message -->

                <!-- Timeline Message -->
                <div class="youplay-timeline-block">
                     <!-- icon -->
                    <div class="youplay-timeline-icon bg-success">
                       <i class="fa fa-cogs"></i>
                    </div>
                    <!-- /icon -->
                    <!-- content -->
                    <div class="youplay-timeline-content">
                        Robo-Serfs keep all the infrastructures working (enery, food, equipment production, and all things important), while Robo-Nobles just slack around and entertain King Computon on its Court.
                    </div>
                    <!-- /content -->
                </div>
                <!-- /Timeline Message -->

                <!-- Timeline Message -->
                <div class="youplay-timeline-block">
                     <!-- icon -->
                    <div class="youplay-timeline-icon bg-primary">
                       <i class="fa fa-user"></i>
                    </div>
                    <!-- /icon -->
                    <!-- content -->
                    <div class="youplay-timeline-content">
                        Humans, Neon Knights all of them, spend their time pursuing great feats to earn their King's and other Knight's respect. They explore and fight post-hecatombic dangers, but also party, write songs or poetry, or star in torrid Robo-Romances.
                    </div>
                    <!-- /content -->
                </div>
                <!-- /Timeline Message -->
     

            </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Realistic Battles -->


<!-- The True Emotions -->
<section class="container mt-120">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="fs-40 mt-0" id="beta">¿Are you up for the BETA?</h2>

            <p class="lead">We still are shaping what Neon Knights will be. We've got lots of exciting
                ideas, but there's still a lot of work to do!</p>

            <p class="lead">If you are interested, sign up with your email in  the form below, so you can
                keep you informed about our progress, and also having the <strong>chance to be in on of the first beta game groups</strong>.</p>

            <form action="https://neonknightsrpg.us20.list-manage.com/subscribe/post?u=c41b4912c882eb6784877b569&amp;id=e42b76274f" method="post" class="comment-form" id="beta-signup-form">
                <div class="comment-cont clearfix">
                    <div class="youplay-input">
                        <input type="email" name="EMAIL" placeholder="Tu Email *">
                    </div>
                    <div class="mc-field-group input-group" style="display:none;">
                        <strong>Language </strong>
                        <ul><li><input type="checkbox" value="1" name="group[5281][1]" id="mce-group[5281]-5281-0" checked><label for="mce-group[5281]-5281-0">English</label></li>
                            <li><input type="checkbox" value="2" name="group[5281][2]" id="mce-group[5281]-5281-1"><label for="mce-group[5281]-5281-1">Spanish</label></li>
                        </ul>
                    </div>
                    <div class="content__gdpr">
                        <p>Will you allow us to send you emails? You will be able to op-out at any moment.</p>
                        <fieldset class="mc_fieldset gdprRequired mc-field-group" name="interestgroup_field">
                        <label class="checkbox subfield" for="gdpr_10781"><input type="checkbox" id="gdpr_10781" name="gdpr[10781]" value="Y" class="av-checkbox gdpr"><span>I want updates and I accept the <a href="/privacy.html" target="_blank">Privacy Terms</a></span> </label>
                            </fieldset>
                        <p></p>
                    </div>
                    <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default pull-left">Sign Up for the Beta</button>
                    <br clear="both" /><br clear="both" />
                    <div class="content__gdprLegal">
                        <p><small>We use Mailchimp as our marketing platform. By clicking below to subscribe, you acknowledge that your information will be transferred to Mailchimp for processing. <a href="https://mailchimp.com/legal/" target="_blank">Learn more about Mailchimp's privacy practices here.</a></small></p>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
<!-- /The True Emotions -->


<!-- Preorder -->
<section class="youplay-banner youplay-banner-parallax big mt-120">
    <div class="image" data-speed="0.4">
        <img class="jarallax-img" src="{{asset('storage/banner-bg-1.jpg')}}" alt="">
    </div>

    <div class="info container align-center">
        <div>
            <h2 style= "font-size: 50px">Follow us in our social media</h2>
            <br>
            <!-- Social Buttons -->
        <div class="social">
            <div class="container">

                <div class="social-icons">
                    <div class="social-icon">
                        <a href="https://www.twitter.com/NeonKnightsRPG">
                            <i class="fa fa-fw fa-twitter-square fa-2x"></i>
                            <span>Twitter</span>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a href="https://www.facebook.com/NeonKnightsRPG">
                            <i class="fa fa-fw fa-facebook-square"></i>
                            <span>Facebook</span>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a href="https://www.instagram.com/neonknights_rpg/">
                            <i class="fa fa-fw fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Social Buttons -->

            
        </div>
    </div>
</section>
        
{{-- <div class="content-wrap">
        
            <!--
    Banner

    Additional classes:
        .small
        .xsmall
        .big
        .full
-->
<section class="youplay-banner banner-top youplay-banner-parallax">
    
        <div class="image" data-speed="0.4">
            <img src="assets/images/dark/banner-bg.jpg" alt="" class="jarallax-img">
        </div>
    

    <div class="info">
        <div>
            <div class="container">
                
                    <div class="row"><div class="col-md-8">
                
                
                    <h1 class="h1"><img src="assets/images/logo-splash.png" /></h1>
                
                
                    
    <p class="lead">
        <strong>The Role-Playing Game for people without time enough to play Role-Playing Games.</strong>
    </p>
    <p class="lead"> 
        Play a Neon Knight, <strong>a chivalry member in a medieval-post-apocalyptic future,</strong> and play an email based RPG with your friends in weekly rounds.
    </p>
    <br>
    <a class="btn btn-md active" href="#beta"><i class="fa fa-eye"></i>&nbsp; SIGN UP FOR THE BETA</a>

                
                
                    </div></div>
                
            </div>
        </div>
    </div>
</section>
<!-- /Banner -->

        

        

    <div class="container youplay-content">

        <h2 class="text-center mt-60 fs-40">How does it work?</h2>

        <p class="lead">Neon Knights is a <strong>email based role-playing game</strong> where you can have fun with your friends <strong>investing just a little time each week</strong>.</p>

        <p class="lead">

          Decide which actions your character will do in the weekly turn, and discover what happened on the weekly Electro-Bulletin of the Kingdom of Computonia. <strong>Explore, Joust, Sabotage, or Collaborate with other Neon Knights</strong> to be awarded the Allegiance Points that <strong>Electro-King Computon</strong> awards to the Knights whose actions please it the most, and which will gran your character better equipment and most noble quests.
        </p>

    </div>

    <!-- Features -->
    <section class="youplay-features container mt-60 mb-30">
        <div class="col-sm-4">
            <div class="feature angled-bg">
                <i class="fa fa-user-circle"></i>
                <h3>Create your Character</h3>
                <div>
                    Set Name, Titles, Banner, Gender (or non-binary), personality, oddities.. whatever you want!
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="feature angled-bg">
                <i class="fa fa-calendar-check"></i>
                <h3>Decide your Turn</h3>
                <div>
                    Set which actions will your Neon Knights invest their time in for the weekly turn.
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="feature angled-bg">
                <i class="fa fa-envelope-open"></i>
                <h3>Read the Weekly Bulletin</h3>
                <div>
                    Each week, you will receive by email a bulletin with all the group's actions resolved, and the Allegiance Points earned or lose by everyone.
                </div>
            </div>
        </div>
    </section>
    <!-- /Features -->


    <!-- Realistic Battles -->
    <section class="youplay-banner youplay-banner-parallax big">
        <div class="image" data-speed="0.4">
            <img class="jarallax-img" src="assets/images/dark/banner-bg-3.jpg" alt="">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h2 class="fs-40 mt-45">Welcome to Kingdom of Computonia</h2>
                    <br>
                    <div class="youplay-timeline">

                    <!-- Timeline Notification -->
                    <div class="youplay-timeline-block">
                        <!-- icon -->
                        <div class="youplay-timeline-icon bg-warning">
                           <i class="fa fa-bomb"></i>
                        </div>
                        <!-- /icon -->

                        <!-- content -->
                        <div class="youplay-timeline-content">
                            <p>
                                After the climatic hecatomb, the few surviving nations emptied their nuclear
                                arsenals fighting for the few resources remaining in the planet. After a few
                                generations, the few human surviving tribes have forgotten almost all of their
                                previous civilizations.
                            </p>
                        </div>
                        <!-- content -->
                    </div>
                    <!-- /Timeline Notification -->


                    <!-- Timeline Message -->
                    <div class="youplay-timeline-block">
                         <!-- icon -->
                        <div class="youplay-timeline-icon bg-danger">
                           <i class="fa fa-desktop"></i>
                        </div>
                        <!-- /icon -->
                        <!-- content -->
                        <div class="youplay-timeline-content">
                            Somewhere afar, a creepy suvirving Artificial Intelligence self-proclaims itself as Electro-King Computon and succeeds in organizing a pseudo-medieval class-based society.
                        </div>
                        <!-- /content -->
                    </div>
                    <!-- /Timeline Message -->

                    <!-- Timeline Message -->
                    <div class="youplay-timeline-block">
                         <!-- icon -->
                        <div class="youplay-timeline-icon bg-success">
                           <i class="fa fa-cogs"></i>
                        </div>
                        <!-- /icon -->
                        <!-- content -->
                        <div class="youplay-timeline-content">
                            Robo-Serfs keep all the infrastructures working (enery, food, equipment production, and all things important), while Robo-Nobles just slack around and entertain King Computon on its Court.
                        </div>
                        <!-- /content -->
                    </div>
                    <!-- /Timeline Message -->

                    <!-- Timeline Message -->
                    <div class="youplay-timeline-block">
                         <!-- icon -->
                        <div class="youplay-timeline-icon bg-primary">
                           <i class="fa fa-user"></i>
                        </div>
                        <!-- /icon -->
                        <!-- content -->
                        <div class="youplay-timeline-content">
                            Humans, Neon Knights all of them, spend their time pursuing great feats to earn their King's and other Knight's respect. They explore and fight post-hecatombic dangers, but also party, write songs or poetry, or star in torrid Robo-Romances.
                        </div>
                        <!-- /content -->
                    </div>
                    <!-- /Timeline Message -->
         

                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Realistic Battles -->


    <!-- The True Emotions -->
    <section class="container mt-120">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="fs-40 mt-0" id="beta">¿Are you up for the BETA?</h2>

                <p class="lead">We still are shaping what Neon Knights will be. We've got lots of exciting
                    ideas, but there's still a lot of work to do!</p>

                <p class="lead">If you are interested, sign up with your email in  the form below, so you can
                    keep you informed about our progress, and also having the <strong>chance to be in on of the first beta game groups</strong>.</p>

                <form action="https://neonknightsrpg.us20.list-manage.com/subscribe/post?u=c41b4912c882eb6784877b569&amp;id=e42b76274f" method="post" class="comment-form" id="beta-signup-form">
                    <div class="comment-cont clearfix">
                        <div class="youplay-input">
                            <input type="email" name="EMAIL" placeholder="Tu Email *">
                        </div>
                        <div class="mc-field-group input-group" style="display:none;">
                            <strong>Language </strong>
                            <ul><li><input type="checkbox" value="1" name="group[5281][1]" id="mce-group[5281]-5281-0" checked><label for="mce-group[5281]-5281-0">English</label></li>
                                <li><input type="checkbox" value="2" name="group[5281][2]" id="mce-group[5281]-5281-1"><label for="mce-group[5281]-5281-1">Spanish</label></li>
                            </ul>
                        </div>
                        <div class="content__gdpr">
                            <p>Will you allow us to send you emails? You will be able to op-out at any moment.</p>
                            <fieldset class="mc_fieldset gdprRequired mc-field-group" name="interestgroup_field">
                            <label class="checkbox subfield" for="gdpr_10781"><input type="checkbox" id="gdpr_10781" name="gdpr[10781]" value="Y" class="av-checkbox gdpr"><span>I want updates and I accept the <a href="/privacy.html" target="_blank">Privacy Terms</a></span> </label>
                                </fieldset>
                            <p></p>
                        </div>
                        <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default pull-left">Sign Up for the Beta</button>
                        <br clear="both" /><br clear="both" />
                        <div class="content__gdprLegal">
                            <p><small>We use Mailchimp as our marketing platform. By clicking below to subscribe, you acknowledge that your information will be transferred to Mailchimp for processing. <a href="https://mailchimp.com/legal/" target="_blank">Learn more about Mailchimp's privacy practices here.</a></small></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- /The True Emotions -->


    <!-- Preorder -->
    <section class="youplay-banner youplay-banner-parallax big mt-120">
        <div class="image" data-speed="0.4">
            <img class="jarallax-img" src="assets/images/dark/banner-bg-1.jpg" alt="">
        </div>

        <div class="info container align-center">
            <div>
                <h2>Follow us in our social media</h2>
                <br>
                <!-- Social Buttons -->
            <div class="social">
                <div class="container">

                    <div class="social-icons">
                        <div class="social-icon">
                            <a href="https://www.twitter.com/NeonKnightsRPG">
                                <i class="fab fa-twitter-square"></i>
                                <span>Twitter</span>
                            </a>
                        </div>
                        <div class="social-icon">
                            <a href="https://www.facebook.com/NeonKnightsRPG">
                                <i class="fab fa-facebook-square"></i>
                                <span>Facebook</span>
                            </a>
                        </div>
                        <div class="social-icon">
                            <a href="https://www.instagram.com/neonknights_rpg/">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Social Buttons -->

                
            </div>
        </div>
    </section>
    <!-- /Preorder --> --}}
@endsection

   
    