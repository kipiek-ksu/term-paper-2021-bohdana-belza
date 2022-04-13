program fact;
var i,n:integer;
    k:extended;
begin
  repeat
  readln(n);
  until ( n>=3 ) and ( n < = 1 8 );
  k:=1;
  for i:=1 to n do
  k:=k*i;
  writeln(k:0:0);
end.