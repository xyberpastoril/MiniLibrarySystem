<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // In array
        // title, description, page_count, isbn, published date
        // Relationship
        // author, genres

        // #1
        $book = \App\Models\Book::create([
            'title' => "Attack on Titan: Volume 13",
            'description' => "NO SAFE PLACE LEFT At great cost to the Garrison and the Survey Corps, Commander Erwin has managed to recover Eren from the Titans who tried to carry him off. But during the battle, Eren manifested yet another power he doesn't understand. As Eren and Krista find new enemies, the Survey Corps faces threats from both inside and outside the walls. And what will happen to Ymir, now that she has decided to make herself the Titans' prize?",
            'page_count' => 192,
            'isbn' => '9780000000000',
            'published_date' => '2014-07-31',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Hajime Isayama"],
            ['name' => "Hajime Isayama"],
        ]);
        
        // #2
        $book = \App\Models\Book::create([
            'title' => "Antiques Roadkill: A Trash 'n' Treasures Mystery",
            'description' => 'Determined to make a new start in her quaint hometown on the banks of the Mississippi, Brandy Borne never dreams she\'ll become the prime suspect in a murder case. . . 

            Moving back in with her eccentric, larger-than-life mother, Brandy Borne finds small-town Serenity anything but serene. It seems an unscrupulous antiques dealer has swindled Vivian out of the family\'s heirlooms. But when he is found run over in a country lane, Brandy becomes Murder Suspect Number One--with her mother coming in a very close second. . . 
            
            The list of other suspects is impressive--the victim\'s business seems to have been based on bilking seniors out of their possessions. And when the Borne "girls" uncover a few very unsavory Serenity secrets, they become targets for a murderer whose favorite hobby seems to be collecting victims. 
            
            Don\'t miss Brandy Borne\'s tips on antiques! 
            
            "Cozy mystery fans will love this down-to-earth heroine with the wry sense of humor and a big heart." --Nancy Pickard 
            
            "With its small-town setting and quirky characters, Antiques Roadkill is fun from start to finish. Dive in and enjoy."--Laurien Berenson',
            'page_count' => 288,
            'isbn' => '9780000000000',
            'published_date' => '2007-07-01',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Barbara Allan"],
        ]);
        $book->genres()->createMany([
            ['name' => "Fiction"],
            ['name' => "Mystery & Detective"],
            ['name' => "Cozy"],
            ['name' => "General"],
        ]);

        // #3
        $book = \App\Models\Book::create([
            'title' => "The Art of Super Mario Odyssey",
            'description' => "Take a globetrotting journey all over the world--and beyond!--with this companion art book to the hit video game for the Nintendo Switch(TM) system!

            In October of 2017, Super Mario Odyssey(TM) took the gaming world by storm. Now, discover the art and expertise that went into creating one of Nintendo's best-loved games!
            
            This full-color volume clocks in at over 350 pages and features concept art, preliminary sketches, and notes from the development team, plus insight into some early ideas that didn't make it into the game itself! Explore the world of Super Mario Odyssey from every angle, including screen shots, marketing material, and more, to fully appreciate this captivating adventure",
            'page_count' => 368,
            'isbn' => '9780000000000',
            'published_date' => '2019-11-05',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Nintendo"],
        ]);
        $book->genres()->createMany([
            ['name' => "Games & Activities"],
            ['name' => "Video"],
        ]);

        // #4
        $book = \App\Models\Book::create([
            'title' => "Getting Away Is Deadly: An Ellie Avery Mystery",
            'description' => "With swollen feet and swelling belly, pregnant Ellie bravely joins the nation's tourists in seeing the sights in Washington, D.C. But a fatal incident at the Metro station convinces Ellie that something is rotten in the capital city. Should she do the safe thing and pack her bags? Not likely when too many people are telling lies, hiding secrets, and acting suspiciously. Luckily, Ellie Avery is just the right woman to clean up the most mysterious cases of murder--even if she has to brave the most dangerous byways in the corridors of power . . .




            Don't miss Ellie Avery's top-notch tips for great vacations!
            
            
            
            Praise for Sara Rosett and her Mom Zone Mysteries. . .
            
            
            
            \"Crackles with intrigue, keeps you turning pages.\"
            --Alesia Holliday
            
            
            
            \"Sharp writing, tight plotting, a fascinating peek into the world of military wives. Jump in!\"
            --Cynthia Baxter
            
            
            
            \"The stunning conclusion should delight readers.\"
            --Romantic Times",
            'page_count' => 320,
            'isbn' => '9780000000000',
            'published_date' => '2009-03-01',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Sara Rosett"],
        ]);

        // #5
        $book = \App\Models\Book::create([
            'title' => "The Painted Man (The Demon Cycle, Book 1)",
            'description' => "The stunning debut fantasy novel from author Peter V. Brett.   The Painted Man, book one of the Demon Cycle, is a captivating and thrilling fantasy adventure, pulling the reader into a world of demons, darkness and heroes.  AS DARKNESS FALLS, THE DEMONS RISE For hundreds of years these creatures have terrorized the night, slowly culling the human population. It was not always this way. Men and women did not always cower behind protective magical wards and hope to see the dawn. Once, they battled the demons on equal terms, but those days, and skills, are gone. Arlen Bales lives with his parents on their isolated farmstead until a demon attack shatters their world. He learns a savage lesson that day: that people, as well as magic, can let you down. Rejecting the fear that kills as efficiently as the creatures, Arlen risks another path in order to offer humanity a last, fleeting chance of survival.",
            'page_count' => 544,
            'isbn' => '9780000000000',
            'published_date' => '2009-01-08',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Peter V. Brett"],
        ]);
        $book->genres()->createMany([
            ['name' => "Fiction"],
            ['name' => "Fantasy"],
            ['name' => "Dark Fantasy"],
        ]);

        // #6
        $book = \App\Models\Book::create([
            'title' => "A Feast for Crows (A Song of Ice and Fire, Book 4)",
            'description' => "HBOâ€™s hit series A GAME OF THRONES is based on George R. R. Martinâ€™s internationally bestselling series A SONG OF ICE AND FIRE, the greatest fantasy epic of the modern age. A FEAST FOR CROWS is the fourth volume in the series. The Lannisters are in power on the Iron Throne. The war in the Seven Kingdoms has burned itself out, but in its bitter aftermath new conflicts spark to life. The Martells of Dorne and the Starks of Winterfell seek vengeance for their dead. Euron Crowâ€™s Eye, as black a pirate as ever raised a sail, returns from the smoking ruins of Valyria to claim the Iron Isles. From the icy north, where Others threaten the Wall, apprentice Maester Samwell Tarly brings a mysterious babe in arms to the Citadel. As plots, intrigue and battle threaten to engulf Westeros, victory will go to the men and women possessed of the coldest steel and the coldest hearts.",
            'page_count' => 864,
            'isbn' => '9780000000000',
            'published_date' => '2011-02-24',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "George R.R. Martin"],
        ]);

        // #7
        $book = \App\Models\Book::create([
            'title' => "God of War: The Official Novelization",
            'description' => "The novelization of the highly anticipated God of War 4 game.
            His vengeance against the Gods of Olympus years behind him, Kratos now lives as a man in the realm of Norse gods and monsters. It is in this harsh, unforgiving world that he must fight to survive... and teach his son to do the same. This startling reimagining of God of War deconstructs the core elements that defined the seriesâ€”satisfying combat; breathtaking scale; and a powerful narrativeâ€”and fuses them anew.",
            'page_count' => 400,
            'isbn' => '9780000000000',
            'published_date' => '2018-08-28',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "J.M. Barlog"],
        ]);
        $book->genres()->createMany([
            ['name' => "Fiction"],
            ['name' => "Media Tie-in"],
        ]);

        // #8
        $book = \App\Models\Book::create([
            'title' => "Edgedancer: From the Stormlight Archive",
            'description' => "From #1 New York Times bestselling author Brandon Sanderson, a special gift edition of Edgedancer, a short novel of the Stormlight Archive (previously published in Arcanum Unbounded).Three years ago, Lift asked a goddess to stop her from growing older--a wish she believed was granted. Now, in Edgedancer, the barely teenage nascent Knight Radiant finds that time stands still for no one. Although the young Azish emperor granted her safe haven from an executioner she knows only as Darkness, court life is suffocating the free-spirited Lift, who can't help heading to Yeddaw when she hears the relentless Darkness is there hunting people like her with budding powers. The downtrodden in Yeddaw have no champion, and Lift knows she must seize this awesome responsibility.
            Other Tor books by Brandon Sanderson The Cosmere
             
             The Stormlight Archive
             The Way of Kings
             Words of Radiance
             Edgedancer (Novella)
             Oathbringer
             
             The Mistborn trilogy
             Mistborn: The Final Empire
             The Well of Ascension
             The Hero of Ages
             
             Mistborn: The Wax and Wayne series
             Alloy of Law
             Shadows of Self
             Bands of Mourning Collection
             Arcanum Unbounded Other Cosmere novels
             Elantris
             Warbreaker The Alcatraz vs. the Evil Librarians series
             Alcatraz vs. the Evil Librarians
             The Scrivener's Bones
             The Knights of Crystallia
             The Shattered Lens
             The Dark Talent The Rithmatist series
             The Rithmatist Other books by Brandon Sanderson
            
             The Reckoners
             Steelheart
             Firefight
             CalamityAt the Publisher's request, this title is being sold without Digital Rights Management Software (DRM) applied.",
            'page_count' => 226,
            'isbn' => '9780000000000',
            'published_date' => '2017-10-17',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Brandon Sanderson"],
        ]);
        $book->genres()->createMany([
            ['name' => "Fiction"],
            ['name' => "Fantasy"],
            ['name' => "Epic"],
        ]);

        // #9
        $book = \App\Models\Book::create([
            'title' => "Blood, Sweat, and Pixels: The Triumphant, Turbulent Stories Behind How Video Games Are Made",
            'description' => "NATIONAL BESTSELLERDeveloping video gamesâ€”hero's journey or fool's errand? The creative and technical logistics that go into building today's hottest games can be more harrowing and complex than the games themselves, often seeming like an endless maze or a bottomless abyss. In Blood, Sweat, and Pixels, Jason Schreier takes readers on a fascinating odyssey behind the scenes of video game development, where the creator may be a team of 600 overworked underdogs or a solitary geek genius. Exploring the artistic challenges, technical impossibilities, marketplace demands, and Donkey Kong-sized monkey wrenches thrown into the works by corporate, Blood, Sweat, and Pixels reveals how bringing any game to completion is more than Sisypheanâ€”it's nothing short of miraculous.Taking some of the most popular, bestselling recent games, Schreier immerses readers in the hellfire of the development process, whether it's RPG studio Bioware's challenge to beat an impossible schedule and overcome countless technical nightmares to build Dragon Age: Inquisition; indie developer Eric Barone's single-handed efforts to grow country-life RPG Stardew Valley from one man's vision into a multi-million-dollar franchise; or Bungie spinning out from their corporate overlords at Microsoft to create Destiny, a brand new universe that they hoped would become as iconic as Star Wars and Lord of the Ringsâ€”even as it nearly ripped their studio apart. Documenting the round-the-clock crunches, buggy-eyed burnout, and last-minute saves, Blood, Sweat, and Pixels is a journey through development hellâ€”and ultimately a tribute to the dedicated diehards and unsung heroes who scale mountains of obstacles in their quests to create the best games imaginable.",
            'page_count' => 304,
            'isbn' => '9780000000000',
            'published_date' => '2017-09-05',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Jason Schreier"],
        ]);
        $book->genres()->createMany([
            ['name' => "Games & Activities"],
            ['name' => "Video"],
        ]);

        // #10
        $book = \App\Models\Book::create([
            'title' => "Twas The Nightshift Before Christmas: Festive hospital diaries from the author of million-copy hit This is Going to Hurt",
            'description' => "A short gift book of festive hospital diaries from the author of million-copy bestseller This is Going to HurtChristmas is coming, the goose is getting fat . . . but 1.4 million NHS staff are heading off to work. In this perfect present for anyone who has ever set foot in a hospital, Adam Kay delves back into his diaries for a hilarious, horrifying and sometimes heartbreaking peek behind the blue curtain at Christmastime.Twas the Nightshift Before Christmas is a love letter to all those who spend their festive season on the front line, removing babies and baubles from the various places they get stuck, at the most wonderful time of the year.'The perfect surgical stocking-filler' The Times",
            'page_count' => 112,
            'isbn' => '9780000000000',
            'published_date' => '2019-10-17',
            'copies_owned' => 1,
        ]);
        $book->authors()->createMany([
            ['name' => "Adam Kay"],
        ]);
        $book->genres()->createMany([
            ['name' => "Biography & Autobiography"],
            ['name' => "Medical"],
        ]);

        // Blank template
        // $book = \App\Models\Book::create([
        //     'title' => "",
        //     'description' => "",
        //     'page_count' => 0,
        //     'isbn' => '9780000000000',
        //     'published_date' => '2014-07-31',
        //     'copies_owned' => 1,
        // ]);
        // $book->authors()->createMany([
        //     ['name' => ""],
        // ]);
        // $book->genres()->createMany([
        //     ['name' => ""],
        // ]);
    }
}
