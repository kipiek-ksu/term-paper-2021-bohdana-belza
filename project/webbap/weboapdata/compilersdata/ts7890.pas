program l11;
var a: array [1..25,1..9] of integer;
j,i,n:integer;
Rez:real;
begin
read(n);
for i:=1 to n do begin
for j:=1 to 9 do read(a[i,j]);
end;
for j:=1 to 9 do begin
for i:=1 to n do 
rez:=(rez+ a[i,j]])/i;
write(Rez:8:1);
end;
end.