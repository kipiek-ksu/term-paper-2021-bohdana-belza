program t6z5_2;
var i,j:integer;
      n:integer;
      a:array[1..100,1..100] of real;

begin
    repeat
         readln(n);
    until (n>0);

    for i:=1 to n do
    begin
        for j:=1 to n do
        begin
            if i<j then
             a[i,j]:=sin(i+j)
            else
            begin

                if i=j then
                 a[i,j]:=1
                else
                begin
                    a[i,j]:=sin((i+j)/(2*i+3*j))
                end;

            end;
        end;
    end;

    for i:=1 to n do
    begin
        for j:=1 to n do
        begin
            write(a[i,j],' ');
        end;
        writeln;
    end;
    readkey;
end.
