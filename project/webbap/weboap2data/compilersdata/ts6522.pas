Program pr13;
Var i:longint;
function akkerman(n:longint):longint;
begin
    if n=0 then akkerman:=1 else 
    if n=1 then akkerman:=2 else          
    akkerman:=2*akkerman(n-1)-n+2;
end;
begin
readln(i);
writeln(ak(i));
end.