program p5;

var
  a: array[1..100, 1..100] of real;
  n, i, j, sum: integer;

begin
  read(n);
  sum := 0;
  for i := 1 to n do
  begin
    for j := 1 to n do
    begin
      a[i, j] := Sin(i + j / 2);
      if a[i, j] > 0 then
        Inc(sum);
    end;
  end;
  write(sum);
end.