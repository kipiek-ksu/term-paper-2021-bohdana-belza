Program l_6_20;
const k=50;l=50;
var i,j,k,l:integer;
b:array[1..k] of integer;
mas:array[1..l,1..k] of integer;
begin
read(m,n);
for i:=1 to m do begin
for j:=1 to n do begin
    read(mas[i,j]);
end;end;
for i:=1 to m do begin
for j:=1 to n do begin
    b[i]:=b[i]+mas[i,j];
end;write(b[i],' ');end;
end.