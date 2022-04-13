program s;
var a,r:integer;
begin
read (a);
r:=(a mod 10)*100+((a mod 100)div 10)*10+(a div 100);
write (r);
end.