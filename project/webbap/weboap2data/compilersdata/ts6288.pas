program t8z6;
var n,m:integer;
      g:integer;

function f(n,m:integer):integer;
begin
    if n=m then
     f:=n;
    if n>m then
     f:=f(n-m,m);
    if n<m then
     f:=f(n,m-n);
end;

begin
    clrscr;

    repeat
         writeln('Vvedite znacheniya N>=M');
         readln(n,m);
    until (n>=m);

    g:=f(n,m);

    writeln(g);
    readkey;

end.