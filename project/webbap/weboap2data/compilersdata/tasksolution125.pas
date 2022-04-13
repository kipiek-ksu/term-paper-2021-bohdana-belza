type dar=array[1..200]of real;
procedure Shell(var item: DAr; count:integer;var sp,p:integer);
const
t = 5;
var i, j, k, s, m: integer;
h: array[1..t] of integer;
x: real;
begin
h[1]:=9; h[2]:=5; h[3]:=3; h[4]:=2; h[5]:=1;
for m := 1 to t do
begin
k:=h[m];
s:=-k;
for i := k+1 to count do
begin
x := item[i];
j := i-k;
if s=0 then
begin
s := -k;
s := s+1;
item[s] := x;
end;
while (x<item[j]) and (j<count) do
begin
item[j+k] := item[j];
j := j-k;
end;inc(sp);
item[j+k] := x;
end;

for i:=1 to count do write(item[i]:0:1,' ');writeln;
inc(p);

end;
end;
var n,i:integer;
var a:dar;var s,p:integer;
begin
readln(n);
for i:=1 to n do read(a[i]);
s:=0;p:=0;
shell(a,n,s,p);
writeln(s,#10#13,p);
for i:=1 to n do write(a[i]:0:1,' ');
end.