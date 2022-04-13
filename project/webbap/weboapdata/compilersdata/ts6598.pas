program p11;
var x,a:longint;

function bin(x1,a1:longint):integer;
begin
     if (a1=1) or (a1=x1+1) or (x=0) then bin:=1 else
     bin:=bin(x1-1, a1-1)+bin(x-1,a1);
end;

begin
read(x,a);
writeln(bin(x,a));
end.