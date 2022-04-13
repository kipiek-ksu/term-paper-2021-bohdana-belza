program l4;
var t,d,a,b,c:real;
begin
read(a,b);
d:=sqr((b-a)/6)+4*b*(b-a)/18;
t:=(sqrt(d)-((b-a)/16)/(2*(b-a));
c:=a*t/(t-1/16);
write(c);
end.