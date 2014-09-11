class mysql {
  include '::mysql::server'
  
  mysql::db { 'sabino_dev_gonsv':
    user     => 'sabino_dev',
    password => '12devssw34',
    host     => 'localhost',
    sql      => '/vagrant/data/sabino_dev_gonsv.sql',
    grant    => ['ALL'],
  }
}