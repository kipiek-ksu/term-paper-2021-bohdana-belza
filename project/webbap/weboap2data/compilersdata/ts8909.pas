program z1;
var a,b,c,n,d:longint;
f:boolean;
begin
readln(a,b);
c:=a;
d:=b;
while a<>b do begin
if a>b then a:=a-b
else b:=b-a;
end;
n:=(c div a)*d;
write(n);
end