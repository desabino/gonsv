# -------------- Variables
case $operatingsystem {
    centos: {
        $apache     = "httpd"
        $configdir  = "/etc/httpd/conf.d"
        $configfile = "/etc/httpd/conf.d/vhost.conf"
    }
    ubuntu: {
        $apache     = "apache2"
        $configdir  = "/etc/apache2/sites-enabled"
        $configfile = "/etc/apache2/sites-enabled/000-default"
    }
}