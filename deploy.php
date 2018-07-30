<?php
namespace Deployer;
require __DIR__ . '/vendor/deployer/deployer/recipe/common.php';

host('35.178.132.212')
  ->port(22)
  ->user('ubuntu')
  ->stage('production')
  ->set('deploy_path', '/var/www/html/dt100g')
  ->set('branch', 'master')
  ->identityFile('~/.ssh/ec2inst.pem');


set('repository', 'git@github.com:linsjb/DT100G-project.git');
set('shared_files', ['config.php']);


desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
