program Lab_rec_10;
var n:integer;
function kol(n:integer):byte;
begin
if (n<10) then kol:=1
else kol:=kol(not(odd(n div 10))+1
end;
begin
read(n);
write(kol(n));
end.