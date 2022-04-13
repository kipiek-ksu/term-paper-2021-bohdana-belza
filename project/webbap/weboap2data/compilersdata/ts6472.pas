program z10;
const n=10;
var a: array[1..N] of integer;
i,j: integer;
c: integer;
c2: integer;
begin
clrscr;
for i:=1 to n do
begin
a[i]:= random(20)-2;
write(a[i],' ');
end;
writeln;
for i:=1 to N-1 do begin
c2:=i;
for j:=i+1 to N do
if a[c2]>a[j] then c2:=j;
c:=a[i];a[i]:=a[c2];a[c2]:=c;
end;
writeln;
for i:=1 to n do
write(a[i],' ');
readln;
readln;
end.