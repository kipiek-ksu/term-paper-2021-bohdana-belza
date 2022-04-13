program lsd;
var a,b,c:real;
x:char;
begin
readln(a,b)
readln(x);
if x='*' then c:=a*b else
if x='/' then c:=a/b else
if x='+' then c:=a+b else
if x='-' then c:=a-b else
writeln('Операция не найдена');
writeln(c:3:2);
end.
