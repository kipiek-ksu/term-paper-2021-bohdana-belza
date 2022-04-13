program A;
var n,d:real;  c:integer;
begin
read (n);
c:=trunc(n);
d:=frac(n);
Write (c:2:0,' ',d:0:2);
end.