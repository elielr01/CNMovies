<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use App\Screen;
use App\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users seeder

        //First we seed the Admins at the Users table
        for ($i = 1; $i <= 5; $i++) {
            $user_fn = "admin_fn" . $i;
            $user_ln = "admin_ln" . $i;
            $email = "admin" . $i ."@gmail.com";
            $username = "admin" . $i;
            $password = "movies";
            $type = "Admin";

            DB::table('users')->insert([
                'firstname' => $user_fn,
                'lastname' => $user_ln,
                'email' => $email,
                'username' => $username,
                'password' => bcrypt($password),
                'type' => $type,
                'created_at' => Carbon::now()
            ]);
        }

        // Then we seed the Admins at the Admins table
        $users = User::all();
        foreach ($users as $user) {
            // Everyone is admin at this point
            DB::table('admins')->insert([
                'admin_id' => $user->id,
                'added_by' => 1
            ]);
        }

        // Then we seed the customer types
        // For instance, there's gonna be just 1 type
        DB::table('customer_types')->insert([
            'name' => "normal"
        ]);

        // Then we seed the Customers at the Users table
        for ($i = 1; $i <= 10; $i++) {
            $user_fn = "customer_fn" . $i;
            $user_ln = "customer_ln" . $i;
            $email = "customer" . $i ."@gmail.com";
            $username = "customer" . $i;
            $password = "movies";
            $type = "Customer";

            DB::table('users')->insert([
                'firstname' => $user_fn,
                'lastname' => $user_ln,
                'email' => $email,
                'username' => $username,
                'password' => bcrypt($password),
                'type' => $type,
                'created_at' => Carbon::now()
            ]);
        }

        // Then we seed the Customers at the Customers table
        $users = User::all();
        foreach ($users as $user) {
            // At this point, there are Admins and Customers
            if ($user->type == "Customer") {
                DB::table('customers')->insert([
                    'customer_id' => $user->id,
                    'type' => 1,
                    'is_banned' => 0,
                ]);
            }
        }

        // Cinemas creation
        DB::table('cinemas')->insert([
            'name' => 'CNM Valle Oriente',
            'address' => 'Av Lázaro Cárdenas 1000, Paseo de Las Privanzas, 64700 Monterrey, N.L.',
            'telephone' => '+52 (81) 2315 1011',
            'email' => 'valle.oriente@cnmovies.com',
        ]);
        DB::table('cinemas')->insert([
            'name' => 'CNM Nuevo Sur',
            'address' => 'Avenida Revolución 2703, La Ladrillera, 64830 Monterrey, N.L.',
            'telephone' => '+52 (81) 2222 2291',
            'email' => 'nuevo.sur@cnmovies.com',
        ]);
        DB::table('cinemas')->insert([
            'name' => 'CNM Esfera',
            'address' => 'Av. La Rioja 245, Residencial la Rioja, 64985 Monterrey, N.L.',
            'telephone' => '+52 (81) 2134 0200',
            'email' => 'esfera@cnmovies.com',
        ]);


        // Movie categories creation
        DB::table('movie_categories')->insert([
            'name' => 'G'
        ]);
        DB::table('movie_categories')->insert([
           'name' => 'PG'
        ]);
        DB::table('movie_categories')->insert([
            'name' => 'PG-13'
        ]);
        DB::table('movie_categories')->insert([
            'name' => 'R'
        ]);
        DB::table('movie_categories')->insert([
            'name' => 'NC-17'
        ]);


        // Movies creation

        // Coco
        $movies = [
            [
                'movie_category_id' => 2,
                'name' => 'Coco',
                'duration' => 109,
                'directors' => 'Lee Unkrich, Adrian Molina (co-director)',
                'stars' => 'Anthony Gonzalez, Gael García Bernal, Benjamin Bratt',
                'img_name' => 'coco.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi4249729305',
                'storyline' => "Despite his family's baffling generations-old ban on music, Miguel dreams of becoming an accomplished musician like his idol, Ernesto de la Cruz. Desperate to prove his talent, Miguel finds himself in the stunning and colorful Land of the Dead following a mysterious chain of events. Along the way, he meets charming trickster Hector, and together, they set off on an extraordinary journey to unlock the real story behind Miguel's family history.",
                'is_premiere' => 1,
                'is_active' => 1

            ],
            [
                'movie_category_id' => 4,
                'name' => 'Logan',
                'duration' => 137,
                'directors' => 'James Mangold',
                'stars' => 'Hugh Jackman, Patrick Stewart, Dafne Keen',
                'img_name' => 'logan.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi1946727961',
                'storyline' => "In 2029 the mutant population has shrunken significantly and the X-Men have disbanded. Logan, whose power to self-heal is dwindling, has surrendered himself to alcohol and now earns a living as a chauffeur. He takes care of the ailing old Professor X whom he keeps hidden away. One day, a female stranger asks Logan to drive a girl named Laura to the Canadian border. At first he refuses, but the Professor has been waiting for a long time for her to appear. Laura possesses an extraordinary fighting prowess and is in many ways like Wolverine. She is pursued by sinister figures working for a powerful corporation; this is because her DNA contains the secret that connects her to Logan. A relentless pursuit begins - In this third cinematic outing featuring the Marvel comic book character Wolverine we see the superheroes beset by everyday problems. They are aging, ailing and struggling to survive financially. A decrepit Logan is forced to ask himself if he can or even wants to put his remaining powers to good use. It would appear that in the near-future, the times in which they were able put the world to rights with razor sharp claws and telepathic powers are now over.",
                'is_premiere' => 0,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 3,
                'name' => 'Wonder Woman',
                'duration' => 141,
                'directors' => 'Patty Jenkins',
                'stars' => 'Gal Gadot, Chris Pine, Robin Wright',
                'img_name' => 'wonderWoman.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi1553381657',
                'storyline' => "Diana, princess of the Amazons, trained to be an unconquerable warrior. Raised on a sheltered island paradise, when a pilot crashes on their shores and tells of a massive conflict raging in the outside world, Diana leaves her home, convinced she can stop the threat. Fighting alongside man in a war to end all wars, Diana will discover her full powers and her true destiny.",
                'is_premiere' => 0,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 3,
                'name' => 'Thor: Ragnarok',
                'duration' => 130,
                'directors' => 'Taika Waititi',
                'stars' => 'Chris Hemsworth, Tom Hiddleston, Cate Blanchett',
                'img_name' => 'thor.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi4010391833',
                'storyline' => "Thor is imprisoned on the other side of the universe and finds himself in a race against time to get back to Asgard to stop Ragnarok, the destruction of his homeworld and the end of Asgardian civilization, at the hands of an all-powerful new threat, the ruthless Hela.",
                'is_premiere' => 1,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 3,
                'name' => 'Murder on the Orient Express',
                'duration' => 116,
                'directors' => 'Kenneth Branagh',
                'stars' => 'Kenneth Branagh, Penélope Cruz, Willem Dafoe',
                'img_name' => 'murderOrient.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi612153625',
                'storyline' => "A lavish train ride unfolds into a stylish & suspenseful mystery. From the novel by Agatha Christie, Murder on the Orient Express tells of thirteen stranded strangers & one man's race to solve the puzzle before the murderer strikes again.",
                'is_premiere' => 1,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 4,
                'name' => 'It',
                'duration' => 135,
                'directors' => 'Andy Muschietti',
                'stars' => 'Bill Skarsgård, Jaeden Lieberher, Finn Wolfhard',
                'img_name' => 'it.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi1396095257',
                'storyline' => "In the Town of Derry, the local kids are disappearing one by one, leaving behind bloody remains. In a place known as 'The Barrens', a group of seven kids are united by their horrifying and strange encounters with an evil clown and their determination to kill It.",
                'is_premiere' => 0,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 4,
                'name' => 'Blade Runner 2049',
                'duration' => 164,
                'directors' => 'Denis Villeneuve',
                'stars' => 'Harrison Ford, Ryan Gosling, Ana de Armas',
                'img_name' => 'bladeRunner.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi3362371865',
                'storyline' => "Thirty years after the events of the first film, a new blade runner, LAPD Officer K (Ryan Gosling), unearths a long-buried secret that has the potential to plunge what's left of society into chaos. K's discovery leads him on a quest to find Rick Deckard (Harrison Ford), a former LAPD blade runner who has been missing for 30 years.",
                'is_premiere' => 0,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 3,
                'name' => 'Spider-Man: Homecoming',
                'duration' => 133,
                'directors' => 'Jon Watts',
                'stars' => 'Tom Holland, Michael Keaton, Robert Downey Jr.',
                'img_name' => 'spiderman.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi4175083801',
                'storyline' => "Thrilled by his experience with the Avengers, Peter returns home, where he lives with his Aunt May, under the watchful eye of his new mentor Tony Stark, Peter tries to fall back into his normal daily routine - distracted by thoughts of proving himself to be more than just your friendly neighborhood Spider-Man - but when the Vulture emerges as a new villain, everything that Peter holds most important will be threatened.",
                'is_premiere' => 0,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 3,
                'name' => 'Dunkirk',
                'duration' => 106,
                'directors' => 'Christopher Nolan',
                'stars' => 'Fionn Whitehead, Barry Keoghan, Mark Rylance',
                'img_name' => 'dunkirk.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi3402283289',
                'storyline' => "Evacuation of Allied soldiers from Belgium, the British Empire, and France, who were cut off and surrounded by the German army from the beaches and harbor of Dunkirk, France, between May 26- June 04, 1940, during Battle of France in World War II.",
                'is_premiere' => 0,
                'is_active' => 1
            ],
            [
                'movie_category_id' => 3,
                'name' => 'Guardians of the Galaxy Vol. 2',
                'duration' => 136,
                'directors' => 'James Gunn',
                'stars' => 'Chris Pratt, Zoe Saldana, Dave Bautista',
                'img_name' => 'guardiansGalaxy.jpg',
                'trailer_url' => 'http://www.imdb.com/videoembed/vi3076896281',
                'storyline' => "After saving Xandar from Ronan's wrath, the Guardians are now recognized as heroes. Now the team must help their leader Star Lord (Chris Pratt) uncover the truth behind his true heritage. Along the way, old foes turn to allies and betrayal is blooming. And the Guardians find that they are up against a devastating new menace who is out to rule the galaxy.",
                'is_premiere' => 0,
                'is_active' => 1
            ]
        ];

        DB::table('movies')->insert($movies);


        // Screen creations
        $screens = [
            [
                'cinema_id' => 1,
                'number' => 1
            ],
            [
                'cinema_id' => 1,
                'number' => 2
            ],
            [
                'cinema_id' => 1,
                'number' => 3
            ],
            [
                'cinema_id' => 2,
                'number' => 1
            ],
            [
                'cinema_id' => 2,
                'number' => 2
            ],
            [
                'cinema_id' => 2,
                'number' => 3
            ],
            [
                'cinema_id' => 3,
                'number' => 1
            ],
            [
                'cinema_id' => 3,
                'number' => 2
            ],
            [
                'cinema_id' => 3,
                'number' => 3
            ]
        ];

        DB::table('screens')->insert($screens);

        /* Creation of all Cinema Functions */
        $cinema_funcs = [

            /* Monday Nov 13, 2017*/

            /* Functions for CNM Valle Oriente */
            /* Screen 1 */
            [
                'movie_id' => 1,
                'screen_id' => 1,
                'duration' => 180, // This would have to change dinamically according to movie duration
                'starting_hour' => Carbon::create(2017, 11, 13,
                    14, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 1,
                'screen_id' => 1,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    17, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 1,
                'screen_id' => 1,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    20, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Screen 2 */
            [
                'movie_id' => 2,
                'screen_id' => 2,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    14, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 2,
                'screen_id' => 2,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    17, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 2,
                'screen_id' => 2,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    20, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Screen 3 */
            [
                'movie_id' => 3,
                'screen_id' => 3,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    15, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 3,
                'screen_id' => 3,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    18, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 3,
                'screen_id' => 3,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    21, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Functions for CNM Nuevo Sur */
            /* Screen 1 */
            [
                'movie_id' => 4,
                'screen_id' => 4,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    15, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 4,
                'screen_id' => 4,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    18, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 4,
                'screen_id' => 4,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    21, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Screen 2 */
            [
                'movie_id' => 1,
                'screen_id' => 5,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    14, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 1,
                'screen_id' => 5,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    17, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 1,
                'screen_id' => 5,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    20, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Screen 3 */
            [
                'movie_id' => 6,
                'screen_id' => 6,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    16, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 6,
                'screen_id' => 6,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    19, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 6,
                'screen_id' => 6,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    22, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Functions for CNM Esfera */
            /* Screen 1 */
            [
                'movie_id' => 1,
                'screen_id' => 7,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    14, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 1,
                'screen_id' => 7,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    17, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 1,
                'screen_id' => 7,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    20, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Screen 2 */
            [
                'movie_id' => 4,
                'screen_id' => 8,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    15, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 4,
                'screen_id' => 8,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    18, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 4,
                'screen_id' => 8,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    21, 0, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            /* Screen 3 */
            [
                'movie_id' => 5,
                'screen_id' => 9,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    15, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 5,
                'screen_id' => 9,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    18, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ],
            [
                'movie_id' => 5,
                'screen_id' => 9,
                'duration' => 180,
                'starting_hour' => Carbon::create(2017, 11, 13,
                    21, 30, 0, 'America/Monterrey'),
                'price' => 50,
                'is_active' => 1
            ]
        ];

        DB::table('cinema_functions')->insert($cinema_funcs);

        /* Creation of Seats */
        $screens = Screen::all();

        foreach ($screens as $screen){
            for($seat_letter = 'A'; $seat_letter <= 'J'; $seat_letter++){
                for ($seat_number = 1; $seat_number <= 12; $seat_number++){
                    DB::table('seats')->insert([
                        'screen_id' => $screen->screen_id,
                        'number' => $seat_letter . $seat_number
                    ]);
                }
            }
        }

        /* Creation of some tickets */

        DB::table('tickets')->insert([
           'user_id' => 6,
            'cinema_function_id' => 1,
            'seat_id' => 1,
            'subtotal' => 50,
            'total' => 50,
            'created_at' => Carbon::now()
        ]);


    }
}
