program t7z26;
var a,b:real;
      h:real;
    x,y:real;
    i,n:integer;

function f(x:real):real;
begin
    if x=0 then
     f:=0
    else
       f:=sin(2*x)/2;
end;

begin
clrscr;
    readln(a,b);
    readln(h);

    writeln('x   ', 'y');
    n:=trunc((b-a)/h)+1;

    x:=a;

    for i:=1 to n do
    begin
        y:=f(x);
        writeln(x:4:1, ' ', y:10:9);
        x:=x+h;
    end;
end.