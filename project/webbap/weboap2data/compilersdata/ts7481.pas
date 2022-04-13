program p8;
var   v:array [1..100] of integer;
a,k,d,r,i,z,b:integer;
begin
read(a);
b:=a;
while b>0 do begin
b:=b div 10;
k:=k+1;
end;
for i:=1 to k do begin
v[i]:=a mod 10;
a:=a div 10;
end;
z:=v[1];
v[1]:=v[k];
v[k]:=z;
for i:=k downto 1 do
write(v[i]);
end.