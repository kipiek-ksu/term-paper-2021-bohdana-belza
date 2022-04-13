program p8;
var a,b:integer;
begin
read(a);
b:=((a div 10) mod 10)*100+(a div 10)*10+(a div 10) div 10);
write(b);
end.