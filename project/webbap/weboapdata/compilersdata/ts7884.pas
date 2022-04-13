program l6;
var a,b: array [1..256] of real;
i,d,q,m,n: integer;
procedure max(k: array of integer; l:integer; var p:integer;);
var i: integer;
    s:real;
begin
s:=k[1];
p:=1;
for i:=2 o l do begin
if s<k[i] then p:=i; end;
end;
procedure qq(l,p: integer; var w:array of real);
var i: integer;
begin
for i:=p+1  to l do k[i]:=0.55;
end;
begin
read(n,m);
for i:=1 to n do read(a[i]);
for i:=1 to m do read(b[i]);
max(a,n,q);
max(b,m,d);
qq(n,q,a);
qq(m,d,b);
for i:=1 to n do write(a[i],' ');
for i:=1 to m do write(b[i],' ');
end.
