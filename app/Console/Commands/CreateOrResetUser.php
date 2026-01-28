<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateOrResetUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset {email} {--password=password} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Maak een nieuwe gebruiker aan of reset het wachtwoord van een bestaande gebruiker';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->option('password');
        $name = $this->option('name');

        $user = User::where('email', $email)->first();

        if ($user) {
            // Reset wachtwoord van bestaande gebruiker
            $user->password = Hash::make($password);
            $user->save();
            $this->info("Wachtwoord gereset voor gebruiker: {$email}");
            $this->info("Nieuw wachtwoord: {$password}");
        } else {
            // Maak nieuwe gebruiker aan
            if (!$name) {
                $name = $this->ask('Naam voor de nieuwe gebruiker', 'Test User');
            }
            
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]);
            
            $this->info("Nieuwe gebruiker aangemaakt: {$email}");
            $this->info("Wachtwoord: {$password}");
        }

        return Command::SUCCESS;
    }
}
