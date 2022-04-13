program L_6_4;
var n, i, j : integer;
    a : array[1..100, 1..100] of real;
begin
  read(n);
  for i := 1 to n do
    for j := 1 to n do a[i, j] := 1 / (i + j);
  for i := 1 to n do
    begin
      for j := 1 to n do write(a[i, j]:0:2, );
      writeln;
  end;
end.