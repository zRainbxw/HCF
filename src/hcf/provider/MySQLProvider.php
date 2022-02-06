<?php

namespace CBTeam\Ranks\provider;

use CBTeam\Ranks\Cerberus;
use mysqli;

class MySQLProvider {
  
  protected $plugin;
  
  protected static $db = null;
  
  public function __construct(Cerberus $plugin){
    $this->plugin = $plugin;
  }
  public static function init(): void {
    $db = new mysqli("IPHOST","NAME","contraseña","s5387_NAME");
    $db->query("CREATE TABLE IF NOT EXISTS player(playerName TEXT PRIMARY KEY, rank TEXT)");
    self::$db = $db;
  }
  public function get(): mysqli {
    return self::$db;
  }
}
