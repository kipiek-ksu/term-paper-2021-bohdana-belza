program t3z11_2;

var i,j:integer;
      a:array[1..100,1..100] of real;
    n,m:integer;
    sum:real;

begin
    repeat
         readln(n);
    until (n>0);

    m:=n;
    sum:=0;

    for i:=1 to n do
    begin
        for j:=1 to n do
        begin
            a[i,j]:=cos(sqr(i)+m);

            if a[i,j]>0 then
             sum:=sum+1;
        end;
    end;
     for i:=1 to n do
            for j:=1 to n do
        begin
        write  (a[i,j]:3:2,' ');
    end;
 writeln(sum);
end.
