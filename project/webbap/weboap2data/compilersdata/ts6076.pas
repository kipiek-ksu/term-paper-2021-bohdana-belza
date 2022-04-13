Program Procedur;
type
matr=array [1..5,1..5] of integer;
const
A: matr= ((1,2,5,5,3),
(1, 3, 4, 5, 3),
(6, 7, 4, 6, 8),
(4, 6, 8, 4, 8),
(9, 6, 4, 9, 7));
var
i,j:integer;
b:matr;
function element(const m:matr):integer;
var
max:integer;
begin
clrscr;
for i:=1 to 5 do
for j:=1 to 5 do
if m[i,j] mod 3=0 then max:=m[i,j];
for i:=1 to 5 do
for j:=1 to 5 do
if (m[i,j] mod 3=0)and (m[i,j]>max) then max:=m[i,j];
element:=max
end;
procedure Vichet(var a: matr);
begin
for i:=1 to 5 do
if i mod 2=0 then
for j:=1 to 5 do
a[i,j]:=a[i,j]-a[i-1,j];
end;
begin
randomize;
for i:=1 to 5 do
for j:=1 to 5 do
b[i,j]:= random(10)-5;
writeln(element(A);
for i:=1 to 5 do
begin
for j:=1 to 5 do
write(b[i,j]:5);
end;
vichet(b);
for i:=1 to 5 do
begin
for j:=1 to 5 do
write(b[i,j]:5);
writeln
end;
end. 