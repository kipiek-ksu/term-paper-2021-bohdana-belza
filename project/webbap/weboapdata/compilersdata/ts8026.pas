program lab;
var a,b,c,d,h,k:real;
begin
read(a);
read(b);
read(c);
read(d);
read(h);
repeat
k:=ln(a+sqrt(a+b));
write(k:5:4);
a:=a+h;
b:=b+h;
until a>b;
end.
