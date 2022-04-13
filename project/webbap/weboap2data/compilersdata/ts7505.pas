program drob;
var a,b:integer;
procedure wow(a1,b1:integer);
var r:integer;
begin
r:=(2*a1+3*b1)-10;
write(r:10:3);
end;
begin
read(a,b);
wow(a,b);
end.
