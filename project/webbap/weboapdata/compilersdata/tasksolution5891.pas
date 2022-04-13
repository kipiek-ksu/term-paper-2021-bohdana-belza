program p10;
var ch,bin:integer;
procedure dec_to(x:integer;var z:integer);
var dec:integer;
begin
dec:=1;
  while x<>0 do
  begin
   z:=z+(x mod 2)*dec;
   x:=x div 2;
   dec:=dec*10;
  end;
end;
begin
  readln(ch);
  dec_to(ch,bin);
  write(bin);
end.