program t7z16;
var     a:real;
        b:integer;
    Count:integer;
begin
    repeat
         readln(a,b);
    until (a>b);

    Count:=0;

    repeat
         a:=a/3;
         Count:=Count+1;
    until (a<b);

    writeln(Count);
end.
