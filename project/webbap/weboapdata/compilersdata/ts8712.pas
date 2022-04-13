rogram tema2_3;
var n: integer;

function col(n: integer): integer;
begin
 if n mod 10 <> 0 then
  col:=1+col(n div 10);
end;

begin
 read(n);
 write(col(n));
end.