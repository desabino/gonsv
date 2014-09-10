class mysql {
  include '::mysql::server'
  
  mysql::db { 'dev_baseproject':
    user     => 'dev',
    password => '12dev34',
    host     => 'localhost',
    sql      => '/vagrant/data/dev_baseproject.sql',
    grant    => ['ALL'],
  }
}