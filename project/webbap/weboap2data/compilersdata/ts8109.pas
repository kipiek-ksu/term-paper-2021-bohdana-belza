program b1;
var a,b,l:integer;
s:real;
begin
read(a);
read(b);
read(l);
s:=(a*b*sin(l*3.14)/180))/2;
write(s:3:2);
end.