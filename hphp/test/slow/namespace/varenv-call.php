<?php

namespace SomeNS;

function runExtract($args) {
  extract($args);
  var_dump($var1);
}

<<__EntryPoint>>
function main_varenv_call() {
runExtract(['var1' => 0, 'var2' => 1]);
}
