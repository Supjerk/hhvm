<?hh

function block() {
  return RescheduleWaitHandle::create(
    RescheduleWaitHandle::QUEUE_NO_PENDING_IO,
    1,
  );
}
async function ret() {
  return 0;
}

async function inFunc() {
  $x = async function($a) { static $x; return $a; };
  $y = async function($a) { await block(); return $a; };
  $xval = await $x(1);
  $yval = await $y(2);
  var_dump($xval);
  var_dump($yval);
}


class F {
  async function inMeth() {
    $x = async function($a) { return $a; };
    $y = async function($a) { await block(); return $a; };
    $xval = await $x(3);
    $yval = await $y(4);
    var_dump($xval);
    var_dump($yval);
  }
}

<<__EntryPoint>>
function main_closure() {
;

$global = async function () {
  $x = await ret();
  var_dump($x);
};

HH\Asio\join($global());
HH\Asio\join(inFunc());
HH\Asio\join(F::inMeth());
}
