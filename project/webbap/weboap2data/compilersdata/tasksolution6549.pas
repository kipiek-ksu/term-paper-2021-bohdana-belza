program p1;
var a:array [1..3] of byte; b:array [1..3,1..3] of integer; i,j:byte;
begin
for i:=1 to 3 do
read (a[i]);
for i:=1 to 3 do
    begin
    for j:=1 to 3 do
    b[i,j]:=a[i]-3*a[j];
    end;
for i:=1 to 3 do
    begin
    for j:=1 to 3 do
    write (b[i,j],' ');
    writeln;
    end;
end.

