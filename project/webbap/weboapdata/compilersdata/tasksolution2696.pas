program n2;
var a, b, l:integer; d, s:real;
begin
readln(a, b, l);
d:=(l*3.14)/180;
s:=(a*b*sin(d))/2;
write(s:3:2);
end.