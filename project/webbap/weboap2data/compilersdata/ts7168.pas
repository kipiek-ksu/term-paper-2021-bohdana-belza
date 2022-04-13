Program L_1_13;
var abc,a,b,c,R:integer;
begin
read(abc);
a:=abc div 100;
b:=(abc-a*100) div 10;
c:=abc mod 10;
R:= a+c;
write(b);
write(R);
end.