program r;
var a:array[1..20,1..20]of integer; i,j,n,m,p,r:integer;
begin
readln(n,m);
randomize; 
for i:=1 to n do for j:=1 to m do a[i,j]:=random(199)-99;
for i:=1 to n do begin for j:=1 to m do write(a[i,j]:4); writeln end;
p:=0; for i:=1 to n div 2 do for j:=1 to m do if a[2*i,j]>0 then inc(p);
writeln(p);
p:=0; r:=0; for i:=1 to 10 do for j:=1 to 10 do
   begin if a[i,j]>0 then p:=p+a[i,j]; if a[i,j]<0 then r:=r+a[i,j]; end;
Writeln(p, r,m*n); readln
end.