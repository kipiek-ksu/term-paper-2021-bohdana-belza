program lab_2_61;
var a,b,c,abc,bac,ab: integer;
begin
read (abc);
c:=abc mod 10;
ab:=abc div 10;
b:=ab mod 10;
a:=ab div 10;
bac:=b*100+a*10+c;
write (bac);
end.
