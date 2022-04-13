program fac;
 var n:integer;
function fact(n:integer):integer;
begin
if n=1 then fact:=1
         else fact:=fact(n-1)*n;
end;
begin
readln(n);
o:=fact(n);
writeln(o);
end.