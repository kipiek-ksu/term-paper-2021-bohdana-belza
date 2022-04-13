var a,b,h,k:real;
begin
readln(a);
readln(b);
readln(h);
repeat
k:=exp(ln(a*a+3)*1/2);
writeln(k:5:4);
a:=a+h;
until a>b;
end.