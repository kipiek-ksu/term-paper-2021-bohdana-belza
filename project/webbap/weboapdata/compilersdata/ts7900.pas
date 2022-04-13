program L_8_4;

var N : integer;

function m(N : integer) : integer;
begin
  if N = 0
    then m := 0
    else m := m(N div 10) + N mod 10;
end;

begin
  readln(N);
  write(m(n));
end.
