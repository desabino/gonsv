class php {
    php::ini {
        '/etc/php.ini':
            display_errors         => 'On',
            display_startup_errors => 'On',
            short_open_tag         => 'On',
            error_reporting        => 'E_ALL & ~E_DEPRECATED',
            memory_limit           => '256M',
            date_timezone          => 'America/Sao_Paulo',
            error_log              => '/vagrant/logs/php_error.log'
    }
    
    include php::cli
    include php::fpm::daemon
    
    php::fpm::conf { 'www':
        listen    => '127.0.0.1:8080',
        user      => 'vagrant',
        error_log => '/vagrant/logs/phpfpm_error.log',
        slowlog   => '/vagrant/logs/phpfpm_slowlog.log',
    }
    
    php::module { [ 'xml', 'pear', 'devel', 'mbstring', 'mysql', 'curl', 'gd', 'mcrypt']: }
}