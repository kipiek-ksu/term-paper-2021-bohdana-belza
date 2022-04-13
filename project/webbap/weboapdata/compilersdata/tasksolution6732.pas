program fibonacci;

function fib(n:integer): integer;
begin
    if (n <= 2) then
        fib := 1
    else
        fib := fib(n-1) + fib(n-2);
end;

var
    i,k:integer;

begin
     k:=0;
     repeat
     k:=k+1;
     writeln(k,' ',fib(k));
     until fib(k) mod 100 = 0;
     writeln(k);
end.
