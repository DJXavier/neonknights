@extends('layouts.app')

@section('content')


<style>
    body {
        background-color: #080325e6;
    }
    
    p {
        font-size: 22px;
        font: sans-serif;
    }

    strong {
        font-size: 22px;
        font: sans-serif;
    }

    h1 {
        color: #ffffff;
    }

    h3 {
        color: #ffffff;
    }

    div{
        color: #ffffff;
    }

</style>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<br><br><br>

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
    <div class="container">

        <h2 class="text-center">How does it work?</h2>

        <p>Neon Knights is a <strong>email based role-playing game </strong> where you can have fun with your friends <strong> investing just a little time each week</strong>.</p>

        <p style="font-size: 21px">Decide which actions your character will do in the weekly turn, and discover what happened on the weekly Electro-Bulletin of the Kingdom of Computonia. <strong> Explore, Joust, Sabotage, or Collaborate with other Neon Knights </strong> to be awarded the Allegiance Points that <strong> Electro-King Computon </strong> awards to the Knights whose actions please it the most, and which will gran your character better equipment and most noble quests.</p>

    </div>
</section>

<br><br><br><br>

<section class="container">
    <div class="row">
        <div class="col-sm-4 justify-content-center text-center"> 
            <div><i class="fa fa-fw fa-user-circle fa-3x pb-3" style="color: #ffffff"></i></div> 
            <h3>Create your Character</h3>
            <div>
                Set Name, Titles, Banner, Gender (or non-binary), personality, oddities.. whatever you want!
            </div>
        </div>   

        <div class="col-sm-4 justify-content-center text-center">
            <i class="fa fa-fw fa-calendar-check-o fa-3x pb-3" style="color: #ffffff"></i>
            <h3>Decide your Turn</h3>
            <div>
                Set which actions will your Neon Knights invest their time in for the weekly turn.
            </div>
        </div>

        <div class="col-sm-4 justify-content-center text-center">
            <i class="fa fa-fw fa-envelope-open fa-3x pb-3" style="color: #ffffff"></i>
            <h3>Read the Weekly Bulletin</h3>
            <div>
                Each week, you will receive by email a bulletin with all the group's actions resolved, and the Allegiance Points earned or lose by everyone.
            </div>
        </div>  
    </div> 
</section>

<br><br><br><br><br><br><br>

<section>
    <div class="container">
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

<br><br><br><br><br><br><br><br><br>

@endsection

   
    