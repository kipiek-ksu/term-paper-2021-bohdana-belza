program D_8_3;
var i,n: longint;

function kol(n: integer): integer;
begin
 if n div 10<>0 then
  kol:=1+kol(n div 10) 
end;

begin
read(n);
write(kol(n)+1);
end.
