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
            'isbn' => '978-1612626796',
            'published_date' => '2014-07-31',
            'copies_owned' => 2,
            'cover_url' => '1',
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
            'isbn' => '0758211929',
            'published_date' => '2007-07-01',
            'copies_owned' => 1,
            'cover_url' => '2',
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
            'isbn' => '978-1506713755',
            'published_date' => '2019-11-05',
            'copies_owned' => 2,
            'cover_url' => '3',
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
            'description' => "With swollen feet and swelling belly, pregnant Ellie bravely joins the nation's tourists in seeing the sights in Washington, D.C. But a fatal incident at the Metro station convinces Ellie that something is rotten in the capital city. Should she do the safe thing and pack her bags? Not likely when too many people are telling lies, hiding secrets, and acting suspiciously. Luckily, Ellie Avery is just the right woman to clean up the most mysterious cases of murder--even if she has to brave the most dangerous byways in the corridors of power . . .",
            'page_count' => 320,
            'isbn' => '978-0758278333',
            'published_date' => '2009-03-01',
            'copies_owned' => 1,
            'cover_url' => '4',
        ]);
        $book->authors()->createMany([
            ['name' => "Sara Rosett"],
        ]);

        // #5
        $book = \App\Models\Book::create([
            'title' => "The Painted Man (The Demon Cycle, Book 1)",
            'description' => "The stunning debut fantasy novel from author Peter V. Brett.   The Painted Man, book one of the Demon Cycle, is a captivating and thrilling fantasy adventure, pulling the reader into a world of demons, darkness and heroes.  AS DARKNESS FALLS, THE DEMONS RISE For hundreds of years these creatures have terrorized the night, slowly culling the human population. It was not always this way. Men and women did not always cower behind protective magical wards and hope to see the dawn. Once, they battled the demons on equal terms, but those days, and skills, are gone. Arlen Bales lives with his parents on their isolated farmstead until a demon attack shatters their world. He learns a savage lesson that day: that people, as well as magic, can let you down. Rejecting the fear that kills as efficiently as the creatures, Arlen risks another path in order to offer humanity a last, fleeting chance of survival.",
            'page_count' => 544,
            'isbn' => '0345503805',
            'published_date' => '2009-01-08',
            'copies_owned' => 1,
            'cover_url' => '5',
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
            'description' => "It seems too good to be true. After centuries of bitter strife and fatal treachery, the seven powers dividing the land have decimated one another into an uneasy truce. Or so it appears. . . . With the death of the monstrous King Joffrey, Cersei is ruling as regent in King’s Landing. Robb Stark’s demise has broken the back of the Northern rebels, and his siblings are scattered throughout the kingdom like seeds on barren soil. Few legitimate claims to the once desperately sought Iron Throne still exist—or they are held in hands too weak or too distant to wield them effectively. The war, which raged out of control for so long, has burned itself out.
                            But as in the aftermath of any climactic struggle, it is not long before the survivors, outlaws, renegades, and carrion eaters start to gather, picking over the bones of the dead and fighting for the spoils of the soon-to-be dead. Now in the Seven Kingdoms, as the human crows assemble over a banquet of ashes, daring new plots and dangerous new alliances are formed, while surprising faces—some familiar, others only just appearing—are seen emerging from an ominous twilight of past struggles and chaos to take up the challenges ahead.
                            It is a time when the wise and the ambitious, the deceitful and the strong will acquire the skills, the power, and the magic to survive the stark and terrible times that lie before them. It is a time for nobles and commoners, soldiers and sorcerers, assassins and sages to come together and stake their fortunes . . . and their lives. For at a feast for crows, many are the guests—but only a few are the survivors.",
            'page_count' => 864,
            'isbn' => '0006486126',
            'published_date' => '2011-02-24',
            'copies_owned' => 1,
            'cover_url' => '6',
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
            'isbn' => '978-1789090147',
            'published_date' => '2018-08-28',
            'copies_owned' => 1,
            'cover_url' => '7',
        ]);
        $book->authors()->createMany([
            ['name' => "J.M. Barlog"],
            ['name' => "Cory Barlog"],
        ]);
        $book->genres()->createMany([
            ['name' => "Fiction"],
            ['name' => "Media Tie-in"],
        ]);

        // #8
        $book = \App\Models\Book::create([
            'title' => "Edgedancer: From the Stormlight Archive",
            'description' => "From #1 New York Times bestselling author Brandon Sanderson, a special gift edition of Edgedancer, a short novel of the Stormlight Archive (previously published in Arcanum Unbounded).Three years ago, Lift asked a goddess to stop her from growing older--a wish she believed was granted. Now, in Edgedancer, the barely teenage nascent Knight Radiant finds that time stands still for no one. Although the young Azish emperor granted her safe haven from an executioner she knows only as Darkness, court life is suffocating the free-spirited Lift, who can't help heading to Yeddaw when she hears the relentless Darkness is there hunting people like her with budding powers. The downtrodden in Yeddaw have no champion, and Lift knows she must seize this awesome responsibility.",
            'page_count' => 226,
            'isbn' => '978-1250166548',
            'published_date' => '2017-10-17',
            'copies_owned' => 1,
            'cover_url' => '8',
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
            'isbn' => '978-0062651235',
            'published_date' => '2017-09-05',
            'copies_owned' => 1,
            'cover_url' => '9',
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
            'isbn' => '978-1529018585',
            'published_date' => '2019-10-17',
            'copies_owned' => 1,
            'cover_url' => '10',
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
