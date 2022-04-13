program t8x6;
var n:integer;
    f:longInt;
    s,i:integer;

function factorial(n:integer):longInt;
       begin
           if n=1 then
            factorial:=1
           else
              factorial:=n*factorial(n-1);
       end;

begin
    repeat
         writeln('Vvedite celoe 4islo 0<N<=12');
         readln(n);
    until (n>0) and (n<=12);

    i:=n;

    for n:=1 to i do
    begin
        f:=factorial(n);
        s:=s+f;
    end;
    writeln('= ',s);

end.