function vun(a,b:real): real;
begin
vun:=Sqrt(Sqrt(a)+Sqrt(b));
end;
var a,b:real;
begin
read(a,b);
write(vun(a,b):2:3);
end.