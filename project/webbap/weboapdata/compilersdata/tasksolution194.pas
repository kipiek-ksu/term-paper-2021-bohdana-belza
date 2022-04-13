var a,b:integer;
function geta:integer;
begin
geta:=a;
a:=b;
end;
begin
readln(a,b);
b:=geta;
writeln(a,' ',b);
end.