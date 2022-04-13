program L5z11;
var a:real;
    n,i:integer;
    k:real;
    begin
    read (a,n);
    k:=a;
    for i:=1 to n do
    begin
    k:=k*(a-n*i);
    end;
    write(k);
    end.