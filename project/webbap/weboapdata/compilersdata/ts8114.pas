program tema3_38;
type asd=array[1..25,1..25] of real;
var a,b,c,e:asd;
    i,j,n:integer;
procedure add(a,b:asd;var c:asd);
begin
for i:=1 to n do
for j:=1 to n do
c[i,j]:=a[i,j]+b[i,j];
end;
begin
readln(n);
for i:=1 to n do
for j:=1 to n do begin
read(a[i,j]);
end;
for i:=1 to n do
for j:=1 to n do
read(b[i,j]);
for i:=1 to n do
for j:=1 to n do
if i=j then e[i,j]:=1
else e[i,j]:=0;
add(a,b,b);
add(b,e,c);
for i:=1 to n do
for j:=1 to n do begin
if  j=n then writeln(c[i,j]:0:2)
else  begin
      write(c[i,j]:0:2);
      write(' ');
      end;
end;
end.