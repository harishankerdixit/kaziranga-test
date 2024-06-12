<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config
set('repository', 'git@gitlab.junglesafariindia.in:abhishek.sinha/jawai.git');

add('shared_files', ['.env','public/.htaccess','public/blog/.htaccess','public/blog/wp-config.php','public/sitemap.xml','public/robots.txt']);
add('shared_dirs', ['storage','public/blog/wp-content/plugins','public/blog/wp-content/uploads']);
add('writable_dirs', ['storage','public/blog/wp-content/plugins','public/blog/wp-content/uploads']);

// Hosts
host('production')
    ->set('hostname', '65.1.86.94')
    ->set('remote_user', 'ubuntu')
    ->set('deploy_path', '/var/www/html/jawai')
    ->set('identity_file', '~/.ssh/id_ed25519');

// Hooks
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
   # 'artisan:migrate',
    'npm:install',
    'npm:run:prod',
    'npm:run:build:css',
    'deploy:publish',
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

after('deploy:failed', 'deploy:unlock');

