<?php

namespace App\Console\Commands;

use App\Models\CentralUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use TCG\Voyager\Facades\Voyager;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rimplenet:make-admin {email} {--create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin User';

    /**
     * Get command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['email', InputOption::VALUE_REQUIRED, 'The email of the user.', null],
        ];
    }

    /**
     * Get user options.
     */
    protected function getOptions()
    {
        return [
            ['create', null, InputOption::VALUE_NONE, 'Create an admin user', null],
        ];
    }

    /**
     * Get the administrator role, create it if it does not exists.
     *
     * @return mixed
     */
    protected function getAdministratorRole()
    {
        $role = Voyager::model('Role')->firstOrNew([
            'name' => 'admin',
        ]);

        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Administrator',
            ])->save();
        }

        return $role;
    }

    /**
     * Get or create user.
     *
     * @param bool $create
     *
     * @return \App\User
     */
    protected function getUser($create = false)
    {
        $email = $this->argument('email');

        $model = CentralUser::class;
        $model = Str::start($model, '\\');

        // If we need to create a new user go ahead and create it
        if ($create) {
            $name = $this->ask('Enter the admin name');
            $password = $this->secret('Enter admin password');
            $confirmPassword = $this->secret('Confirm Password');

            // Ask for email if there wasnt set one
            if (!$email) {
                $email = $this->ask('Enter the admin email');
            }

            // check if user with given email exists

            if ($model::where('email', $email)->exists()) {
                $this->info("Can't create user. User with the email ".$email.' exists already.');

                return;
            }

            // Passwords don't match
            if ($password != $confirmPassword) {
                $this->info("Passwords don't match");

                return;
            }

            $this->info('Creating admin account');

            return call_user_func($model.'::forceCreate', [
                'name'     => $name,
                'email'    => $email,
                'password' => Hash::make($password),
            ]);
        }

        return call_user_func($model.'::where', 'email', $email)->firstOrFail();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        // Get or create user
        $user = $this->getUser(
            $this->option('create')
        );

        // the user not returned
        if (!$user) {
            exit;
        }

        // Get or create role
        $role = $this->getAdministratorRole();

        // Get all permissions
        $permissions = Voyager::model('Permission')->all();

        // Assign all permissions to the admin role
        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        // Ensure that the user is admin
        $user->role_id = $role->id;
        $user->save();

        $this->info('The user now has full access to your site.');
    }
}
