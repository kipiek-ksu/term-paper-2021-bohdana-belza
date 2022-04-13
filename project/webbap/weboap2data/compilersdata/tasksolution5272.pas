program z11;
var a,r1:integer;r2:real;
begin
readln(a);
R1:=a div 1000 +(a div 100 - (a div 1000)*10);
r2:=a mod 10 +(a mod 100 - a mod 10)/10;
writeln(r1,r2:0:0);
end.