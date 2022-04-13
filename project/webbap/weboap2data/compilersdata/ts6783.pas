Program pr18;
Var f,n:integer;
function fu(n:integer):integer;
var res:integer;
begin
     if n=0 then res:=1 else
     if n=1 then res:=2 else
     res:=2*fu(n-1)-(n-2);
fu:=res;
end;
begin
readln(n);
writeln(fu(n));
end.