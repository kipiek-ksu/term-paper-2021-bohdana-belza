program T.2_z.47;
var a,n,b:integer;
      d1,d2:real;
begin
read (a,n,b);
d1:=-b+sqrt(sqr(b*n)+4*b*a*n))/(-2*b);
d2:=d1-n;
write(d1,d2);
end.