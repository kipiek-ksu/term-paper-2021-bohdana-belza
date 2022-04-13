program L1_39;

var n:real; c,d:integer;

begin

   readln(n);

  d:=(100*n) mod 100;

  c:=(100*n) div 100;

    writeln(c,d);

end.