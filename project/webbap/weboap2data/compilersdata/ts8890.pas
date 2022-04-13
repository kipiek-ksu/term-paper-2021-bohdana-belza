program z16;
var a,b:real;
count:integer;
begin
read(a,b);
count:=0;
while a>b do
begin
a:=a-a/3;
count:=count+1;
end;
write(count);
end.