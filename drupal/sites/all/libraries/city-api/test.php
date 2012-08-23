<?php
      require_once(dirname(__FILE__) . '/lib/ca-main.php');
      $ca = new CityApi();
      $results = $ca->groups_count();
      echo $results;
?>