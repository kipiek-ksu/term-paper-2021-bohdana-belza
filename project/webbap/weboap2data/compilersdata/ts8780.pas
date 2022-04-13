else begin
for l:=1 to n do
k:=k*10;
kol:=k;
end;
end;
begin
read(n);
k:=0;
m:=n;
while n div 10<>0 do
begin
n:=n div 10;
k:=k+1;
end;
for i:=1 to k+1 do
begin
a:=m div kol(i-1);
a:=a mod 10;
a:=a*kol(k-i+1);
s:=a+s;
end;
write(s);
end.