<?hh

class C<reify Ta> {}

$c = new C<reify (int, string)>();

// just wildcard
var_dump($c is C<_>);

// tuple with wildcard
var_dump($c is C<(int, string)>);
var_dump($c is C<(int, _)>);
var_dump($c is C<(_, string)>);
var_dump($c is C<(_, _)>);
var_dump($c is C<(_, int)>);
