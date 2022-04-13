program tema2_15;
var a,s:integer;
procedure oct(a:integer;var s:integer);
var d:array[1..40] of integer;
    i,n,z,x:integer;
begin
z:=a;
i:=1;
while z>8 do begin
d[i]:=z mod 8;
z:=z div 8;
i:=i+1;
end;
d[i]:=z;
n:=i;
x:=1;
for i:=1 to n-1 do
x:=x*10;
s:=0;
for i:=n downto 1 do begin
s:=s+d[i]*x;
x:=x div 10;
end;
end;
begin
read(a);
oct(a,s);
write(s);
end.