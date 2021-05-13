<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div>
            <h2>Chivalry Points and Chivalry Level</h2>
            <p>
                The goal of the player characters is to get the maximum Chivalry Points in a month (4 weekly rounds),
                in order to be able to go up in their Chivalry Level. All player characters begin with a Chivalry Level of 1.
                To get their Chivalry Level up, player characters need attain as much Chilvary Points as 3 times the next
                level to attain during a month. For example, if a player character is at Level 1, needs to get 6 points
                during a month to get to Level 2.
            </p>
            <p>
                Chivalry points are NOT kept from month to month. After the 4 weekly rounds in that month, if a player
                character cannot get to a higher level of Chivalry, their Chivalry points are reset to 0. There is only one
                exception to this: if a character did level up, the remaining points after the level upgrade are kept for the
                next month. If for some reason a character ended with a negative count of points, their points count are also
                reset to 0 next month.
            </p>
            <p>
                For example: A player character is at Level 1, and at the end of the month has attained 8 Chivalry points.
                She will level up to Level 2, and keep 2 Chivalry Points (as only 6 points were needed to level 2). Another
                player character is at Level 1 and only attained 4 Chivalry points, so can’t level up and their points are
                reset to 0 in the next month.
            </p>
            <p>
                Attaining Chivalry points is the only way to level up, although there can be special story events that can
                level up characters without the required points.
            </p>

            <h2>Character Abilities</h2>
            <p>Characters hav four attributes:<p>
            <ul>
                <li>Strength</li>
                <li>Dexterity</li>
                <li>Constitution</li>
                <li>Stamina</li>
            </ul>
            <p>
                Stamina is a Points pool that reflects the overall physical status of a character, and its maximum is the sum
                of Strength + Constitution. Some physical actions (like jousting, or partying at the tavern) can consume the
                Stamina pool of a character. Player characters can recover their stamina using the “Slacking” action. If a
                character gets to 0 stamina points, they cannot do any more actions during the current round. 
            </p>

            <h2>Weekly Rounds</h2>
            <p>
                Each week, players get to decide what they characters will spend the round doing. Each has 3 “action slots”:
                Beginning of the Week, Middle of the Week, and End of the Week.
            </p>
            <p>
                There are simple actions that only require 1 action slot, some that require 2 slots, and some actions thar require
                the whole week (3 slots).
            </p>
            <p>
                Also, characters can choose wether they accept or reject any joust or drinking contest that may arise in each of
                the 3 action slots in the week.
            </p>
            <p>
                The basic actions available for playing characters during a week (although storyline can unlock new action types
                in the future) are:
            </p>
            <ul>
                <li>
                    Going on Quests (3 action slots). The character will leave Computonia for the whole week to look for
                    quests. Players will play a short, browser-playable “choose-your-own-adventure” adventure, and depending
                    on their actions they can find out more about the laying storyline, find treasure and equipment, be
                    awarded Chivalry Points.. or none of the above. As the player character is outside Computonia, they won’t
                    have to answer any jousting challenges they may have from other players.
                </li>
                <li>
                    Flirt with a Noblebot (1 action slot). Love and Romance is a big part of being a Neon Knight. Although
                    relationships between humans are not allowed in Computonia, Neon Knights are expected to flirt with the NobleBots
                    from King Computon’s Court. There are as many Noblebots available as player characters in a gaming group, and
                    players can try to gain their attentions anytime in a round. Noblebots have different Levels, which make more easy
                    or difficult for playing characters to get somewhere with them. Chivalry points are awarded if there is success
                    (as many as the level distance between knight and noblebot), and failure grants no Chivalry Points (but doesn’t
                    lose points, either).
                    But if a Player Character has not performed Flirting intents during 2 rounds straight (2 weeks), they will lose 1
                    Chivalry Point.
                    If one or more characters try to flirt with the same Noblebot in the same action slot of the week, they will be
                    able to challenge each other to a Joust.
                </li>
                <li>
                    Party at the Tavern (1 action slot). Partying at the Tavern is also expected from a Neon Knight. King Computon
                    grats 1 Chivalry point for an action slot spent in the Tavern, at the cost of 1d3 Stamina Points for the characters
                    (partying has a cost to your health, after all). If more than one Neon Knight go to the Tavern in the same action
                    slot of the week, they may compete in a Drinking Joust. During succesive rounds, each player drinks and rolls a
                    Constitution check, losing 1d3 of Stamina each round. If the check is unpassed, they are out of the Drinking Joust.
                    This continues until there is only one Playing Character standing. The winner is granted as many Chivalry Points as
                    rounds in the Drinking Joust they endured. Losers do not lose Chivalry Points.
                    A Player can choose no to take part in the Drinking Joust, though. Then, they loose 3 Chivalry points due to their
                    cowardice. Also, the losers from a Drinking Joust can challenge the winner to a Joust in the next week round.
                </li>
                <li>
                    Train Jousting Skills (1 action slot). For each 3 action slots spent in one or more rounds, a Playing Character can
                    add 1 to their Dexterity attribute. Also, 4 points of Dexterity upgraded via training can also be “spent” to add 1
                    to their Strength attribute.
                </li>
                <li>
                    Write a song or a poem (2 action slots). Players can spend 2 action slots to write a short poem or song. They have
                    to actually write it! King Computon will grant Chivalry Points to its liking, judging the artistic or comedy
                    qualities of the composition (typically between 1 and 3).
                </li>
                <li>
                    Joust against another playing character (1 action slot). If players have enough cause to do so (as seen in the
                    Tavern and Flirting actions), they can challenge other player characters to a proper, Medieval-like Joust. They
                    fight 3 rounds (or Lances) until the stamina of one of them goes down to 0. If both characters are still standing
                    after 3 lances, the one standing with better stamina is the winner. The winner is granted 3 Chivalry Points, and
                    the loser does not lose any Chivalry Points. Joust challenges can be rejected, but the rejecting player loses 3
                    Chivalry Points (and the challenger wins no Chivalry points in this case).
                </li>
                <li>
                    Slacking (1 action slot). Player characters can rest for an action slot and regain 3 Stamina points. 
                </li>
            </ul>
        </div>
    </body>
</html>