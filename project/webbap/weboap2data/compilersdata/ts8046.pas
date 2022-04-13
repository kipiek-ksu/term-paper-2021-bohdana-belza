program L_9_4;
var n, i, r, l, k, x, m, S, P : integer;
    a : array[1..100] of integer;
begin

read(n);
S := 0;
P := 0;
for i := 1 to n do
begin
readln(a[i]);
end;
for i := 2 to n do
begin
r := i;
l := 1;
S := S + 1;
while (l < r) do
begin
S := S + 1;
k := (l + r) div 2;
if a[k] > a[i]
then l := k + 1
else r := k;
end;
k := r;
x := a[i];
if i >= k + 1
then
begin
P := P + 1;
for m := i downto k + 1 do
a[m] := a[m - 1];
a[k] := x;
for m := 1 to n do write(a[m], );
writeln;
end;
end;
writeln(S);
writeln(P);
for i := 1 to n do write(a[i], );
end.
