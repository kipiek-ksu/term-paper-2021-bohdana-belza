program z1;
var a1,a2,b1,b2,c1,c2:integer; x,y:real;
begin
readln(a1,b1,c1,a2,b2,c2);
begin
if (a1/a2<>b1/b2) then begin
y:= c2/(b2+a2*(c1-b1)/a1);
x:=(c1-b1*y)/a1;
writeln (x:2:2,' ',y:2:2);
end
else writeln('no');
end.