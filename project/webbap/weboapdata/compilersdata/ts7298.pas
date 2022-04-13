program L_1_1;
var abc,ab,a,b,c,s:integer;
begin
read(abc);
a:=abc div 100;
c:=abc mod 10;
ab:=abc div 10;
b:=ab mod 10;
s:=a+b+c;
write(s);
end.