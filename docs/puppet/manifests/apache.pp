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
        priority   => '01',
        port       => '80',
        docroot    => '/vagrant/src/Gonsv/public',
        #headers    => 'set Access-Control-Allow-Origin "*"',
        override   => 'All',
        setenv     => ['APPLICATION_ENV development'],
    }
    apache::vhost {'static':
        priority   => '02',
        port       => '81',
        override   => 'All',
        docroot    => '/vagrant/src/Static',
    }
    apache::vhost {'test':
        priority   => '03',
        port       => '82',
        override   => 'All',
        docroot    => '/vagrant/src/Test',
    }