program z4;
const m=69;
var a: array [1..m,1..m] of real;
    n,i,j: Integer;
begin
read(n);
for i:=1 to n do
    for i:=1 to n do
        a[i,j]:=1/(i+j);
for i:=1 to n do
begin
     for j:=1 to n do write(a[i,j],' ') ;
     writeln;
end;
end.
