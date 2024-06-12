<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php'; // Ensure you have this file, or adjust/remove if not necessary

// Project name
set('application', 'jawai');

// Project repository
set('repository', 'git@gitlab.com:username/repository.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts
host('65.1.86.94')
    ->set('deploy_path', '/var/www/html/jawai')
    ->set('user', 'ubuntu')
    ->set('identity_file', '~/.ssh/id_rsa');

// Tasks
task('build', function () {
    run('cd {{release_path}} && npm install && npm run prod');
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');
