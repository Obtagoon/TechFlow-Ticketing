<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Studio;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin TechFlow',
            'email' => 'admin@techflow.com',
            'phone' => '08123456789',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Create Demo User
        User::create([
            'name' => 'Demo User',
            'email' => 'user@techflow.com',
            'phone' => '08987654321',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        // Create Sample Movies 
        $movies = [
            [
                'title' => 'Zootopia 2',
                'synopsis' => 'Setelah berhasil menyelesaikan kasus terbesar dalam sejarah Zootopia, dua polisi pemula Judy Hopps dan Nick Wilde menyadari bahwa kemitraan mereka tidak sekuat yang mereka kira ketika Kepala Bogo memerintahkan mereka untuk mengikuti program konseling "Partners in Crisis". Namun, tidak lama kemudian, kemitraan mereka diuji hingga batasnya ketika mereka terjebak dalam jejak misterius yang terkait dengan kedatangan ular berbisa di kota metropolis hewan tersebut.',
                'poster' => 'https://image.tmdb.org/t/p/w500/nT1tuba9NBCzraZRwTvFpoSJZk.jpg',
                'backdrop' => 'https://image.tmdb.org/t/p/w1280/5h2EsPKNDdB3MAtOk9MB9Ycg9Rz.jpg',
                'duration' => 96,
                'rating' => 8.0,
                'genre' => 'Animation, Comedy, Adventure, Family, Mystery',
                'release_date' => '2025-11-26',
                'status' => 'now_playing',
            ],
            [
                'title' => 'Avatar: Fire and Ash',
                'synopsis' => 'Setelah perang dahsyat melawan RDA dan kehilangan putra sulung mereka, Jake Sully dan Neytiri menghadapi ancaman baru di Pandora: Ash People, suku Na\'vi yang kejam dan haus kekuasaan yang dipimpin oleh Varang yang bengis. Keluarga Jake harus berjuang untuk kelangsungan hidup mereka dan masa depan Pandora dalam konflik yang mendorong mereka ke batas emosional dan fisik.',
                'poster' => 'https://image.tmdb.org/t/p/w500/gDVgC9jd917NdAcqBdRRDUYi4Tq.jpg',
                'backdrop' => 'https://image.tmdb.org/t/p/w1280/iN41Ccw4DctL8npfmYg1j5Tr1eb.jpg',
                'duration' => 180,
                'rating' => 8.5,
                'genre' => 'Science Fiction, Adventure, Fantasy',
                'release_date' => '2025-12-17',
                'status' => 'now_playing',
            ],
            [
                'title' => 'Five Nights at Freddy\'s 2',
                'synopsis' => 'Satu tahun sejak mimpi buruk supernatural di Freddy Fazbear\'s Pizza, kisah tentang apa yang terjadi di sana telah diubah menjadi legenda lokal yang murahan, menginspirasi Fazfest pertama kota. Dengan kebenaran yang disembunyikan darinya, Abby menyelinap keluar untuk bertemu kembali dengan Freddy, Bonnie, Chica, dan Foxy, memicu serangkaian peristiwa mengerikan yang akan mengungkap rahasia gelap tentang asal-usul Freddy\'s yang sebenarnya.',
                'poster' => 'https://image.tmdb.org/t/p/w500/udAxQEORq2I5wxI97N2TEqdhzBE.jpg',
                'backdrop' => 'https://image.tmdb.org/t/p/w1280/54BOXpX2ieTXMDzHymdDMnUIzYG.jpg',
                'duration' => 110,
                'rating' => 7.5,
                'genre' => 'Horror, Thriller',
                'release_date' => '2025-12-03',
                'status' => 'now_playing',
            ],
            [
                'title' => 'Wicked: For Good',
                'synopsis' => 'Berlatar di Negeri Oz, persahabatan Elphaba dan Glinda diuji saat mereka menerima identitas baru mereka masing-masing sebagai Penyihir Jahat dari Barat dan Glinda Penyihir Baik dari Utara, dan bagaimana konsekuensi dari tindakan mereka akan mengubah seluruh negeri Oz selamanya.',
                'poster' => 'https://image.tmdb.org/t/p/w500/si9tolnefLSUKaqQEGz1bWArOaL.jpg',
                'backdrop' => 'https://image.tmdb.org/t/p/w1280/l8pwO23MCvqYumzozpxynCNfck1.jpg',
                'duration' => 160,
                'rating' => 8.3,
                'genre' => 'Drama, Fantasy, Romance, Musical',
                'release_date' => '2025-11-19',
                'status' => 'now_playing',
            ],
            [
                'title' => 'Now You See Me: Now You Don\'t',
                'synopsis' => 'The Four Horsemen asli bersatu kembali dengan generasi baru ilusionis untuk menghadapi pewaris berlian yang berkuasa Veronika Vanderberg, yang memimpin kerajaan kriminal yang dibangun di atas pencucian uang dan perdagangan manusia. Para pesulap baru dan lama harus mengatasi perbedaan mereka untuk bekerja sama dalam pencurian paling ambisius mereka.',
                'poster' => 'https://image.tmdb.org/t/p/w500/oD3Eey4e4Z259XLm3eD3WGcoJAh.jpg',
                'backdrop' => 'https://image.tmdb.org/t/p/w1280/ufqytAlziHq5pljKByGJ8IKhtEZ.jpg',
                'duration' => 115,
                'rating' => 7.5,
                'genre' => 'Action, Crime, Thriller',
                'release_date' => '2025-11-12',
                'status' => 'now_playing',
            ],
            [
                'title' => 'The SpongeBob Movie: Search for SquarePants',
                'synopsis' => 'SpongeBob dan Patrick melakukan perjalanan epik melintasi lautan untuk menemukan celana kotak ikonik SpongeBob yang hilang secara misterius, dalam petualangan yang akan membawa mereka ke tempat-tempat yang belum pernah mereka bayangkan.',
                'poster' => 'https://image.tmdb.org/t/p/w500/jxJ9FMREmSOSqz45viIjYkP7eFE.jpg',
                'backdrop' => 'https://image.tmdb.org/t/p/w1280/dBndtFHMqEuSjeRSmhyofmY8lbw.jpg',
                'duration' => 95,
                'rating' => 7.8,
                'genre' => 'Animation, Comedy, Adventure, Family',
                'release_date' => '2025-12-24',
                'status' => 'coming_soon',
            ],
            [
                'title' => 'JUJUTSU KAISEN: Execution',
                'synopsis' => 'Film yang merangkum Insiden Shibuya dan awal Culling Game dalam anime Jujutsu Kaisen. Yuji Itadori dan rekan-rekannya menghadapi pertempuran paling berbahaya melawan kutukan terkuat.',
                'poster' => 'https://image.tmdb.org/t/p/w500/tc7RrVW5FGvyO2tsgW6LIN1esHI.jpg',
                'backdrop' => 'https://image.tmdb.org/t/p/w1280/eMBYlgFTHfZaTz96eJxlkeMsKo9.jpg',
                'duration' => 130,
                'rating' => 8.5,
                'genre' => 'Animation, Action, Fantasy',
                'release_date' => '2025-12-03',
                'status' => 'now_playing',
            ],
        ];

        foreach ($movies as $movieData) {
            Movie::create($movieData);
        }

        // Create Cinemas
        $cinemas = [
            [
                'name' => 'TechFlow Cinema Grand Indonesia',
                'address' => 'Grand Indonesia Mall Lt. 8',
                'city' => 'Jakarta',
                'phone' => '021-1234567',
            ],
            [
                'name' => 'TechFlow Cinema Pondok Indah',
                'address' => 'Pondok Indah Mall 2 Lt. 3',
                'city' => 'Jakarta',
                'phone' => '021-7654321',
            ],
            [
                'name' => 'TechFlow Cinema Bandung',
                'address' => 'Paris Van Java Mall Lt. 4',
                'city' => 'Bandung',
                'phone' => '022-8765432',
            ],
        ];

        foreach ($cinemas as $cinemaData) {
            $cinema = Cinema::create($cinemaData);

            // Create Studios for each cinema
            $studioTypes = ['regular', 'imax', 'premiere'];
            foreach ($studioTypes as $index => $type) {
                $studio = Studio::create([
                    'cinema_id' => $cinema->id,
                    'name' => 'Studio ' . ($index + 1),
                    'type' => $type,
                    'rows' => $type === 'premiere' ? 6 : 10,
                    'seats_per_row' => $type === 'premiere' ? 8 : 12,
                    'capacity' => $type === 'premiere' ? 48 : 120,
                ]);

                // Generate seats
                $rowLabels = range('A', 'Z');
                for ($row = 0; $row < $studio->rows; $row++) {
                    for ($seat = 1; $seat <= $studio->seats_per_row; $seat++) {
                        Seat::create([
                            'studio_id' => $studio->id,
                            'row_label' => $rowLabels[$row],
                            'seat_number' => $seat,
                            'is_active' => true,
                        ]);
                    }
                }
            }
        }

        // Create Showtimes for next 7 days starting from today
        $movies = Movie::where('status', 'now_playing')->get();
        $studios = Studio::all();
        
        // Realistic cinema show times in WIB
        $times = ['10:00', '12:30', '15:00', '17:30', '20:00', '22:30'];
        
        $prices = [
            'regular' => 50000,
            'imax' => 100000,
            'premiere' => 150000,
            '4dx' => 120000,
        ];

        foreach ($movies as $movie) {
            foreach ($studios as $studio) {
                for ($day = 0; $day < 7; $day++) {
                    $date = now()->addDays($day)->format('Y-m-d');
                    
                    // For today, only add showtimes that haven't passed yet
                    $availableTimes = $times;
                    if ($day === 0) {
                        $currentHour = (int) now()->format('H');
                        $availableTimes = array_filter($times, function($time) use ($currentHour) {
                            return (int) substr($time, 0, 2) > $currentHour;
                        });
                    }
                    
                    // Random 3-4 showtimes per day per studio
                    $selectedTimes = array_slice($availableTimes, 0, rand(3, min(4, count($availableTimes))));
                    
                    foreach ($selectedTimes as $time) {
                        Showtime::create([
                            'movie_id' => $movie->id,
                            'studio_id' => $studio->id,
                            'show_date' => $date,
                            'show_time' => $time,
                            'price' => $prices[$studio->type] ?? 50000,
                            'is_active' => true,
                        ]);
                    }
                }
            }
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin: admin@techflow.com / password');
        $this->command->info('User: user@techflow.com / password');
    }
}
