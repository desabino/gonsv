# -------------- Apache
    
    class {'apache':
        default_mods  => true,
        default_vhost => false,
        mpm_module    => 'prefork',
    }
    
    include apache::mod::headers
    apache::mod {'php5':}
    apache::mod {'rewrite':}
    
    # vhosts
    apache::vhost {'gonsv':
        priority    => '01',
        port        => '80',
        docroot     => '/vagrant/src/Gonsv/public',
        #directories => {
        #    path    => '/vagrant/src/Gonsv/public',
        #    headers => 'Set Access-Control-Allow-Origin "*"',
        #},
        override    => 'All',
        setenv      => ['APPLICATION_ENV development'],
    }
    apache::vhost {'static':
        priority   => '02',
        port       => '81',
        override   => 'All',
        docroot    => '/vagrant/src/Static',
        directories => {
            path    => '/vagrant/src/Static',
            headers => 'Set Access-Control-Allow-Origin "*"',
        },
    }
    apache::vhost {'test':
        priority   => '03',
        port       => '82',
        override   => 'All',
        docroot    => '/vagrant/src/Test',
        #directories => {
        #    path    => '/vagrant/src/Test',
        #    headers => 'Set Access-Control-Allow-Origin "*"',
        #},
    }