program z1;
var a,w,i,j,m:longint;
function per(i:integer):integer;
var b:integer;
begin
b:=1;
if i=0 then b:=1
else begin
for j:=1 to i do begin
b:=b*2;
end;
end;
per:=b;
end;
begin
read(w);
i:=0;
while w>0 do begin
a:=w mod 10;
w:=w div 10;
m:=m+a*per(i);
i:=i+1;
end;
write(m);
end.