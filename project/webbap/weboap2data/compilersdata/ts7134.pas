program p2;
var i,n:integer; f1,f2,f3:integer;
begin
read(n);
f1:=1; f2:=1; write(f1,' ');
for i:=2 to n do
begin
write(f2);
f3:=f1+f2;
f1:=f2; f2:=f3;
end;end.