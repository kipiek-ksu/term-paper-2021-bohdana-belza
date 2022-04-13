program p5;

var
  a: array[1..100, 1..100] of real;
  n, i, j: integer;

begin
  read(n);
  for i := 1 to n do
  begin
    for j := 1 to n do
    begin
      if i < j then
        a[i, j] := Sin(i + j);
      if i = j then
        a[i, j] := 1
      else
        a[i, j] := Sin((i + j) / (2 * i + 3 * j));
      write(a[i, j]:4:2, ' ');
    end;
    writeln;
  end;
end.