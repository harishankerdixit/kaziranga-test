<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'git@gitlab.junglesafariindia.in:abhishek.sinha/jawai.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);


host('production')
    ->set('hostname', '65.1.86.94')
    ->set('remote_user', 'ubuntu')
    ->set('deploy_path', '/var/www/jawai')
    ->set('identity_file', '~/.ssh/id_ed25519');


task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'npm:install',
    'npm:run:prod',
    'npm:run:build:css',
    'deploy:symlink', 
]);


task('npm:install', function () {
    cd('{{release_or_current_path}}');
    run('npm install');
});

task('npm:run:prod', function () {
    cd('{{release_or_current_path}}');
    run('npm run build');
});

task('npm:run:build:css', function () {
    cd('{{release_or_current_path}}');
    run('npm run build');
});


task('deploy:symlink', function () {
    run('cd {{deploy_path}} && ln -sfn {{release_path}} current');
});

after('deploy:failed', 'deploy:unlock');


