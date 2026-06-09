<?php
$db=new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$stmt=$db->query("PRAGMA table_info('users')");
$cols=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($cols as $c) echo $c['name']."\n";
