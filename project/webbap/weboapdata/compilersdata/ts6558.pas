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
    writeln('Vvedite zna4eniya  granici tabulirovaniya a & b');
    readln(a,b);
    writeln('Vvedite shag tabulirovaniya h');
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

    readkey;
end.