program zadacha19;
var a,b,r1,r2,r3,r4: integer;
begin
readln(a);
r1:= a mod 10;
r2:= (a div 10) mod 10;
r3:= (a div 100) mod 10;
r4:= (a div 1000) mod 10;
r5:= a div 1000;
b:=((((r3*10)+r2)*10)+r1)*10+r4;
write(b);
end.