<?php

use Illuminate\Database\Seeder;
use App\Movie;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Images extraction */
        // Create img directory if needed
        Storage::makeDirectory('public/img');

        // We clean our img directory if needed
        $files = Storage::allFiles('public/img');
        Storage::delete($files);

        $imgUrls = [
            'https://images-na.ssl-images-amazon.com/images/M/MV5BYjQ5NjM0Y2YtNjZkNC00ZDhkLWJjMWItN2QyNzFkMDE3ZjAxXkEyXkFqcGdeQXVyODIxMzk5NjA@._V1_SY1000_CR0,0,699,1000_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BMjQwODQwNTg4OV5BMl5BanBnXkFtZTgwMTk4MTAzMjI@._V1_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BNDFmZjgyMTEtYTk5MC00NmY0LWJhZjktOWY2MzI5YjkzODNlXkEyXkFqcGdeQXVyMDA4NzMyOA@@._V1_SY1000_SX675_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BMjMyNDkzMzI1OF5BMl5BanBnXkFtZTgwODcxODg5MjI@._V1_SY1000_CR0,0,674,1000_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BNGFmM2NmYjYtMjAwNy00ZDkzLWI3ZWMtOGZhOTRhYzQwMTA0XkEyXkFqcGdeQXVyNzU2MzMyNTI@._V1_SY1000_CR0,0,674,1000_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BZDVkZmI0YzAtNzdjYi00ZjhhLWE1ODEtMWMzMWMzNDA0NmQ4XkEyXkFqcGdeQXVyNzYzODM3Mzg@._V1_SY1000_CR0,0,666,1000_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BNzA1Njg4NzYxOV5BMl5BanBnXkFtZTgwODk5NjU3MzI@._V1_SY1000_CR0,0,674,1000_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BNTk4ODQ1MzgzNl5BMl5BanBnXkFtZTgwMTMyMzM4MTI@._V1_SY1000_CR0,0,658,1000_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BN2YyZjQ0NTEtNzU5MS00NGZkLTg0MTEtYzJmMWY3MWRhZjM2XkEyXkFqcGdeQXVyMDA4NzMyOA@@._V1_SY1000_CR0,0,674,1000_AL_.jpg',
            'https://images-na.ssl-images-amazon.com/images/M/MV5BMTg2MzI1MTg3OF5BMl5BanBnXkFtZTgwNTU3NDA2MTI@._V1_SY1000_CR0,0,674,1000_AL_.jpg'
        ];

        $movies = Movie::all();

        for ($i = 0, $size = count($imgUrls); $i < $size; $i++) {
            $rawImage = file_get_contents($imgUrls[$i]);
            if ($rawImage){
                Storage::put('public/img/' . $movies[$i]->img_name, $rawImage);
            }
            else {
                \Log::info("There was a problem while loading the image");
            }
        }

    }
}
