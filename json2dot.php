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
      $pName = empty($parentName) ? $index : "{$parentName}.{$index}";
      $tmp = $rev($pName, $line);
      if(!empty($tmp)) $list[] = $tmp;
    }
  }
  else
  {
    return $parentName. " = ". $node;
  }
};

$rev(null, $json);

// 出力
foreach($list as $line)
{
  echo $line."\n";
}
