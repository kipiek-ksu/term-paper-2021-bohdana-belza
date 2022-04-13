program A1;
const f=17.142;
var a,c,p,r,s : real;
begin
read (a);
c:= sqrt(2*sqr(a) - 2*a*a*cos(f));
p:=((2*a+c)/2);
s:= sqrt((p-a)*(p-a)*(p-c)*p);
r:=(s/p);
write (r:10:3);
end.