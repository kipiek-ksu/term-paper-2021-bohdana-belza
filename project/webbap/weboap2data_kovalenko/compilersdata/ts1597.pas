program 41_7;
var a,b,c,d,h : real;

BEGIN
read(a,b,c,d,h);
while (a<=b) do
begin
while c<=d do
begin
writeln((1/(a+sqrt(c))):0:4);
c:=c+h;
end;
a:=a+h;
end;
END.