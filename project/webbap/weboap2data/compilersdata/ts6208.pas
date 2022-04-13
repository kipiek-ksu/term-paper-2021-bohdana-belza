program t7z16;
var     a:real;
        b:integer;
    Count:integer;
begin
    repeat
         writeln('Vvedit zna4eniya a>b');
         readln(a,b);
    until (a<b);

    Count:=0;

    repeat
         a:=a/3;
         if a<b then
          Count:=Count+1;
    until (a<b);

    writeln(Count);
    readkey;
end.
