program z1;
var d,i,z,l,s,n,m,mina,minb,p,v,k:integer;
function min(k:integer):integer;
begin
readln(d);
z:=d;
for i:=1 to k-1 do
begin
readln(d);
if z>d then z:=d
end;
min:=z;
end;
begin
readln(n,m);
mina:=min(n);
minb:=min(m);
readln(v);
z:=v;
p:=v;
for i:=1 to 14 do
begin
readln(v);
if z<v then z:=v;
if p>v then p:=v
end;
if abs(mina)>10 then
l:= minb + p
else
l:= 1+ sqr(z);
writeln(l);
end.