<?php

$jsonFileName = $argv[1];
$txt = file_get_contents($jsonFileName);
$json = json_decode($txt, true);

$list = [];
$rev = function ($parentName, &$node) use (&$rev, &$list)
{
  if(is_array($node))
  {
    foreach($node as $index => $line)
    {
      $tmp = $rev("{$parentName}.{$index}", $line);
      if(!empty($tmp)) $list[] = $tmp;
    }
  }
  else
  {
    return $parentName. " = ". $node;
  }
};

foreach($json as $index => $line)
{
  $rev($index, $line);
}

// Output
foreach($list as $line)
{
  echo $line."\n";
}
