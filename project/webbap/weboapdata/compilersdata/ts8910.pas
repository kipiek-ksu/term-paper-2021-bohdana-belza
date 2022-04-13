program z1;
var a,b,h,x,y,c,d,q:real;
begin
readln(a,b,c,d,h);
x:=a;
q:=c;
while (x<b)and(q<d) do begin
y:=cos(x+y);
x:=x+h;
q:=q+h;
writeln(y:1:4);
end;
end