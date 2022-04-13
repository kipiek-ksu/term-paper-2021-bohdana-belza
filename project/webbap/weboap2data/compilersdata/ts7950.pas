program l16;
var i,f,n:integer;
function g(k:integer): integer;
begin
if k=0 then g:=0 else
begin
if k=1 then g:=2 else
g:=2*g(k+1)-k;
end; end;
begin
read(n);
i:=0
while i<n do begin
f:=g(i);
i:=i+1;
end;
write(f);
end.