@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Chivalry Points and Chivalry Level</h2>
        <p>
            The goal of the player characters is to get the maximum Chivalry Points in a month (4 weekly rounds),
            in order to be able to go up in their Chivalry Level. All player characters begin with a Chivalry Level of 1.
            To get their Chivalry Level up, player characters need attain as much Chilvary Points as 3 times the next
            level to attain during a month. For example, if a player character is at Level 1, needs to get 6 points
            during a month to get to Level 2.
        </p>
        <p>
            Chivalry points are ONLY kept from month to month if you level up. After the 4 weekly rounds in that month,
            if a player character cannot get to a higher level of Chivalry, their Chivalry points are reset to 0. There
            is only one exception to this: if a character did level up, the remaining points after the level upgrade are
            kept for the next month. If for some reason a character ended with a negative count of points, their points
            count are also reset to 0 next month.
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
@endsection